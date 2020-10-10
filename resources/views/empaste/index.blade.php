@extends('layouts.admin')
@section('content')
    <div class="row" style="margin-bottom: 10px;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Empastes de Contabilidad</h2>
            </div>
        </div>
    </div>
    <div class="row" style="margin-bottom: 10px;" align="right">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('empaste.create') }}"> Agregar nuevo</a>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-File">
            <thead>
                <tr>
                    <th width="18"></th>
                    <th>Estante</th>
                    <th>Cuerpo</th>
                    <th>Balda</th>
                    <th>Contenedor</th>
                    <th>Gestión</th>
                    <th>Descripción</th>
                    <th>Antecedente</th>
                    <th>Dato Institucional</th>
                    <th>Ambiente</th>
                    <th>Observaciones</th>
                    <th width="280px">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empastes as $datos)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $datos->estante }}</td>
                    <td>{{ $datos->cuerpo }}</td>
                    <td>{{ $datos->balda }}</td>
                    <td>{{ $datos->contenedor }}</td>
                    <td>{{ $datos->gestion }}</td>
                    <td>{{ $datos->descripcion }}</td>
                    <td>{{ $datos->antecedente }}</td>
                    <td>{{ $datos->data_institucional }}</td>
                    <td>{{ $datos->ambiente }}</td>
                    <td>{{ $datos->observaciones }}</td>
                    <td>
                        <form action="{{ route('empaste.destroy',$datos->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('empaste.show',$datos->id) }}">VER</a>
                            <a class="btn btn-primary" href="{{ route('empaste.edit',$datos->id) }}">MODIFICAR</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">ELIMINAR</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
    {!! $empastes->links() !!}
@endsection