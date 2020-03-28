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
<div id="section_user_consulta" ng-controller="UsuariosConsultaController">
<form id="formulario">
	<div id="cuerpo_consultas"  ng-class="{hidden:formUser=='Activo',visible:formUser=='Inactivo'}">
		
			<div class="card-header">
			        <h2 class="card-title">Consulta de usuarios</h2>
			        <small class="card-subtitle">Puede seleccionar el usuario que desee y realizar operaciones actualización o anulación. Use los filtros para facilitar búsquedas.</small>
			</div>
		    <div class="card-block">
		        <h3 class="card-block__title">Usuarios</h3>
		        <br>
		        <!-- -->
		        <div  class="row" >
		        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 animated fadeIn">
						<table id="datatable2" class="table table-striped" border="0">
							<thead>
								<th>#</th>
								<th>Id</th>
								<th>Nombres</th>
								<th>Email</th>
								<th>Tipo</th>
								<th>Operaciones</th>
							</thead>
							<tbody>
									<tr ng-repeat="user in usuario track by $index">
										<td>{%$index%}</td>
									 	<td>{%user.id%}</td>
									 	<td>{%user.name%}</td>
									 	<td>{%user.email%}</td>
									 	<td>
									 		<div>
									 			<span class="badge badge-pill"  ng-class="{labeles1:user.type=='admin',labeles2:user.type=='member'}">
									 			<!--badge-primary:user.type=='admin',badge-success:user.type=='member'}"> -->	
									 				{%user.type%}
									 			</span>
									 		</div>
									 	</td>
									 	<td>
									 		<div class="form-group">
									 			<div class="btn btn-primary left" id="actualizar" title="Actualizar" ng-click="ver_registro($index)">
									 				<i class="zmdi zmdi-edit zmdi-hc-fw"></i>
									 			</div>
									 			<div class="btn btn-success left" id="activar{%$index%}" title='Activar' ng-class="{visible:user.estatus_id=='2',hidden:user.estatus_id=='1'}" ng-click="modificar_estatus($index,$event)">
									 				<i class="zmdi zmdi-shield-check zmdi-hc-fw"></i>
									 			</div>
									 			<div class="btn btn-danger left" id="desactivar{%$index%}" title='Desactivar' ng-click="modificar_estatus($index,$event)" ng-class="{visible:user.estatus_id=='1',hidden:user.estatus_id=='2'}">
									 				<i class="zmdi zmdi-shield-check zmdi-hc-fw"></i>
									 			</div>
									 		</div>
									 	</td>
									</tr>
							</tbody>
						</table>
					</div>	
				</div>
			</div>
	</div>
	<!-- -->
	<div id="cuerpo_usuario_individual" class="card-block" ng-class="{hidden:formUser=='Inactivo',visible:formUser=='Activo'}">
	    <div class="row  animated fadeIn">
	    	<div id="usuario_individual" >
				<form id="formualrio_usuario_individual">
					<div class="card-header">
					        <h2 class="card-title">Actualizar usuarios</h2>
					        <small class="card-subtitle">Ingrese el contenido de los datos del usuario.</small>
					</div>
				    <div class="card-block">
				        <h3 class="card-block__title">Datos Básicos</h3>
				        <br>
				        <div class="row">
					        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
						        <div class="form-group form-group--float">
						            <input id="name" name="name" type="text" class="form-control form-control-sm limpiar" ng-model="usuario_individual.name" onKeyPress="return valida(event,this,16,50)" onBlur="valida2(this,16,50);">
						            <label>Nombres y apellidos:</label>
						            <i class="form-group__bar"></i>
						        </div>
					        </div>
					        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
						        <div class="form-group form-group--float">
						            <input id="usuario_email" type="usuario_email" class="form-control form-control-sm limpiar" ng-model="usuario_individual.email" onKeyPress="return valida(event,this,15,50)" onBlur="valida2(this,15,50);correo(usuario_email)" maxlength="50">
				   		            <label>Email:</label>
						            <i class="form-group__bar"></i>
						        </div>
						    </div>
				        </div>
				        <div class="row">
				        	<div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
						        <div class="form-group form-group--float">
						            <input type="password" class="form-control form-control-sm limpiar" onKeyPress="return valida(event,this,20,12)" onBlur="valida2(this,20,12);" maxlength="8" ng-model="usuario_individual.password">
						             <label>Ingrese la clave:</label>
						            <i class="form-group__bar"></i>
						        </div>
						    </div>
						    <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">    
						        <div class="form-group form-group--select">
				                    <div class="select" id="select_tipo_usuario">
				                        <select class="form-control select2" style="margin-top: 4%;" ng-model="usuario_individual.type">
				                            <option value="">Seleccione un tipo de usuario</option>
				                            <option value="admin">Administrador</option>
				                            <option value="member">Miembro</option>
				                            <option value="admin">Administrador</option>
				                            <option value="member">Miembro</option>
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
									<div class="btn btn_form btn-primary" id="registrar_usuario" ng-click="actualizar_usuario()"  data-type="info">Actualizar</div>
								</div>
								<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
									<div class="btn btn_form btn-danger" id="consultar_usuario" ng-click="consultar_usuarios_ac()">Consultar</div>
								</div>		
							</div>
						</div>
						<div id="mensajes"></div>    
				    </div>
				</form>    
			</div>
	    </div>
	</div>    	
	<!-- -->
</form>	
</div>			
@endsection
@section('cuerpo_js')
    <script type="text/javascript" src="{{asset('plugins/bower_components/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/angular/controladores/UsuariosConsultaController.js')}}"></script>
    <!-- Data tables -->
	    <script type="text/javascript" src="{{asset('plugins/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
	    <script type="text/javascript" src="{{asset('plugins/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
	    <script type="text/javascript" src="{{asset('plugins/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
   	    <script type="text/javascript" src="{{asset('plugins/bower_components/jszip/dist/jszip.min.js')}}"></script>
   	    <script type="text/javascript" src="{{asset('plugins/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
	<!-- -->    
@endsection