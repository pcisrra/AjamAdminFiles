@extends('layouts.admin')
@section('content')
<link href="{{ asset('css/style3.css') }}" rel="stylesheet" type="text/css" >
<div class="card">
    <div class="card-header">
        Creación de Registro
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('asesor.update', [$asesor->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="form-group update-form">
                    <label for="estante">Estante</label>
                    <input class="form-control {{ $errors->has('estante') ? 'is-invalid' : '' }}" type="text" name="estante" id="estante" value="{{ old('estante', $asesor->estante) }}">
                    @if($errors->has('estante'))
                        <div class="invalid-feedback">
                            {{ $errors->first('estante') }}
                        </div>
                    @endif
                </div>
                <div class="form-group update-form">
                    <label for="contenedor">Contenedor</label>
                    <input class="form-control {{ $errors->has('contenedor') ? 'is-invalid' : '' }}" type="text" name="contenedor" id="contenedor" value="{{ old('contenedor', $asesor->contenedor) }}">
                    @if($errors->has('contenedor'))
                        <div class="invalid-feedback">
                            {{ $errors->first('contenedor') }}
                        </div>
                    @endif
                </div>
                <div class="form-group update-form">
                    <label for="gestion">Gestión</label>
                    <input class="form-control {{ $errors->has('gestion') ? 'is-invalid' : '' }}" type="text" name="gestion" id="gestion" value="{{ old('gestion', $asesor->gestion) }}">
                    @if($errors->has('gestion'))
                        <div class="invalid-feedback">
                            {{ $errors->first('gestion') }}
                        </div>
                    @endif
                </div>
                <div class="form-group update-form">
                    <label for="descripcion">Descripción</label>
                    <input class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }}" type="text" name="descripcion" id="descripcion" value="{{ old('descripcion', $asesor->descripcion) }}">
                    @if($errors->has('descripcion'))
                        <div class="invalid-feedback">
                            {{ $errors->first('descripcion') }}
                        </div>
                    @endif
                </div>
                <div class="form-group update-form">
                    <label for="antecedente">Antecedente</label>
                    <input class="form-control {{ $errors->has('antecedente') ? 'is-invalid' : '' }}" type="text" name="antecedente" id="antecedente" value="{{ old('antecedente', $asesor->antecedente) }}">
                    @if($errors->has('antecedente'))
                        <div class="invalid-feedback">
                            {{ $errors->first('antecedente') }}
                        </div>
                    @endif
                </div>
                <div class="form-group update-form">
                    <label for="data_institucional">Data Institucional</label>
                    <input class="form-control {{ $errors->has('data_institucional') ? 'is-invalid' : '' }}" type="text" name="data_institucional" id="data_institucional" value="{{ old('data_institucional', $asesor->data_institucional) }}">
                    @if($errors->has('data_institucional'))
                        <div class="invalid-feedback">
                            {{ $errors->first('data_institucional') }}
                        </div>
                    @endif
                </div>
                <div class="form-group update-form">
                    <label for="observaciones">Observaciones</label>
                    <input class="form-control {{ $errors->has('observaciones') ? 'is-invalid' : '' }}" type="text" name="observaciones" id="observaciones" value="{{ old('observaciones', $asesor->observaciones) }}">
                    @if($errors->has('observaciones'))
                        <div class="invalid-feedback">
                            {{ $errors->first('observaciones') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    Actualizar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection