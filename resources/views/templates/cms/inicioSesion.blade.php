<div ng-controller="inicioController">
    <form id="form_inicio" name="form_inicio" role="form" method="POST" >
   
        <div class="login">
            <!-- Login -->
            <div class="login__block active" id="l-login">
                <div class="login__block__header">
                    <div class="contenedor_icono">
                        <div class="circulo_fuente" style="background-color:#fff">
                            <i class="fa fa-rocket icono_cms" aria-hidden="true"></i>
                        </div>
                    </div>            
                    Content Manager 4.0
                </div>

                <div class="login__block__body">
                    <div class="form-group form-group--float form-group--centered">
                        <input type="text" class="form-control" id="email" name="email" ng-model="login">
                        <label>Ingrese su usuario</label>
                        <i class="form-group__bar"></i>
                    </div>

                    <div class="form-group form-group--float form-group--centered">
                        <input type="password" class="form-control" id="clave" name="clave" ng-model="clave">
                        <label>Ingrese clave</label>
                        <i class="form-group__bar"></i>
                    </div>

                    <div class="btn btn-primary" ng-click="inciar_sesion()">Ingresar</div>
                </div>
            </div>
            <!-- -->
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
</div>
@section('cuerpo_js')
    <script type="text/javascript" src="{{asset('js/angular/controladores/inicioController.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/bower_components/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js')}}"></script>
@endsection