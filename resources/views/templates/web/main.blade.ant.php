<!DOCTYPE html>
<html lang="en" lang="en" ng-app="AktiveApp">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title','Default')|Aktive Digital Agency</title>

    <link rel="shortcut icon" href="{{asset('img/icono_aktive.ico')}}">

    <!-- Retina.js -->
    <script src="{{asset('js/plugins/retina.min.js')}}"></script>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Animate CSS -->
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">

    <!-- Font Awesome -->
    <!--<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">-->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Elegant Line Font -->
    <link rel="stylesheet" href="{{asset('css/et-line-font.css')}}">

    <!-- Contemporary Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700%7cDroid+Serif:400,700,400italic,700italic%7cRoboto+Slab:400,100,300,700" rel="stylesheet" type="text/css">

    <!-- Classical Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700%7cDroid+Serif:400,700,400italic,700italic%7cRoboto+Slab:400,100,300,700" rel="stylesheet" type="text/css">

    <!-- Classical Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Merriweather%7cRoboto+Slab" rel="stylesheet" type="text/css">

    <!-- Retro Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Dynalight%7cMonoton%7cMegrim%7cUnna" rel="stylesheet" type="text/css">

    <!-- Style Switcher CSS - For Demo Only -->
    <link id="changeable-colors" href="{{asset('css/jcagency.css')}}" rel="stylesheet">
    <link href="{{asset('css/styles-switcher.css')}}" rel="stylesheet">
    <!-- -->
    <link id="changeable-colors" href="{{asset('css/index.css')}}" rel="stylesheet">
    <link id="changeable-colors" href="{{asset('css/preloader.css')}}" rel="stylesheet">
    <!-- Plugin CSS -->
    <link href="{{asset('css/owl.carousel.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/owl.theme.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/owl.transitions.css')}}" rel="stylesheet" type="text/css">
    <!-- Plugins -->
    <link rel="stylesheet" href="{{asset('plugins/dzsparallaxer/dzsparallaxer.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/dzsparallaxer/dzsscroller/scroller.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/dzsparallaxer/advancedscroller/plugin.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/carrousel/carrousel.css')}}">
    @yield("cuerpo_css")
</head>
<body id="page-top" class="index">
    <main class="main">
        @include('templates.web.partials.preloader')
        @include('templates.web.partials.headerMenu')
        <section class="content" style="padding: 0px;">
            @yield('content')
        </section>
        @include('templates.web.partials.footer')
    </main>
    
    

    <!-- jQuery Version 3.1.0 -->
    <!--<script src="site_media/js/plugins/jquery-3.1.0.min.js"></script>-->
    <!-- jQuery Version 3.1.0 -->
    <script src="{{asset('js/plugins/jquery.min.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="{{asset('js/plugins/classie.js')}}"></script>
    <script src="{{asset('js/plugins/cbpAnimatedHeader.js')}}"></script>
    <script src="{{asset('js/plugins/owl.carousel.js')}}"></script>
    <script src="{{asset('js/plugins/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('js/plugins/pace.min.js')}}"></script>
    <!-- Plugins js-->
    <script src="{{asset('plugins/dzsparallaxer/dzsparallaxer.js')}}"></script>
    <script src="{{asset('plugins/dzsparallaxer/dzsscroller/scroller.js')}}"></script>
    <script src="{{asset('plugins/dzsparallaxer/advancedscroller/plugin.js')}}"></script>
    <script src="{{asset('plugins/wow/wow.min.js')}}"></script>
    <!-- -->
    <!-- Contact Form JavaScript -->
    <script src="{{asset('js/plugins/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('js/plugins/contact_me.js')}}"></script>

    <!-- ViewPortChecker plugin (used for animated sections) -->
    <script src="{{asset('js/plugins/jquery.viewportchecker.js')}}"></script>
    <script src="{{asset('plugins/carrousel/carrousel.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('js/agency.js')}}"></script>
     <script src="{{asset('js/fbasic.js')}}"></script>

   <!-- Google Maps -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDlYNNs7VBO71qiKFMNiD0R9sd8hOt0wD4"></script>
    <!-- Style Switcher Scripts - Demo Purposes Only! -->
    <script src="{{asset('demo/style.switcher.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/angular/angular.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/angular/angular-sanitize.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/angular/angular-route.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/angular/angular-cookies.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/angular/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/angular/directivas/directives.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/angular/servicios/services.js')}}"></script>


    
    @yield("cuerpo_js")
   </body>
</html>