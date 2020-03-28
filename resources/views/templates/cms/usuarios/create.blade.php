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
<div ng-controller="UsuariosController">
<form id="formualrio">
	<div class="card-header">
	        <h2 class="card-title">Crear usuarios</h2>
	        <small class="card-subtitle">Ingrese el contenido de los datos del usuario.</small>
	</div>
    <div class="card-block animated fadeIn">
        <div class="row">
	        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
		        <div class="form-group form-group--float">
		            <input id="name" name="name" type="text" class="form-control form-control-sm limpiar" ng-model="usuario.name" onKeyPress="return valida(event,this,16,50)" onBlur="valida2(this,16,50);">
		            <label>Nombres y apellidos:</label>
		            <i class="form-group__bar"></i>
		        </div>
	        </div>
	        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
		        <div class="form-group form-group--float">
		            <input id="usuario_email" type="usuario_email" class="form-control form-control-sm limpiar" ng-model="usuario.email" onKeyPress="return valida(event,this,15,50)" onBlur="valida2(this,15,50);correo(usuario_email)" maxlength="50">
   		            <label>Email:</label>
		            <i class="form-group__bar"></i>
		        </div>
		    </div>
        </div>
        <div class="row">
        	<div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
		        <div class="form-group form-group--float">
		            <input type="password" class="form-control form-control-sm limpiar" onKeyPress="return valida(event,this,20,12)" onBlur="valida2(this,20,12);" maxlength="8" ng-model="usuario.password">
		             <label>Ingrese la clave:</label>
		            <i class="form-group__bar"></i>
		        </div>
		    </div>
		    <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">    
		        <div class="form-group form-group--select">
                    <div class="select" id="select_tipo_usuario">
                        <select class="form-control" style="margin-top: 4%;" ng-model="usuario.type">
                            <option value="">Seleccione un tipo de usuario</option>
                            <option value="admin">Administrador</option>
                            <option value="member">Miembro</option>
                        </select>
                    </div>
                </div>
		    </div>
		</div>    
		{{csrf_field()}}
		<div class="botonera">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
					<div class="btn btn_form btn-primary" id="registrar_usuario" ng-click="registrar_usuario()"  data-type="info">Registrar</div>
				</div>
				<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
					<a class="btn btn_form btn-danger" id="consultar_usuario"  href="/administrador/usuarios">Consultar</a>
				</div>
				<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
					<div class="btn btn_form btn-success" id="consultar_usuario" ng-click="limpiar_formulario()">Limpiar</div>
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
    <script type="text/javascript" src="{{asset('js/angular/controladores/UsuariosController.js')}}"></script>
@endsection