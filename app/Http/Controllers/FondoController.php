<?php

namespace App\Http\Controllers;

use App\Fondo;
use Illuminate\Http\Request;
use DB;

class FondoController extends Controller
{
    public function index()
    {
        $fondo = Fondo::latest()->paginate(20);
        return view('fondo.index', compact('fondo'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function create()
    {
        return view('fondo.create');
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

        Fondo::create($request->all());
        return redirect()->route('fondo.index')->with('success', 'Documento agregado exitosamente.');
    }

    public function show(Fondo $fondo)
    {
        return view('fondo.show', compact('fondo'));
    }

    public function edit(Fondo $fondo)
    {
        return view('fondo.edit', compact('fondo'));
    }

    public function update(Request $request, Fondo $fondo)
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

        $fondo->update($request->all());
        return redirect()->route('fondo.index')->with('success', 'Registro '.$fondo->contenedor.' modificado exitosamente.');
    }

    public function destroy($contenedor)
    {
        DB::delete('DELETE FROM fondo WHERE REPLACE(contenedor,?,?) = ?',['/','',$contenedor]);
        return redirect()->route('fondo.index')->with('success', 'Registro '.$contenedor.' eliminado exitosamente.');
    }
}