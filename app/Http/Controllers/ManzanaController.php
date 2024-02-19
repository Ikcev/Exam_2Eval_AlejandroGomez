<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manzana;

class ManzanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $manzanas = Manzana::all();
        return view('manzanas.index', compact('manzanas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('manzanas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipoManzana' => 'required|max:255',
            'precioKilo' => 'required'
        ]);

        $manzana = new Manzana();
        $manzana->tipoManzana = $request->input('tipoManzana');
        $manzana->precioKilo = $request->input('precioKilo');
        $manzana->save();

        return redirect()->route('manzanas.index')->with('success', 'Manzana creada con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $manzana = Manzana::find($id);
        return view('manzanas.edit', compact('manzanas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tipoManzana' => 'required|max:255',
            'precioKilo' => 'required'
        ]);

        $manzana = Manzana::find($id);
        $manzana->update($request->all());
        return redirect()->route('manzanas.index')->with('success', 'Manzana actualizada co éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $manzana = Manzana::find($id);
        $manzana->delete();

        return redirect()->route('manzanas.index')->with('success', 'Manzana eliminada con éxito');
    }
}
