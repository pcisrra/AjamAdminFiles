<?php

namespace App\Http\Controllers;

use App\Planificacion;
use Illuminate\Http\Request;
use DB;

class PlanificacionController extends Controller
{
    public function index()
    {
        $planificacion = Planificacion::latest()->paginate(20);
        return view('planificacion.index', compact('planificacion'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function create()
    {
        return view('planificacion.create');
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

        Planificacion::create($request->all());
        return redirect()->route('planificacion.index')->with('success', 'Documento agregado exitosamente.');
    }

    public function show(Planificacion $planificacion)
    {
        return view('planificacion.show', compact('planificacion'));
    }

    public function edit(Planificacion $planificacion)
    {
        return view('planificacion.edit', compact('planificacion'));
    }

    public function update(Request $request, Planificacion $planificacion)
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

        $planificacion->update($request->all());
        return redirect()->route('planificacion.index')->with('success', 'Registro '.$planificacion->estante.' modificado exitosamente.');
    }

    public function destroy($contenedor)
    {
        DB::delete('DELETE FROM planificacion WHERE REPLACE(contenedor,?,?) = ?',['/','',$contenedor]);
        return redirect()->route('planificacion.index')->with('success', 'Registro '.$contenedor.' eliminado exitosamente.');
    }
}