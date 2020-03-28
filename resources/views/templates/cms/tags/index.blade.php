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
<div id="section_user_consulta" ng-controller="TagsConsultaController">
<form id="formulario">
	<div id="cuerpo_consultas"  ng-class="{hidden:formTag=='Activo',visible:formTag=='Inactivo'}">
		
			<div class="card-header">
			        <h2 class="card-title">Consulta de tags</h2>
			        <small class="card-subtitle">Puede seleccionar el tag que desee y realizar operaciones actualización o anulación. Use los filtros para facilitar búsquedas.</small>
			</div>
		    <div class="card-block">
		        <h3 class="card-block__title">Tags</h3>
		        <br>
		        <!-- -->
		        <div  class="row" >
		        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 animated fadeIn">
						<table id="datatable2" class="table table-striped" border="0">
							<thead>
								<th>#</th>
								<th>Id</th>
								<th>Descripción</th>
								<th>Operaciones</th>
							</thead>
							<tbody>
									<tr ng-repeat="tag in tags track by $index">
										<td>{%$index%}</td>
									 	<td>{%tag.id%}</td>
									 	<td>{%tag.name%}</td>
									 	<td>
									 		<div class="form-group">
									 			<div class="btn btn-primary left" id="actualizar" title="Actualizar" ng-click="ver_registro($index)">
									 				<i class="zmdi zmdi-edit zmdi-hc-fw"></i>
									 			</div>
									 			<div class="btn btn-success left" id="activar{%$index%}" title='Activar' ng-class="{visible:tag.estatus_id=='2',hidden:tag.estatus_id=='1'}" ng-click="modificar_estatus($index,$event)">
									 				<i class="zmdi zmdi-shield-check zmdi-hc-fw"></i>
									 			</div>
									 			<div class="btn btn-danger left" id="desactivar{%$index%}" title='Desactivar' ng-click="modificar_estatus($index,$event)" ng-class="{visible:tag.estatus_id=='1',hidden:tag.estatus_id=='2'}">
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
	<div id="cuerpo_usuario_individual" class="card-block" ng-class="{hidden:formTag=='Inactivo',visible:formTag=='Activo'}">
	    <div class="row  animated fadeIn">
	    	<div id="usuario_individual" >
				<form id="formualrio_usuario_individual">
					<div class="card-header">
					        <h2 class="card-title">Actualizar tags</h2>
					        <small class="card-subtitle">Ingrese el contenido de los datos del tag.</small>
					</div>
				    <div class="card-block">
				        <h3 class="card-block__title">Datos Básicos</h3>
				        <br>
				        <div class="row">
					        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
						        <div class="form-group form-group--float">
						            <input id="name" name="name" type="text" class="form-control form-control-sm limpiar" ng-model="tags_individual.name" onKeyPress="return valida(event,this,16,50)" onBlur="valida2(this,16,50);">
						            <label>Descripción:</label>
						            <i class="form-group__bar"></i>
						        </div>
					        </div>
				        </div>   
						{{csrf_field()}}
						<div class="botonera">
							<div class="row">
								<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
									<div class="btn btn_form btn-primary" id="actualizar_tag" ng-click="actualizar_tag()"  data-type="info">Actualizar</div>
								</div>
								<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
									<div class="btn btn_form btn-danger" id="consultar_tag" ng-click="consultar_tags_ac()">Consultar</div>
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
    <script type="text/javascript" src="{{asset('bower_components/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/angular/controladores/TagsConsultaController.js')}}"></script>
     <!-- Data tables -->
	    <script type="text/javascript" src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
	    <script type="text/javascript" src="{{asset('bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
	    <script type="text/javascript" src="{{asset('bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
   	    <script type="text/javascript" src="{{asset('bower_components/jszip/dist/jszip.min.js')}}"></script>
   	    <script type="text/javascript" src="{{asset('bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
	<!-- -->   
	<!-- -->    
@endsection