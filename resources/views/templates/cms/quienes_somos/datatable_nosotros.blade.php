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
<div id="section_user_consulta" ng-controller="quienesSomosConsultaController">
<form id="formulario">
	<div id="cuerpo_consultas"  ng-class="{hidden:formEmp=='Activo',visible:formEmp=='Inactivo'}">
		
			<div class="card-header">
			        <h2 class="card-title">Consulta de empresa</h2>
			        <small class="card-subtitle">Puede seleccionar el registro que desee y realizar operaciones actualización o anulación. Use los filtros para facilitar búsquedas.</small>
			</div>
		    <div class="card-block">
		        <h3 class="card-block__title">Nosotros</h3>
		        <br>
		        <!-- -->
		        <div  class="row" >
		        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 animated fadeIn">
						<table id="datatable2" class="table table-striped" border="0">
							<thead>
								<th>#</th>
								<th>Idioma</th>
								<th>Objetivo</th>
								<th>Misión</th>
								<th>Visión</th>
								<th style="text-align: center;">Operaciones</th>
							</thead>
							<tbody>
									<tr ng-repeat="emp in empresa_list track by $index">
										<td>{%emp.numero%}</td>
									 	<td>{%emp.descripcion_idioma%}</td>
									 	<td>{%emp.objetivo%}</td>
									 	<td>{%emp.mision%}</td>
									 	<td>{%emp.vision%}</td>
									 	<td style="">
									 		<div class="row">
									 			<div class="col-4">
										 			<div class="btn btn-primary left" id="actualizar" title="Actualizar" ng-click="ver_registro($index)">
										 				<i class="zmdi zmdi-edit zmdi-hc-fw"></i>
										 			</div>
									 			</div>
									 			<div class="col-4">
										 			<div class="btn btn-danger left" id="eliminar" title="Eliminar" ng-click="eliminar_nosotros($index)">
										 				<i class="zmdi zmdi-edit zmdi-hc-fw"></i>
										 			</div>
									 			</div>
									 			<div class="col-4" ng-if="emp.estatus=='2'">
										 			<div class="btn btn-success left" id="activar{%$index%}" title='Activar' ng-class="{visible:emp.estatus=='2',hidden:emp.estatus=='1'}" ng-click="modificar_estatus($index,$event)">
										 				<i class="zmdi zmdi-shield-check zmdi-hc-fw"></i>
										 			</div>
										 		</div>
										 		<div class="col-4" ng-if="emp.estatus=='1'">	
										 			<div class="btn btn-danger left" id="desactivar{%$index%}" title='Desactivar' ng-click="modificar_estatus($index,$event)" ng-class="{visible:emp.estatus=='1',hidden:emp.estatus=='2'}">
										 				<i class="zmdi zmdi-shield-check zmdi-hc-fw"></i>
										 			</div>
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
</form>	
<!-- -->
<div id="cuerpo_empresa_individual" class="card-block" ng-class="{hidden:formEmp=='Inactivo',visible:formEmp=='Activo'}">
    <!-- -->
	<div class="animated fadeIn">
		<form id="formulario" enctype="multipart/form-data">
			<div class="card-header">
			        <h2 class="card-title">Actualizar datos de la empresa</h2>
			        <small class="card-subtitle">
			        	<i class="fa fa-folder-open estilo_form_empresa" aria-hidden="true"></i>
			        	Ingrese el contenido indicado.</br>
			        	<i class="fa fa-sitemap estilo_form_empresa" aria-hidden="true"></i> 
			        	En el tab de datos básicos encontrará los campos de información de la empresa</br> 
			        	<i class="fa fa-picture-o estilo_form_empresa" aria-hidden="true"></i>
			        	En el tab imagenes podrá selecionar una imagen alusiva 
			        </small>
			</div>
			<div class="card-block animated fadeIn">
				<div class="row">
					<div class="col-12">
				        <div id="tab-container">
					    <!--Tabs -->
					    	<ul id="menutabs" class="nav nav-tabs nav-fill" role="tablist">
						    	<li class="super_tabs nav-item"  ng-click="currentTab = 'datos_basicos';" >
						    		<a class="nav-link active" ng-class="{'active': currentTab === 'datos_basicos'}" data-toggle="tab" role="tab" >Datos Básicos</a>
						    	</li>
						    	<li class="super_tabs nav-item"  ng-click="currentTab = 'imagenes'">
						    		<a  class="tabs nav-link" ng-class="{'active': currentTab === 'imagenes'}" data-toggle="tab" role="tab" >Imagen</a>
						    	</li>
					    	</ul>
					    	<div class="tab-content">
						    <!--  Tab content -->	
						    	<!--Datos basicos -->
							    <div id="datos_basicos" class="tab-pane active fade show"  ng-class="{'active':currentTab === 'datos_basicos'}" role="tabpanel">
							    	<!--  Cuerpo de tabs-->	
							    	<div class="row">
								        <div class="col-6 col-lg-6 col-md-6 col-xs-12 col-sm-12">
									        <div class="form-group" style="margin-top: 20px;">
									           	<select id="select_idioma" name="select_idioma" class="form-control" ng-options="option.descripcion for option in idioma track by option.id" ng-model="empresa.id_idioma">
									           		<option value=""> Seleccione Idioma </option>        	
									            </select>
									            <!-- 
													 	
									            -->
									        </div>
								        </div>
								        <div class="col-6 col-lg-6 col-md-6 col-xs-12 col-sm-12">
								        	<div class="form-group">
								    			<label>Objetivo</label>
								    			<div class="div_wisig" id="div_descripcion0" name="div_descripcion0"  ng-click="wisi_modal('0')">
								    				Pulse aquí para ingresar el contenido 
								    			</div>
											</div>
								        </div>
								        <div class="col-6 col-lg-6 col-md-6 col-xs-12 col-sm-12">
								        	<div class="form-group">
								    			<label>Misión</label>
								    			<div class="div_wisig" id="div_descripcion1" name="div_descripcion1" ng-click="wisi_modal('1')">
								    				Pulse aquí para ingresar el contenido 
								    			</div>
											</div>
								        </div>
								        <div class="col-6 col-lg-6 col-md-6 col-xs-12 col-sm-12">
								        	<div class="form-group">
								    			<label>Visión</label>
								    			<div class="div_wisig" id="div_descripcion2" name="div_descripcion1" ng-click="wisi_modal('2')">
								    				Pulse aquí para ingresar el contenido 
								    			</div>
											</div>
								        </div>
							        </div>
							    <!-- Fin de Datos basicos-->
						    	</div>    
							    <!--Imagen -->
							    <div id="imagenes" class="tab-pane fade show" ng-class="{'active':currentTab === 'imagenes'}">   
							        <div class="col-12 col-lg-12 col-md-6 col-xs-12 col-sm-12" style="margin-bottom:10px;padding:0px;">
							        	<div id="imagenes" class="">	
									    	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
												<div class="img_principal"  ng-click="seleccione_img_principal()">
													<div ng-class="{'invisible':activo_img==='activo','visible':activo_img==='inactivo'}">
														<span><i class="fa fa-picture-o" aria-hidden="true"></i> Seleccione imagen </span>
													</div>
													<div class="mensaje_img_principal" ng-class="{'visible':activo_img==='activo','invisible':activo_img==='inactivo'}">
													</div>
												</div>
									    	</div>
									    </div>	
							        </div> 
							        <!-- -->
							    <!-- Fin de imagen-->
						    	</div>
						    <!--  Fin Tab content -->		
						    </div>
						<!-- Fin Tabs -->    
						</div>
					</div>
				</div>
				<!-- Bloque de botonera -->
				{{csrf_field()}}
				<div class="botonera">
					<div class="row">
						<div class="col-6 col-lg-6 col-md-6 col-xs-12 col-sm-12">
							<div class="form-group" ng-class="{visible:empresa.id!='',invisible:empresa.id===''}">
			        			<div class="controls col-lg-6 col-md-12 col-xs-12 col-sm-12" style="float:left;">
			        				<label class="">Estatus:</label>
			        				<div ng-click="activar_check('#check_publicado');"><i id="check_publicado" class="fa fa-square-o cuadrado" style="    font-size: 20pt;" aria-hidden="true"></i></div>
			        				<div>  Publicado</div>
			        			</div>
					        </div>
					        <div style="clear:both"></div>
						</div>
						<div class="col-6 col-lg-6 col-md-6 col-xs-12 col-sm-12">
							<div class="row">
								<div class="col-lg-4 col-md-4 col-xs-12 col-sm-12 ">
									<div class="btn btn_form btn-primary" id="actualizar_articles" ng-click="actualizar_empresa()"  data-type="info">Actualizar</div>
								</div>
								<div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
									<div class="btn btn_form btn-danger" id="consultar_articles" ng-click="consultar_interno_empresa()"  href="consultar_interno_empresa">Consultar</div>
								</div>
								<div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
									<div class="btn btn_form btn-success" id="limpiar_articles" ng-click="limpiar_formulario()">Limpiar</div>
								</div>
							</div>
						</div>			
					</div>
				</div>
				<!-- Mensajes-->
				<div id="mensajes"></div>  
		    </div>
		
		</form>
	</div>    
    <!-- -->
</div>   
@include('templates.cms.partials.wisi_modal')
@include('templates.cms.partials.wisi_modal_img') 	
<!-- -->
</div>			
@endsection
@section('cuerpo_js')
    <script type="text/javascript" src="{{asset('plugins/bower_components/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/angular/controladores/quienesSomosConsultaController.js')}}"></script>
    <!-- Data tables -->
	    <script type="text/javascript" src="{{asset('plugins/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
	    <script type="text/javascript" src="{{asset('plugins/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
	    <script type="text/javascript" src="{{asset('plugins/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
   	    <script type="text/javascript" src="{{asset('plugins/bower_components/jszip/dist/jszip.min.js')}}"></script>
   	    <script type="text/javascript" src="{{asset('plugins/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
	<!-- -->    
@endsection