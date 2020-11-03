<?php

namespace App\Http\Controllers;

use App\Asesor;
use Illuminate\Http\Request;
use DB;

class AsesorController extends Controller
{
    public function index()
    {
        $asesor = Asesor::latest()->paginate(20);
        return view('asesor.index', compact('asesor'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function create()
    {
        return view('asesor.create');
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

        Asesor::create($request->all());
        return redirect()->route('asesor.index')->with('success', 'Documento agregado exitosamente.');
    }

    public function show(Asesor $asesor)
    {
        return view('asesor.show', compact('asesor'));
    }

    public function edit(Asesor $asesor)
    {
        return view('asesor.edit', compact('asesor'));
    }

    public function update(Request $request, Asesor $asesor)
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

        $asesor->update($request->all());
        return redirect()->route('asesor.index')->with('success', 'Registro '.$asesor->contenedor.' modificado exitosamente.');
    }

    public function destroy($contenedor)
    {
        DB::delete('DELETE FROM asesor WHERE REPLACE(contenedor,?,?) = ?',['/','',$contenedor]);
        return redirect()->route('asesor.index')->with('success', 'Registro '.$contenedor.' eliminado exitosamente.');
    }
}