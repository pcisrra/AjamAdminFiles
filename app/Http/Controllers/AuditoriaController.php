<?php

namespace App\Http\Controllers;

use App\Auditoria;
use Illuminate\Http\Request;
use DB;

class AuditoriaController extends Controller
{
    public function index()
    {
        $auditoria = Auditoria::latest()->paginate(20);
        return view('auditoria.index', compact('auditoria'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function create()
    {
        return view('auditoria.create');
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

        Auditoria::create($request->all());
        return redirect()->route('auditoria.index')->with('success', 'Documento agregado exitosamente.');
    }

    public function show(Auditoria $auditoria)
    {
        return view('auditoria.show', compact('auditoria'));
    }

    public function edit(Auditoria $auditoria)
    {
        return view('auditoria.edit', compact('auditoria'));
    }

    public function update(Request $request, Auditoria $auditoria)
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

        $auditoria->update($request->all());
        return redirect()->route('auditoria.index')->with('success', 'Registro '.$auditoria->contenedor.' modificado exitosamente.');
    }

    public function destroy($contenedor)
    {
        DB::delete('DELETE FROM auditoria WHERE REPLACE(contenedor,?,?) = ?',['/','',$contenedor]);
        return redirect()->route('auditoria.index')->with('success', 'Registro '.$contenedor.' eliminado exitosamente.');
    }
}
