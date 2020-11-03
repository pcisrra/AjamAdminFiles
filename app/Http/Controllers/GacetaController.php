<?php

namespace App\Http\Controllers;

use App\Gaceta;
use Illuminate\Http\Request;
use DB;

class GacetaController extends Controller
{
    public function index()
    {
        $gaceta = Gaceta::latest()->paginate(20);
        return view('gaceta.index', compact('gaceta'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function create()
    {
        return view('gaceta.create');
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

        Gaceta::create($request->all());
        return redirect()->route('gaceta.index')->with('success', 'Documento agregado exitosamente.');
    }

    public function show(Gaceta $gaceta)
    {
        return view('gaceta.show', compact('gaceta'));
    }

    public function edit(Gaceta $gaceta)
    {
        return view('gaceta.edit', compact('gaceta'));
    }

    public function update(Request $request, Gaceta $gaceta)
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

        $gaceta->update($request->all());
        return redirect()->route('gaceta.index')->with('success', 'Registro '.$gaceta->contenedor.' modificado exitosamente.');
    }

    public function destroy($contenedor)
    {
        DB::delete('DELETE FROM gaceta WHERE REPLACE(contenedor,?,?) = ?',['/','',$contenedor]);
        return redirect()->route('gaceta.index')->with('success', 'Registro '.$contenedor.' eliminado exitosamente.');
    }
}