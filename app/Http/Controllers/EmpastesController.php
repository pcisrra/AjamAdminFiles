<?php

namespace App\Http\Controllers;

use App\Empastes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmpastesController extends Controller
{
    public function index()
    {
        $empastes = Empastes::latest()->paginate(20);
        return view('empaste.index', compact('empastes'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function create()
    {
        return view('empaste.create');
    }

    public function store(Request $request)
    {
        $request = validate([
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

        Empastes::create($request->all());
        return redirect()->route('empaste.index')->with('success', 'Documento agregado exitosamente.');
    }

    public function show(Empastes $empastes)
    {
        return view('empaste.show', compact('empastes'));
    }

    public function edit(Empastes $empastes)
    {
        return view('empaste.edit', compact('empastes'));
    }

    public function update(Request $request, Empastes $empastes)
    {
        $request = validate([
            'estante' => 'required',
            'cuerpo' => 'required|numeric',
            'balda' => 'required|numeric',
            'contenedor' => 'required',
            'gestion' => 'required',
            'descripcion' => 'required',
            'antecedente' => 'required',
            'data_institucional' => 'required',
            'ambiente' => 'required|numeric',
            'observaciones' => 'required',
        ]);

        $empastes->update($request->all());
        return redirect()->route('empaste.index')->with('success', 'Registro modificado exitosamente.');
    }

    public function destroy(Empastes $empastes)
    {
        $empastes->delete();
        return redirect()->route('empaste.index')->with('success', 'Registro eliminado exitosamente');
    }
}
