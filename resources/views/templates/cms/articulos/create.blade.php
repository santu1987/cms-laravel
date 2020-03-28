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
<div ng-controller="ArticulosController">
<form id="formulario" enctype="multipart/form-data">
	<div class="card-header">
	        <h2 class="card-title">Crear artículos</h2>
	        <small class="card-subtitle">Ingrese el contenido de los datos del artículo.</small>
	</div>
    <div class="card-block animated fadeIn">
        <div class="row">
	        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
		        <div class="form-group form-group--float" >
		            <input id="title" name="title" type="text" class="form-control form-control-sm limpiar" ng-model="article.title" onKeyPress="return valida(event,this,16,50)" onBlur="valida2(this,16,50);">
		            <label>Título:</label>
		            <i class="form-group__bar"></i>
		        </div>
	        </div>
	        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
		        <div class="form-group" style="margin-top: 20px;">
		           	<select id="select_categoria" name="select_categoria" class="select2" ng-options="option.name for option in categoria track by option.id" ng-model="article.category_id">
		           		<option value=""> Seleccione Categoría </option>        	
		            </select>
		            <!-- 
						 	
		            -->
		        </div>
	        </div>
	        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
		        <div class="form-group" style="margin-top: 20px;">
		           	<select id="select_tag" name="select_tag" ng-model="article.art_tag" class="select2" multiple ng-options="option.name for option in tags track by option.id" >
		           		<option value=""> Seleccione Tags </option>      	
		            </select>
		        </div>
	        </div>
	        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
	        </div>
	        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
	        	<div class="form-group">
	    			<label>Descripción</label>
	    			<div class="div_wisig" id="div_descripcion_articulo" ng-click="wisi_modal()">
	    				Pulse aquí para ingresar el contenido 
	    			</div>
				</div>
	        </div>
	        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12" style="margin-bottom:10px;padding:0px;">
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
	    </div>
	        
		{{csrf_field()}}
		<div class="botonera">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 ">
					<div class="btn btn_form btn-primary" id="registrar_articles" ng-click="registrar_articles()"  data-type="info">Registrar</div>
				</div>
				<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
					<a class="btn btn_form btn-danger" id="consultar_articles"  href="/administrador/articulos">Consultar</a>
				</div>
				<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
					<div class="btn btn_form btn-success" id="limpiar_articles" ng-click="limpiar_formulario()">Limpiar</div>
				</div>		
			</div>
		</div>
		<div id="mensajes"></div>    
    </div>
</form>    
</div>    
<!--Bloque modal del sistema -->
<div class="modal fade" id="modal_img1" name="modal_img1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg .modal-sm">
      <div class="modal-content">
        <div class="modal-header header_conf">
            <button type="button" id="cerrar_mensaje2" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <div id="cabecera_mensaje" name="cabecera_mensaje">
            	<h3><b>Información:</b> Seleccione uma imagen</h3>
            </div>
            <div style="clear:both"></div>
        </div>
        <div class="modal-body" id="cuerpo_mensaje" name="cuerpo_mensaje">
	        <!--Modal body -->
	        {% galery.length %}
			<div class="centrar_galeria" ng-show="galery.length ==0">Galería de imágenes noticias</div>
			<div id="" ng-show="galery.length!=0" class="fade-in-out">
				<div>
					<div class="form-group">
						<input type='text' name='filtro_noticias' id='filtro_noticias' placeholder='Ingrese el valor a filtrar' class="form-control" ng-model="searchNoticias">
					</div>
					<div class="col-lg-12" padding="0px;">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 divbiblioteca" ng-repeat="imagen in galery|filter:searchNoticias track by $index">
							<img class="imgbiblioteca"  id="img_biblioteca{%$index%}" ng-src="{%imagen.path_imagen%}" height="115" data="{%imagen.id%}|{%imagen.path_imagen%}" data-ng-click="seleccionar_imagen($event)">
						</div>
					</div>
				</div>
			</div>
			<div style="clear:both"></div>
	        <!-- modal body-->
        </div>  
        <div class="modal-footer footer_conf">
            <!-- Footter del modal -->
              <button type="button" name="modal_reporte_salir" id="modal_reporte_salir" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <!-- Fin footter del modal -->
        </div>
        <div style="clear:both"></div>
      </div>
    </div>
</div>
<!-- -->
@endsection
@section('cuerpo_js')
    <script type="text/javascript" src="{{asset('plugins/bower_components/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/angular/controladores/ArticulosController.js')}}"></script>
@endsection

