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
<div ng-controller="AlbumsController">
	<form id="formulario" enctype="multipart/form-data">
		<div class="card-header">
	        <h2 class="card-title">Album de imagenes</h2>
	        <small class="card-subtitle">Cargue imagenes pertenecientes a una categoría.</small>
		</div>
		<div class="card-block animated fadeIn">
	        <div class="row">
	        	<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
					<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="padding:0px;">
				        <div class="form-group" style="margin-top: 20px;">
				           	<select id="select_categoria" name="select_categoria" class="form-control" ng-options="option.content for option in categoria track by option.id" ng-model="imagen.id_category" ng-change="consultar_galeria()" >
				           		<option value=""> Seleccione Categoría </option>        	
				            </select>
				            <!-- 
								 	
				            -->
				        </div>
				    </div>
				    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="padding:0px;">
				        <div class="form-group" style="margin-top: 20px;">
				        	<input type="text" name="nombre_archivo" id="nombre_archivo" class="form-control" placeholder="Ingrese el nombre del archivo" ng-model="imagen.name">
				        	<input type="hidden" name="id_imagen" ng-model="imagen.id">
				        </div>
				    </div>
				    <div>
				    <!-- -->
				    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="padding:0px;">
				    	<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 left" style="padding-left:0px;">
					    	<div class="btn btn_form btn-primary" id="registrar_imagen" ng-click="guardar_imagen()"  data-type="info">Registrar</div>
						</div>
						<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 left" style="padding-left:0px;">
							<div class="btn btn_form btn-success" id="limpiar_imagen" ng-click="limpiar_formulario()">Limpiar</div>
						</div>
						<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 left" style="padding-left:0px;" ng-class="{visible:longitud!==0,invisible:longitud===0}">
							<div class="btn btn_form btn-danger" id="limpiar_imagen" ng-click="eliminar_files()">Eliminar</div>
						</div>
					</div>
				    <!-- -->	
				    </div>
				</div>
				<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">    
				    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="padding:0px;">
				    	<input id ="file" name="file" type="file" uploader-model="file" style="display:none">
					    <!--  uploader-model="file"  ng-file-model="file"-->
						<div class="col-lg-12" id="cuerpo_btn_img">
							<label for="file">
						        <div class="form-group" style="margin-top: 20px;">
							        <div class="contenedor_icono">
							        	<div class="circulo_fuente">
							        		<i class="fa fa-picture-o" aria-hidden="true"></i>
							        	</div>
							        </div>
							        <div class="titulo_imagen">
							        	<label>Pulse el circulo para cargar la imagen</label>
							        </div>
							        <div style="clear:both"></div>
						        </div>
						    </label>
					    </div>
					    <div class="col-lg-12 hidden" id="cuerpo_preview_img" style="padding:0px;">
						    <output class="img_load ">
								<div id="list" style="padding-bottom:2px;">
									<div id="previa" class="img_preview img-responsive">

									</div>
								</div>
							</output>
						<div style="clear:both"></div>

						</div>	    
				    </div>
				</div>    
			    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="margin-bottom:10px;padding:0px;">
		        	<div id="imagenes" class="carrete_imagenes">	
				    	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
							<div class="img_principal ">
								<div ng-class="{'invisible':activo_img==='activo','visible':activo_img==='inactivo'}">
									<span><i class="fa fa-picture-o" aria-hidden="true"></i> Carrete de imagenes </span>
								</div>
								<div id="cuadro_img" class="mensaje_img_principal" ng-class="{'visible':activo_img==='activo','invisible':activo_img==='inactivo'}" >
									
								</div>
								<div style="clear:both"></div>
							</div>
				    	</div>
				    </div>	
		        </div> 
			</div>
		</div>	        
	</form>
</div>

@endsection
@section('cuerpo_js')
    <script type="text/javascript" src="{{asset('plugins/bower_components/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/angular/controladores/AlbumsController.js')}}"></script>
@endsection