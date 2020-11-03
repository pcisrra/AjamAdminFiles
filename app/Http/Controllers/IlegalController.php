<?php

namespace App\Http\Controllers;

use App\Ilegal;
use Illuminate\Http\Request;
use DB;

class IlegalController extends Controller
{
    public function index()
    {
        $ilegal = Ilegal::latest()->paginate(20);
        return view('ilegal.index', compact('ilegal'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function create()
    {
        return view('ilegal.create');
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

        Ilegal::create($request->all());
        return redirect()->route('ilegal.index')->with('success', 'Documento agregado exitosamente.');
    }

    public function show(Ilegal $ilegal)
    {
        return view('ilegal.show', compact('ilegal'));
    }

    public function edit(Ilegal $ilegal)
    {
        return view('ilegal.edit', compact('ilegal'));
    }

    public function update(Request $request, Ilegal $ilegal)
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

        $ilegal->update($request->all());
        return redirect()->route('ilegal.index')->with('success', 'Registro '.$ilegal->contenedor.' modificado exitosamente.');
    }

    public function destroy($contenedor)
    {
        DB::delete('DELETE FROM ilegal WHERE REPLACE(contenedor,?,?) = ?',['/','',$contenedor]);
        return redirect()->route('ilegal.index')->with('success', 'Registro '.$contenedor.' eliminado exitosamente.');
    }
}