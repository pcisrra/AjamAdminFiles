<?php

namespace App\Http\Controllers;

use App\Fiscalizacion;
use Illuminate\Http\Request;
use DB;

class FiscalizacionController extends Controller
{
    public function index()
    {
        $fiscalizacion = Fiscalizacion::latest()->paginate(20);
        return view('fiscalizacion.index', compact('fiscalizacion'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function create()
    {
        return view('fiscalizacion.create');
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
            'observaciones' => 'required'
        ]);

        Fiscalizacion::create($request->all());
        return redirect()->route('fiscalizacion.index')->with('success', 'Documento agregado exitosamente.');
    }

    public function show(Fiscalizacion $fiscalizacion)
    {
        return view('fiscalizacion.show', compact('fiscalizacion'));
    }

    public function edit(Fiscalizacion $fiscalizacion)
    {
        return view('fiscalizacion.edit', compact('fiscalizacion'));
    }

    public function update(Request $request, Fiscalizacion $fiscalizacion)
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

        $fiscalizacion->update($request->all());
        return redirect()->route('fiscalizacion.index')->with('success', 'Registro '.$fiscalizacion->contenedor.' modificado exitosamente.');
    }

    public function destroy($contenedor)
    {
        DB::delete('DELETE FROM fiscalizacion WHERE REPLACE(contenedor,?,?) = ?',['/','',$contenedor]);
        return redirect()->route('fiscalizacion.index')->with('success', 'Registro '.$contenedor.' eliminado exitosamente.');
    }

    public function ChangeState($id, $estado){
        if($estado == 'DISPONIBLE AC')
            DB::update('UPDATE fiscalizacion SET disponibilidad = ? WHERE id = ?', ['DOC. PRESTADO', $id]);
        else
            DB::update('UPDATE fiscalizacion SET disponibilidad = ? WHERE id = ?', ['DISPONIBLE AC', $id]);
        
        return redirect()->route('fiscalizacion.index');
    }
}