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
        <div class="modal-body super_contenedor_imagenes" id="cuerpo_mensaje" name="cuerpo_mensaje">
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