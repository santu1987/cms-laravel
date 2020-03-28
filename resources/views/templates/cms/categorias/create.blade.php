@extends('templates.cms.main')

@section('title')
    ContentManager
@endsection

@section('cuerpo_css')	
@endsection

@section('side_bar')
    @include('templates.cms.partials.side_bar')
@endsection

@section('content')
<div ng-controller="CategoriasController">
<form id="formualrio">
	<div class="card-header">
	        <h2 class="card-title">Crear categorías</h2>{% algo %}
	        <small class="card-subtitle">Ingrese el contenido de los datos de la categoría.</small>
	</div>
    <div class="card-block animated fadeIn">
        <div class="row">
	        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
		        <div class="form-group form-group--float">
		            <input id="name" name="name" type="text" class="form-control form-control-sm limpiar" ng-model="categoria.name" onKeyPress="return valida(event,this,16,50)" onBlur="valida2(this,16,50);">
		            <label>Descripción de la categoría:</label>
		            <i class="form-group__bar"></i>
		        </div>
	        </div>
        </div>    
		{{csrf_field()}}
		<div class="botonera">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
					<div class="btn btn_form btn-primary" id="registrar_categoria" ng-click="registrar_categoria()"  data-type="info">Registrar</div>
				</div>
				<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
					<a class="btn btn_form btn-danger" id="consultar_categoria"  href="/administrador/categorias">Consultar</a>
				</div>
				<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
					<div class="btn btn_form btn-success" id="limpiar_categoria" ng-click="limpiar_formulario()">Limpiar</div>
				</div>		
			</div>
		</div>
		<div id="mensajes"></div>    
    </div>
</form>    
</div>    
@endsection
@section('cuerpo_js')
    <script type="text/javascript" src="{{asset('plugins/bower_components/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/angular/controladores/CategoriasController.js')}}"></script>
@endsection