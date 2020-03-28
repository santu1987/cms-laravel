<div ng-controller="quienesSomosController">
<form id="formulario" enctype="multipart/form-data">
	<div class="card-header">
	        <h2 class="card-title">Datos de la empresa</h2>
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
				<div class="col-6 col-lg-6 col-md-6 col-xs-12 col-sm-12"></div>
				<div class="col-6 col-lg-6 col-md-6 col-xs-12 col-sm-12">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-xs-12 col-sm-12 ">
							<div class="btn btn_form btn-primary" id="registrar_articles" ng-click="registrar_empresa()"  data-type="info">Registrar</div>
						</div>
						<div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
							<a class="btn btn_form btn-danger" id="consultar_articles"  href="/administrador/nosotros/datatable_nosotros">Consultar</a>
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
@include('templates.cms.partials.wisi_modal')
@include('templates.cms.partials.wisi_modal_img')
</form>    
</div> 