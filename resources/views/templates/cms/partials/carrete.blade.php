@foreach($imagenes as $clave=>$img)
	<img class="img_arcticulos" id="img_seleccionada{{$clave}}" src="{{ asset($img['path'])}}" height="115" data="{{$img['id']}}" title="{{$img['name']}}" ng-click="seleccionar_imagen($event)">
@endforeach