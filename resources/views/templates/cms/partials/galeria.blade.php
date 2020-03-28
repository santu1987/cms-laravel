<div class="centrar_galeria" ng-show="galery.length ==0">Galería de imágenes artículos</div>
<div id="" ng-show="galery.length!=0" class="fade-in-out">
	<div>
		<div class="form-group">
			<input type='text' name='filtro_noticias' id='filtro_noticias' placeholder='Ingrese el valor a filtrar' class="form-control" ng-model="searchNoticias">
		</div>
		<div class="col-lg-12" padding="0px;">
			@foreach($imagenes as $key=>$image)
				<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 divbiblioteca" style="float:left">
					<img class="imgbiblioteca"  id="img_biblioteca{{$key}}" ng-src="{{ asset($image['path'])}}" height="115" data="{{$image['id']}}|{{$image['path']}}" data-ng-click="seleccionar_imagen($event)">
					<div style="clear:both"></div>
				</div>
			@endforeach
			<div style="clear:both"></div>						
		</div>
	</div>
</div>
<div style="clear:both"></div>