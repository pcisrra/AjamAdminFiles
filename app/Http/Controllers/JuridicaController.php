<?php

namespace App\Http\Controllers;

use App\Juridica;
use Illuminate\Http\Request;
use DB;

class JuridicaController extends Controller
{
    public function index()
    {
        $juridica = Juridica::latest()->paginate(20);
        return view('juridica.index', compact('juridica'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function create()
    {
        return view('juridica.create');
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

        Juridica::create($request->all());
        return redirect()->route('juridica.index')->with('success', 'Documento agregado exitosamente.');
    }

    public function show(Juridica $juridica)
    {
        return view('juridica.show', compact('juridica'));
    }

    public function edit(Juridica $juridica)
    {
        return view('juridica.edit', compact('juridica'));
    }

    public function update(Request $request, Juridica $juridica)
    {
        $request->validate([
            'estante' => 'required',
            'contenedor' => 'required',
            'gestion' => 'required',
            'descripcion' => 'required',
            'antecedente' => 'required',
            'data_institucional' => 'required',
            'observaciones' => 'required'
        ]);

        $juridica->update($request->all());
        return redirect()->route('juridica.index')->with('success', 'Registro '.$juridica->contenedor.' modificado exitosamente.');
    }

    public function destroy($contenedor)
    {
        DB::delete('DELETE FROM direccion_juridica WHERE contenedor = ?',[$contenedor]);
        return redirect()->route('juridica.index')->with('success', 'Registro '.$contenedor.' eliminado exitosamente.');
    }

    public function ChangeState($id, $estado){
        if($estado == 'DISPONIBLE AC')
            DB::update('UPDATE direccion_juridica SET disponibilidad = ? WHERE id = ?', ['DOC. PRESTADO', $id]);
        else
            DB::update('UPDATE direccion_juridica SET disponibilidad = ? WHERE id = ?', ['DISPONIBLE AC', $id]);
        
        return redirect()->route('juridica.index');
    }
}