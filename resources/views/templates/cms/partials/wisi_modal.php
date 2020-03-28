<!--Bloque modal del sistema -->
<div class="modal fade" id="modal_contenido" name="modal_contenido" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg .modal-sm">
      <div class="modal-content">
        <div class="modal-header header_conf">
            <div id="cabecera_mensaje" name="cabecera_mensaje">
            	<h4>Contenido de la descripción:</h4>
            </div>
            <button type="button" id="cerrar_mensaje2" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body" id="cuerpo_mensaje" name="cuerpo_mensaje">
        <!--Modal body -->
        	<div class="row">
        		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        			<textarea class="form-control" id="contenido_descripcion" name="contenido_descripcion"></textarea>
        		</div>
        	</div>
        <!-- modal body-->
        </div>  
        <div class="modal-footer footer_conf">
            <!-- Footter del modal -->
              <button type="button" name="modal_reporte_salir" id="modal_reporte_salir" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
              <button type="button" name="modal_reporte_aceptar" id="modal_reporte_aceptar" class="btn btn-primary" data-dismiss="modal" ng-click="agregar_contenido()">Agregar</button>
            <!-- Fin footter del modal -->
        </div>
      </div>
    </div>
</div>
<!-- --> 