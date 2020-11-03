@extends('layouts.admin')
@section('content')
<link href="{{ asset('css/style3.css') }}" rel="stylesheet" type="text/css">
    <div class="row" style="margin-bottom: 10px;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Auditoría</h2>
            </div>
            @can('file_show')
            <div class="col-lg-12" align="right">
                <a class="btn btn-success" href="{{ route('auditoria.create') }}"> Agregar Nuevo</a>
            </div>
            @endcan
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
                    <th>Disponibilidad</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($auditoria as $datos)
                <tr data-entry-id="{{ $datos->id }}">
                    <td>{{ $datos->id }}</td>
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
                    <td>{{ $datos->disponibilidad }}</td>
                    <td>
                        @can('file_show')
                        <a class="btn btn-success" href="{{ route('auditoria.ChangeState', ['id' => $datos->id, 'estado' => $datos->disponibilidad]) }}">
                            CAMBIAR DISPONIBILIDAD
                        </a>
                        <a class="btn btn-xs btn-info button-update" href="{{ route('auditoria.edit', $datos->id) }}">
                            MODIFICAR
                        </a>
                        <form action="{{ route('auditoria.destroy', str_replace('/','',$datos->contenedor)) }}" method="POST">
                            @csrf                            
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">ELIMINAR</button>
                        </form>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
    {!! $auditoria->links() !!}
@endsection
@section('scripts')
@parent
<script>
    $(function () {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

        let table = $('.datatable-File:not(.ajaxTable)').DataTable({ buttons: dtButtons })
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });
    })
</script>
@endsection