<?php

namespace App\Http\Controllers;

use App\Regional;
use Illuminate\Http\Request;
use DB;

class RegionalController extends Controller
{
    public function index()
    {
        $regional = Regional::latest()->paginate(20);
        return view('regional.index', compact('regional'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function create()
    {
        return view('regional.create');
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
        ]);

        Regional::create($request->all());
        return redirect()->route('regional.index')->with('success', 'Documento agregado exitosamente.');
    }

    public function show(Regional $regional)
    {
        return view('regional.show', compact('regional'));
    }

    public function edit(Regional $regional)
    {
        return view('regional.edit', compact('regional'));
    }

    public function update(Request $request, Regional $regional)
    {
        $request->validate([
            'estante' => 'required',
            'contenedor' => 'required',
            'gestion' => 'required',
            'descripcion' => 'required',
            'antecedente' => 'required',
            'data_institucional' => 'required',
            'observaciones' => 'required',
        ]);

        $regional->update($request->all());
        return redirect()->route('regional.index')->with('success', 'Registro '.$regional->contenedor.' modificado exitosamente.');
    }

    public function destroy($contenedor)
    {
        DB::delete('DELETE FROM regional WHERE REPLACE(contenedor,?,?) = ?',['/','',$contenedor]);
        return redirect()->route('regional.index')->with('success', 'Registro '.$contenedor.' eliminado exitosamente.');
    }
}