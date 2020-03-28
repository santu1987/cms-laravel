<!DOCTYPE html>
<html lang="en" lang="en" ng-app="AktiveApp">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title','Default')|Aktive Digital Agency</title>

    <link rel="shortcut icon" href="{{asset('public_web/img/icono_aktive.ico')}}">

    <!-- Retina.js -->
    <script src="{{asset('public_web/js/plugins/retina.min.js')}}"></script>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('public_web/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Animate CSS -->
    <link href="{{asset('public_web/css/animate.css')}}" rel="stylesheet">

    <!-- Font Awesome -->
    <!--<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">-->
    <link href="{{asset('public_web/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Elegant Line Font -->
    <link rel="stylesheet" href="{{asset('public_web/css/et-line-font.css')}}">

    <!-- Contemporary Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700%7cDroid+Serif:400,700,400italic,700italic%7cRoboto+Slab:400,100,300,700" rel="stylesheet" type="text/css">

    <!-- Classical Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700%7cDroid+Serif:400,700,400italic,700italic%7cRoboto+Slab:400,100,300,700" rel="stylesheet" type="text/css">

    <!-- Classical Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Merriweather%7cRoboto+Slab" rel="stylesheet" type="text/css">

    <!-- Retro Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Dynalight%7cMonoton%7cMegrim%7cUnna" rel="stylesheet" type="text/css">

    <!-- Style Switcher CSS - For Demo Only -->
    <link id="changeable-colors" href="{{asset('public_web/css/jcagency.css')}}" rel="stylesheet">
    <link href="{{asset('public_web/css/styles-switcher.css')}}" rel="stylesheet">
    <!-- -->
    <link id="changeable-colors" href="{{asset('public_web/css/index.css')}}" rel="stylesheet">
    <link id="changeable-colors" href="{{asset('public_web/css/preloader.css')}}" rel="stylesheet">
    <!-- Plugin CSS -->
    <link href="{{asset('public_web/css/owl.carousel.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public_web/css/owl.theme.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public_web/css/owl.transitions.css')}}" rel="stylesheet" type="text/css">
    <!-- Plugins -->
    <link rel="stylesheet" href="{{asset('public_web/plugins/dzsparallaxer/dzsparallaxer.css')}}">
    <link rel="stylesheet" href="{{asset('public_web/plugins/dzsparallaxer/dzsscroller/scroller.css')}}">
    <link rel="stylesheet" href="{{asset('public_web/plugins/dzsparallaxer/advancedscroller/plugin.css')}}">
    <link rel="stylesheet" href="{{asset('public_web/plugins/carrousel/carrousel.css')}}">
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
    <script src="{{asset('public_web/js/plugins/jquery.min.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('public_web/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="{{asset('public_web/js/plugins/classie.js')}}"></script>
    <script src="{{asset('public_web/js/plugins/cbpAnimatedHeader.js')}}"></script>
    <script src="{{asset('public_web/js/plugins/owl.carousel.js')}}"></script>
    <script src="{{asset('public_web/js/plugins/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('public_web/js/plugins/pace.min.js')}}"></script>
    <!-- Plugins js-->
    <script src="{{asset('public_web/plugins/dzsparallaxer/dzsparallaxer.js')}}"></script>
    <script src="{{asset('public_web/plugins/dzsparallaxer/dzsscroller/scroller.js')}}"></script>
    <script src="{{asset('public_web/plugins/dzsparallaxer/advancedscroller/plugin.js')}}"></script>
    <script src="{{asset('public_web/plugins/wow/wow.min.js')}}"></script>
    <!-- -->
    <!-- Contact Form JavaScript -->
    <script src="{{asset('public_web/js/plugins/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('public_web/js/plugins/contact_me.js')}}"></script>

    <!-- ViewPortChecker plugin (used for animated sections) -->
    <script src="{{asset('public_web/js/plugins/jquery.viewportchecker.js')}}"></script>
    <script src="{{asset('public_web/plugins/carrousel/carrousel.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('public_web/js/agency.js')}}"></script>
     <script src="{{asset('public_web/js/fbasic.js')}}"></script>

   <!-- Google Maps -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDlYNNs7VBO71qiKFMNiD0R9sd8hOt0wD4"></script>
    <!-- Style Switcher Scripts - Demo Purposes Only! -->
    <script src="{{asset('public_web/demo/style.switcher.js')}}"></script>
    <script type="text/javascript" src="{{asset('public_web/js/angular/angular.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public_web/js/angular/angular-sanitize.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public_web/js/angular/angular-route.js')}}"></script>
    <script type="text/javascript" src="{{asset('public_web/js/angular/angular-cookies.js')}}"></script>
    <script type="text/javascript" src="{{asset('public_web/js/angular/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('public_web/js/angular/directivas/directives.js')}}"></script>
    <script type="text/javascript" src="{{asset('public_web/js/angular/servicios/services.js')}}"></script>


    
    @yield("cuerpo_js")
   </body>
</html>
