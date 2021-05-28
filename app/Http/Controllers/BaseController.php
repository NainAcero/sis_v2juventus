<?php

namespace App\Http\Controllers;

use App\Base;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bases = Base::orderBy('id','desc')->get();
        return view('admin.base.component', compact('bases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.base.create');
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
            'base'   => 'required|max:70',
    		'direccion'   => 'required|max:100',
    		'estado'   => 'required',
        ]);

        Base::create([
            "base" => $request->base,
            "direccion" => $request->direccion,
            "estado" => $request->estado,
        ]);

        return redirect()->route('bases.index');
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
        $base = Base::findOrFail($id);
        return view('admin.base.update', compact('base'));
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
            'base'   => 'required|max:70',
    		'direccion'   => 'required|max:100',
    		'estado'   => 'required',
        ]);

        Base::where('id', $id)
            ->update([
                "base" => $request->base,
                "direccion" => $request->direccion,
                "estado" => $request->estado,
            ]);

        return redirect()->route('bases.index');
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
