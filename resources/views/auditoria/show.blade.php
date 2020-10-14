@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Registro de Auditoría
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('auditoria.index') }}">
                    REGRESAR
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            Estante
                        </th>
                        <td>
                            {{ $auditoria->estante }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Contenedor
                        </th>
                        <td>
                            {{ $auditoria->contenedor }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Gestión
                        </th>
                        <td>
                            {{ $auditoria->gestion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Descripción
                        </th>
                        <td>
                            {{ $auditoria->descripcion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Antecedente
                        </th>
                        <td>
                            {{ $auditoria->antecedente }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Data Institucional
                        </th>
                        <td>
                            {{ $auditoria->data_institucional }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Observaciones
                        </th>
                        <td>
                            {{ $auditoria->observaciones }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group"></div>
        </div>
    </div>
</div>
@endsection