@extends('layouts.admin')
@section('content')
<meta name="viewport" content="width=device-width, initial-scale=1">
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
					        <a data-toggle="modal" data-target="#modalMenuDespacho" class="a-btn" href="#modalMenuDespacho">
						        <span class="a-btn-text">Despacho</span> 
						        <span class="a-btn-slide-text">Ir a documentos</span>
						        <span class="a-btn-icon-right"><span></span></span>
					        </a>
					        <a href="{{ route('juridica.index') }}" class="a-btn">
						        <span class="a-btn-text">Dirección Jurídica</span>
						        <span class="a-btn-slide-text">Ir a documentos</span>
						    	<span class="a-btn-icon-right"><span></span></span>
					        </a>
					        <div class="clr"></div>
				        </div>
				        <div class="button-wrapper-large">	
					        <a href="{{ route('fiscalizacion.index') }}" class="a-btn">
						        <span class="a-btn-text">Dirección de Fiscalización,<br> Control y Coordinación Institucional</span>
						        <span class="a-btn-slide-text">Ir a documentos</span>
						        <span class="a-btn-icon-right"><span></span></span>
					        </a>
					        <a data-toggle="modal" data-target="#modalMenufinanciero" class="a-btn" href="#modalMenufinanciero">
						        <span class="a-btn-text">Dirección Administrativa Financiera</span>
						        <span class="a-btn-slide-text">Ir a documentos</span>
						        <span class="a-btn-icon-right"><span></span></span>
					        </a>
					        <div class="clr"></div>
				        </div>
				        <br>
				        <br>
				        <div class="button-wrapper-large">
				        	<a data-toggle="modal" data-target="#modalGlosario" class="a-btn" href="#modalGlosario">
						        <span class="a-btn-text">Glosario</span>
						        <span class="a-btn-slide-text">Mostrar</span>
						        <span class="a-btn-icon-right"><span></span></span>
					        </a>
				        	<div class="clr"></div>
				        </div>
                    </div>
				</div>
				<div class="modal fade" id="modalMenuDespacho" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="myModalLabel">DOCUMENTOS EN DESPACHO</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
							<div class="modal-footer">
								<div class="button-wrapper-large">
									<a class="btn btn-primary" href="{{ route('auditoria.index') }}">Auditoría</a>
									<a class="btn btn-primary seg" href="{{ route('ilegal.index') }}">Minería Ilegal</a>
								</div>
								<div class="button-wrapper-large">
									<a class="btn btn-primary" href="{{ route('asesor.index') }}">Asesor/a>
									<a class="btn btn-primary seg" href="{{ route('planificacion.index') }}">Planificación</a>
								</div>
								<div class="button-wrapper-large">
									<a class="btn btn-primary" href="{{ route('regional.index') }}">Regionales</a>
									<a class="btn btn-primary seg" href="{{ route('unidad_tecnica.index') }}">Unidad Técnica</a>
								</div>
								<div class="button-wrapper-large">
									<a class="btn btn-primary" href="{{ route('gaceta.index') }}">Gaceta Nacional</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal fade" id="modalMenufinanciero" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="myModalLabel">DIRECCIÓN ADMINISTRATIVA FINANCIERA</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
								</button>
							</div>
							<div class="modal-footer">
								<div class="button-wrapper-large">
									<a class="btn btn-primary" href="{{ route('empaste.index') }}">Empastes de<br/>Contabilidad</a>
									<a class="btn btn-primary seg" href="{{ route('recursoHumano.index') }}">Recursos<br/>Humanos</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal fade" id="modalGlosario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="myModalLabel">Glosario</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
								</button>
							</div>
							<div class="modal-footer">
								<img alt="logo" src="{{ asset('images/glosario.jpeg') }}" class="image-sizer responsive">
							</div>
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