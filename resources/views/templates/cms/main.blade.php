<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" ng-app="ContentManagerApp" class=" ">
<head>
	<meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{asset('plugins/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/bower_components/animate.css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/bower_components/jquery.scrollbar/jquery.scrollbar.css')}}">
    <!-- App styles -->

    <link rel="stylesheet" href="{{asset('css/app.min.css')}}">
	<title>@yield('title','Default')| CMS V4.0</title>
	<!--Bloque de css -->

    <link href="{{asset('fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
    <!--<link href="{{asset('plugins/bower_components/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">-->
    <link href="{{asset('plugins/bower_components/select2/dist/css/select2.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('plugins/bower_components/trumbowyg/dist/ui/trumbowyg.min.css')}}" rel="stylesheet" type="text/css" >
    <!--<link href="{{asset('plugins/bower_components/bootstrapSelect/css/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css" >-->
    <link href="{{asset('plugins/sweetalert/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">
    @yield('cuerpo_css')
</head>
<body data-ma-theme="cyan" >
    <main class="main">
        @include('templates.cms.partials.preloader')
        @include('templates.cms.partials.nav')
        @yield('side_bar')
        <section class="content">
            <div class="content__inner">
                <div class="card">
                    @yield('content')
                </div>
            </div>
            @yield('menu_rapido')
        </section>
        <section>
            @yield('inicio_sesion')
        </section>
        <footer class="footer hidden-xs-down">
            <p>© Axioma developers derechos reservados</p>
        </footer>
    </main> 
</body>
 <!-- Javascript -->
    <script type="text/javascript" src="{{asset('plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/bower_components/tether/dist/js/tether.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!--<script type="text/javascript" src="{{asset('plugins/bower_components/bootstrapSelect/js/bootstrap-select.min.js')}}"></script>-->
    <script type="text/javascript" src="{{asset('plugins/bower_components/Waves/dist/waves.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/bower_components/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/bower_components/jquery-scrollLock/jquery-scrollLock.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/bower_components/autosize/dist/autosize.min.js')}}"></script>
    <!--<script type="text/javascript" src="{{asset('plugins/bower_components/sweetalert2/dist/sweetalert2.min.js')}}"></script>-->
    <script type="text/javascript" src="{{asset('plugins/bower_components/select2/dist/js/select2.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/bower_components/trumbowyg/dist/trumbowyg.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/sweetalert/sweetalert2.min.js')}}"></script>


    <!-- App functions and actions -->
    <script type="text/javascript" src="{{asset('js/app.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/fbasic.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/index.js')}}"></script>
    <!-- -->
    <!-- CORE ANGULAR SCRIPTS -->
    <script type="text/javascript" src="{{asset('js/angular/angular.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/angular/angular-sanitize.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/angular/angular-route.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/angular/angular-cookies.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/angular/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/angular/directivas/directives.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/angular/servicios/services.js')}}"></script>
    <!-- END CORE ANGULAR -->



    @yield('cuerpo_js')
</html>