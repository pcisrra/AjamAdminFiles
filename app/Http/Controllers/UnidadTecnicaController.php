<?php

namespace App\Http\Controllers;

use App\UnidadTecnica;
use Illuminate\Http\Request;
use DB;

class UnidadTecnicaController extends Controller
{
    public function index()
    {
        $unidad_tecnica = UnidadTecnica::latest()->paginate(20);
        return view('unidad_tecnica.index', compact('unidad_tecnica'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function create()
    {
        return view('unidad_tecnica.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'estante' => 'required',
            'cuerpo' => 'required',
            'balda' => 'required',
            'contenedor' => 'required',
            'gestion' => 'required',
            'descripcion' => 'required',
            'antecedente' => 'required',
            'data_institucional' => 'required',
            'ambiente' => 'required',
            'observaciones' => 'required',
            //'disponibilidad' => 'required',
        ]);

        UnidadTecnica::create($request->all());
        return redirect()->route('unidad_tecnica.index')->with('success', 'Documento agregado exitosamente.');
    }

    public function show(UnidadTecnica $unidad_tecnica)
    {
        return view('unidad_tecnica.show', compact('unidad_tecnica'));
    }

    public function edit(UnidadTecnica $unidad_tecnica)
    {
        return view('unidad_tecnica.edit', compact('unidad_tecnica'));
    }

    public function update(Request $request, UnidadTecnica $unidad_tecnica)
    {
        $request->validate([
            'estante' => 'required',
            'contenedor' => 'required',
            'gestion' => 'required',
            'descripcion' => 'required',
            'antecedente' => 'required',
            'data_institucional' => 'required',
            'observaciones' => 'required',
            //'disponibilidad' => 'required'
        ]);

        $unidad_tecnica->update($request->all());
        return redirect()->route('unidad_tecnica.index')->with('success', 'Registro '.$unidad_tecnica->contenedor.' modificado exitosamente.');
    }

    public function destroy($contenedor)
    {
        DB::delete('DELETE FROM unidad_tecnica WHERE REPLACE(contenedor,?,?) = ?',['/','',$contenedor]);
        return redirect()->route('unidad_tecnica.index')->with('success', 'Registro '.$contenedor.' eliminado exitosamente.');
    }
}