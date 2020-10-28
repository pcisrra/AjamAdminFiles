<?php

namespace App\Http\Controllers;

use App\RecursoHumano;
use Illuminate\Http\Request;
use DB;

class RecursoHumanoController extends Controller
{
    public function index()
    {
        $recursoHumano = RecursoHumano::latest()->paginate(20);
        return view('recursoHumano.index', compact('recursoHumano'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function create()
    {
        return view('recursoHumano.create');
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

        RecursoHumano::create($request->all());
        return redirect()->route('recursoHumano.index')->with('success', 'Documento agregado exitosamente.');
    }

    public function show(RecursoHumano $recursoHumano)
    {
        return view('recursoHumano.show', compact('recursoHumano'));
    }

    public function edit(RecursoHumano $recursoHumano)
    {
        return view('recursoHumano.edit', compact('recursoHumano'));
    }

    public function update(Request $request, RecursoHumano $recursoHumano)
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

        $recursoHumano->update($request->all());
        return redirect()->route('recursoHumano.index')->with('success', 'Registro '.$recursoHumano->contenedor.' modificado exitosamente.');
    }

    public function destroy($contenedor)
    {
        DB::delete('DELETE FROM recursoHumano WHERE REPLACE(contenedor,?,?) = ?',['/','',$contenedor]);
        return redirect()->route('recursoHumano.index')->with('success', 'Registro '.$contenedor.' eliminado exitosamente.');
    }
}