<?php

namespace App\Http\Controllers;

use App\Profesion;
use Illuminate\Http\Request;

class ProfesionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesiones = Profesion::orderBy('id','desc')->get();
        return view('admin.profesional.component', compact('profesiones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profesional.create');
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
    		'name'   => 'required|max:100',
    		'descripcion'   => 'max:200',
        ]);

        Profesion::create([
            "name" => $request->name,
            "descripcion" => $request->descripcion,
        ]);

        return redirect()->route('profesions.index');
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
        $profesional = Profesion::findOrFail($id);
        return view('admin.profesional.update', compact('profesional'));
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
    		'name'   => 'required|max:100',
    		'descripcion'   => 'max:200',
        ]);

        Profesion::where('id', $id)
            ->update([
                "name" => $request->name,
                "descripcion" => $request->descripcion,
            ]);

        return redirect()->route('profesions.index');
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
