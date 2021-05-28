<?php

namespace App\Http\Controllers;

use App\Base;
use App\Cargo;
use App\Persona;
use App\PersonaBase;
use App\Profesion;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = PersonaBase::orderBy('id','desc')->get();
        return view('admin.persona.component', compact('personas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bases = Base::where('estado',1)->get();
        $cargos = Cargo::where('estado',1)->get();

        $profesiones = Profesion::get();
        return view('admin.persona.create', compact('bases', 'cargos', 'profesiones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'dni' =>'required|max:8|unique:personas',
            'nombre'  => 'required|max:100',
            'apellido'   => 'required|max:100',
            'direccion'   => 'required|max:100',
            'telefono'   => 'required|max:18',
        ]);

        $persona = Persona::create([
            "dni" => $request->dni,
            "nombre" => $request->nombre,
            "apellido" => $request->apellido,
            "direccion" => $request->direccion,
            "fecha_nacimiento" => $request->fecha_nacimiento,
            "profesion_id" => ($request->selected_profesion == 0 ) ? null : $request->selected_profesion,
            "telefono" => $request->telefono,
        ]);

        if($request->selected_cargo != null){
            PersonaBase::create([
                "persona_id" => $persona->id,
                "base_id" => ($request->selected_base != "") ? $request->selected_base : null,
                "cargo_id" => $request->selected_cargo,
            ]);
        }
        return redirect()->route('personas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = PersonaBase::findOrFail($id);
        $bases = Base::where('estado',1)->get();
        $cargos = Cargo::where('estado',1)->get();

        $profesiones = Profesion::get();
        return view('admin.persona.update', compact('record', 'bases', 'cargos', 'profesiones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
    		'nombre'  => 'required|max:100',
    		'apellido'   => 'required|max:100',
    		'direccion'   => 'required|max:100',
    		'telefono'   => 'required|max:18',
        ]);

        $personaBase = PersonaBase::find($id);
        Persona::where('id', $personaBase->persona_id)
            ->update([
                "nombre" => $request->nombre,
                "apellido" => $request->apellido,
                "direccion" => $request->direccion,
                "fecha_nacimiento" => $request->fecha_nacimiento,
                "profesion_id" => ($request->selected_profesion == 0 ) ? null : $request->selected_profesion,
                "telefono" => $request->telefono
            ]);
        if($request->selected_cargo != null){
            $personaBase->update([
                "base_id" => ($request->selected_base != "") ? $request->selected_base : null,
                "cargo_id" => $request->selected_cargo,
            ]);
        }
        return redirect()->route('personas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
