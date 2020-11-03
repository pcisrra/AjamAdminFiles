@extends('layouts.admin')
@section('content')
<link href="{{ asset('css/style3.css') }}" rel="stylesheet" type="text/css">
    <div class="row" style="margin-bottom: 10px;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Dirección de Fiscalización, Control y Coordinación Institucional</h2>
            </div>
            @can('file_show')
            <div class="col-lg-12" align="right">
                <a class="btn btn-success" href="{{ route('fiscalizacion.create') }}"> Agregar Nuevo</a>
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
                    <th width="12"></th>
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
                @foreach ($fiscalizacion as $datos)
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
                        <a class="btn btn-success" href="{{ route('fiscalizacion.ChangeState', ['id' => $datos->id, 'estado' => $datos->disponibilidad]) }}">
                            CAMBIAR DISPONIBILIDAD
                        </a>
                        <a class="btn btn-xs btn-info button-update" href="{{ route('fiscalizacion.edit', $datos->id) }}">
                            MODIFICAR
                        </a>
                        <form action="{{ route('fiscalizacion.destroy', str_replace('/','',$datos->contenedor)) }}" method="POST">
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
    {!! $fiscalizacion->links() !!}
<!--modal for documents-->
<!-- <form action="cambiaDisponibilidad" method="POST">
    <div class="modal fade right" id="modalDisponibilidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="heading lead">PRÉSTAMO DE DOCUMENTO <label id="id"></label></p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <hr>
                    <p class="text-center">
                        <strong>Documento prestado a:</strong>
                    </p>
                    <div class="md-form">
                        <input class="form-control" type="text" name="nombre" id="nombre">
                    </div>
                </div>
                <div class="modal-footer justify-content-center">            
                    <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal" id="btnOcupado" value="true">OCUPADO</a>
                    <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal" id="btnLibre" value="false">LIBRE</a>
                </div>
            </div>
        </div>
    </div>
</form> -->
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