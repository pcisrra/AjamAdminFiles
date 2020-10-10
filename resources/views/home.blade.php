@extends('layouts.admin')
@section('content')
<link href="{{ asset('css/style3.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ asset('css/menu_style.css') }}" rel="stylesheet" type="text/css" >
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Menú
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="content">
				        <div class="button-wrapper-large">
					        <a href="{{ route('auditoria.index') }}" class="a-btn">
						        <span class="a-btn-text">Despacho</span> 
						        <span class="a-btn-slide-text">Auditoría</span>
						        <span class="a-btn-icon-right"><span></span></span>
					        </a>
					        <a href="{{ route('juridica.index') }}" class="a-btn">
						        <span class="a-btn-text">Dirección Jurídica</span>
						        <span class="a-btn-slide-text">Buscar!</span>
						    <span class="a-btn-icon-right"><span></span></span>
					        </a>
					        <div class="clr"></div>
				        </div>
				        <div class="button-wrapper-large">	
					        <a href="#" class="a-btn">
						        <span class="a-btn-text">Dirección de Fiscalización,<br> control y coordinación Institucional</span>
						        <span class="a-btn-slide-text">Buscar!</span>
						        <span class="a-btn-icon-right"><span></span></span>
					        </a>
					        <a href="{{ route('empaste.index') }}" class="a-btn">
						        <span class="a-btn-text">Dirección Administrativa Financiera</span>
						        <span class="a-btn-slide-text">Contabilidad</span>
						        <span class="a-btn-icon-right"><span></span></span>
					        </a>
					        <div class="clr"></div>
				        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection