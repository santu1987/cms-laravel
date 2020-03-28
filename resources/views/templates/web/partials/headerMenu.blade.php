<div id="header_menu" style="display: none">
        <!-- Navigation -->
        <div class="barra_superior ">
            <div>
                <div class="col-lg-6"></div>
                <div class="correo_tlf col-lg-6 texto_encabezado">
                    <div class="redes_top" style="float:right">    
                        |
                        <i class="facebook fa fa-facebook-f iconos_top" aria-hidden="true"></i>
                        <i class="twitter fa fa-twitter iconos_top" aria-hidden="true"></i>
                        <i class="instagram fa fa-linkedin iconos_top" aria-hidden="true"></i>
                    </div> 
                    <div class="phone" style="float:right">    
                        <i class="fa fa-phone" aria-hidden="true"></i>
                         +1 111 44.44.44
                    </div>  
                    <div class="contacto" style="float:right">    
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        Contacto
                    </div>
                </div>
            </div>
        </div>
        <nav id="menu_principal" class="navbar navbar-default navbar-fixed-top menu_inicial">
            <div class="container">
                <!-- Brand and toggle are grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand page-scroll" href="index.html#page-top">
                       <img  class="img_aktive" src="{{asset('public_web/img/logo_aktive2.png')}}">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul id="menu_ul" class="nav navbar-nav navbar-right ">
                        <li><a class="page-scroll menu_nav" href="index.html#services">Inicio</a></li>
                        <li><a class="page-scroll menu_nav" href="index.html#portfolio">Nosotros</a></li>
                        <li><a class="page-scroll menu_nav" href="index.html#pricing">Servicios</a></li>
                        <li><a class="page-scroll menu_nav" href="index.html#about">Noticias</a></li>
                        <li><a class="page-scroll menu_nav" href="index.html#contact">Contáctanos</a></li>
                        <li>
                            <div id="idioma" name="idioma" class="esta_espaniol " title="Translate to english">
                              <img id="bandera" class="img-flag" src="{{asset('public_web/img/flags/uk.png')}}">
                            </div>
                        </li>
                        <li class="dropdown"></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        <!-- Header -->
        <div class="cuerpo_formulario" ng-view></div>
        <!-- Fin Header -->
    </div>