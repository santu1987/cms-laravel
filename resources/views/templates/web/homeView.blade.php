<div style="display: none" ng-controller="inicioController" id="contenedorHome">
    <!-- Nuevo slider-->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li id="slide1" data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li id="slide2" data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li id="slide3" data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active g-bg-cover g-bg-black-opacity-0_3--after">
            <img class="im_carrousel"  src="{{asset('public_web/img/slider/slider1.jpg')}}" data-color="lightblue" alt="First Image">
            <div class="carousel-caption">
                <h2 class="title_carrousel">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </h2>
                <div style="margin-top: 50px;">
                    <div class="call_to_action">Ver portafolio</div>
                </div>
            </div>
        </div>
        <div class="item g-bg-cover g-bg-black-opacity-0_3--after">
            <img class="im_carrousel" src="{{asset('public_web/img/slider/slider2.jpg')}}" data-color="firebrick" alt="Second Image">
            <div class="carousel-caption">
                <h2 class="title_carrousel"> Nunc efficitur id dolor vel venenatis</h2>
                <!--<div>
                    <div class="call_to_action">Texto Ejem</div>
                </div>-->
            </div>
        </div>
        <div class="item g-bg-cover g-bg-black-opacity-0_3--after">
            <img class="im_carrousel" src="{{asset('public_web/img/slider/slider3.jpg')}}" data-color="violet" alt="Third Image">
            <div class="carousel-caption">
                <h2 class="title_carrousel">Orci varius natoque penatibus et magnis </h2>
            </div>
        </div>
    </div>
    <!-- Controls -->
    <a class="left carousel-control" href="" role="button" data-slide="prev" data-target="#carouselExampleIndicators" >
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="" role="button" data-slide="next" data-target="#carouselExampleIndicators" >
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <div style="clear:both"></div>
</div>
    <!--Nosotros-->
    <section id="seccion_nosotros">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading super_titulo">SOMOS AKTIVE</h2>
                    <div class="contenido">
                        <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                    </div>    
                </div>
            </div>
            <div class="row text-center">
                <div class="service-item col-md-6">
                    <img class="imagen_nosotros" src="{{asset('public_web/img/nosotros/nosotros.jpg')}}">
                </div>
                <div class="service-item col-md-6">
                    <div id="contenido_nosotros">
                        <h4 class="service-heading super_titulo">DIGITAL AGENCY</h4>
                        <p class="text-muted texto_nosotros">  Donec in nisl id nunc pharetra vestibulum a tempor massa. Phasellus imperdiet condimentum lorem, sed condimentum ligula fermentum sit amet. Fusce eros velit, mattis in euismod sed, porttitor sed felis. Nulla aliquam dapibus posuere. Sed ac rhoncus lorem.</p>
                    </div>
                    <div class="col-12">
                        <div class="btn btn-primary">Ver nuestro portafolio</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="super_btn" style="">
                      <a class="btn btn-primary btn_centrado fadeInUp" href="">Leer más</a>
                    </div>              
                </div>
            </div>
        </div>
    </section>
    <!-- --> 
    <!--Servicios -->
    <!--PARALLAX-->
    <div id="prlx_servicios" class="dzsparallaxer auto-init height-is-based-on-content use-loading">
    <!-- stylesheets -->
        <div class="super_parallax divimage dzsparallaxer--target w-100 g-bg-size-cover g-bg-img-hero g-bg-cover g-bg-black-opacity-0_6--after" style="height: 130%; background-image: url('{{asset('public_web/img/parallax/servicios.jpg')}}');"></div>
        <div class="container g-pt-100 g-pb-70">
          <div class="row centrado">
            <div class="col-sm-6 col-lg-6 align-items-end mt-auto g-mb-50 texto_parallax">
              <div class="text-center">
                <h1 class="d-inline-block g-color-secondary g-font-weight-800 g-font-size-26 mb-0 g-z-index-1"> SERVICIOS </h1>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- -->
    <section id="services" class="bg-light-gray">
        <div class="container">
            <div class="row text-center ">
                <div class="service-item col-md-4">
                    <div class="glyph color_icono icono_service" style="padding: 0px;"><i class="fa fa-file-text-o"></i></div>
                    <h4 class="service-heading super_titulo">Diseño de marcas</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    
                </div><!-- /.service-item -->
                <div class="service-item col-md-4">
                    <div class="glyph color_icono icono_service" style="padding: 0px;"><i class="fa fa-laptop"></i></div>
                    <h4 class="service-heading super_titulo">Marketing Digital</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    
                </div><!-- /.service-item -->
                <div class="service-item col-md-4">
                    <div class="glyph color_icono icono_service" style="padding: 0px;"><i class="fa fa-tablet"></i></div>
                    <h4 class="service-heading super_titulo">Diseño web adaptable</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    
                </div><!-- /.service-item -->
            </div><!-- /.row -->
            <div class="row text-center" style="margin-top: 20px;">
                <div class="service-item col-md-4">
                    <div class="glyph color_icono icono_service" style="padding: 0px;"><i class="fa fa-file-picture-o"></i></div>
                    <h4 class="service-heading super_titulo">Diseño gráfico</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    
                </div><!-- /.service-item -->
                <div class="service-item col-md-4">
                     <div class="glyph color_icono icono_service" style="padding: 0px;"><i class="fa fa-facebook-square"></i></div>
                    <h4 class="service-heading super_titulo">Redes sociales</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    
                </div><!-- /.service-item -->
                <div class="service-item col-md-4">
                    <div class="glyph color_icono icono_service" style="padding: 0px;"><i class="fa fa-bar-chart"></i></div>
                    <h4 class="service-heading super_titulo">Consultoría</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    
                </div><!-- /.service-item -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="super_btn" style="">
                      <a class="btn btn-primary btn_centrado fadeInUp" href="">Ver más</a>
                    </div>              
                </div>
            </div>
        </div><!-- /.container -->
    </section>
    <!--Portafolio -->
    <!--PARALLAX-->
    <div id="prlx_portafolio" class="dzsparallaxer auto-init height-is-based-on-content use-loading">
    <!-- stylesheets -->
        <div class="super_parallax divimage dzsparallaxer--target w-100 g-bg-size-cover g-bg-img-hero g-bg-cover g-bg-black-opacity-0_6--after" style="height: 130%; background-image: url('{{asset('public_web/img/parallax/portafolio.jpg')}}');"></div>
        <div class="container g-pt-100 g-pb-70">
          <div class="row centrado">
            <div class="col-sm-6 col-lg-6 align-items-end mt-auto g-mb-50 texto_parallax">
              <div class="text-center">
                <h1 class="d-inline-block g-color-secondary g-font-weight-800 g-font-size-26 mb-0 g-z-index-1"> Portafolio </h1>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- -->
    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <ul class="list-inline" id="filters">
                        <li><button data-filter="*" type="button" class="btn btn-primary btn-square btn-raised active">Todos</button>
                        </li>
                        <li><button data-filter=".marcas" type="button" class="btn btn-primary btn-square btn-raised" data-toggle="tooltip" title="1" >Marcas</button>
                        </li>
                        <li><button data-filter=".graphic" type="button" class="btn btn-primary btn-square btn-raised" data-toggle="tooltip" data-placement="top" title="2" >Diseño gráfico</button>
                        </li>
                        <li><button data-filter=".web" type="button" class="btn btn-primary btn-square btn-raised">Websites</button>
                        </li>
                    </ul><!-- /ul -->
                </div>
            </div><!-- /.row -->
            <div class="row">
                <div class="isotope">
                <div class="col-md-4 col-sm-6 portfolio-item graphic">
                    <a href="" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <div class="btn btn-primary">Ver mas</div>
                            </div>
                        </div>
                        <img src="{{asset('public_web/img/portfolio/diseño_grafico1.png')}}" class="img-responsive img-portfolio" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4 class="super_titulo">Diseño de logos</h4>
                        <p class="text-muted">Diseño gráfico</p>
                    </div>
                </div><!-- /.portfolio-item -->
                <div class="col-md-4 col-sm-6 portfolio-item graphic">
                    <a href="" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <div class="btn btn-primary">Ver mas</div>
                            </div>
                        </div>
                        <img src="{{asset('public_web/img/portfolio/diseño_grafico2.png')}}" class="img-responsive img-portfolio" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4 class="super_titulo">Material pop</h4>
                        <p class="text-muted">Diseño gráfico</p>
                    </div>
                </div><!-- /.portfolio-item -->
                <div class="col-md-4 col-sm-6 portfolio-item marcas">
                    <a href="" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <div class="btn btn-primary">Ver mas</div>
                            </div>
                        </div>
                        <img src="{{asset('public_web/img/portfolio/diseño_marca1.jpg')}}" class="img-responsive img-portfolio" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4 class="super_titulo">Diseño de marca</h4>
                        <p class="text-muted">Imagen empresarial</p>
                    </div>
                </div><!-- /.portfolio-item -->
                <div class="col-md-4 col-sm-6 portfolio-item web">
                    <a href="" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <div class="btn btn-primary">Ver mas</div>
                            </div>
                        </div>
                        <img src="{{asset('public_web/img/portfolio/pagina_web1.png')}}" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4 class="super_titulo">Web Euroglobalrsi</h4>
                        <p class="text-muted">Diseño Web</p>
                    </div>
                </div><!-- /.portfolio-item -->
                <div class="col-md-4 col-sm-6 portfolio-item web">
                    <a href="" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <div class="btn btn-primary">Ver mas</div>
                            </div>
                        </div>
                        <img src="{{asset('public_web/img/portfolio/pagina_web2.png')}}" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4 class="super_titulo">Web Aktive</h4>
                        <p class="text-muted">Diseño Web</p>
                    </div>
                </div><!-- /.portfolio-item -->
                <div class="col-md-4 col-sm-6 portfolio-item web">
                    <a href="" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <div class="btn btn-primary">Ver mas</div>
                            </div>
                        </div>
                        <img src="{{asset('public_web/img/portfolio/pagina_web3.png')}}" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4 class="super_titulo">Web Esaica</h4>
                        <p class="text-muted">Diseño Web</p>
                    </div>
                </div><!-- /.portfolio-item -->
            </div><!-- /.isotope -->
        </div><!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="super_btn" style="">
                  <a class="btn btn-primary btn_centrado fadeInUp" href="">Leer más</a>
                </div>              
            </div>
        </div>
    </div><!-- /.container -->
    </section>
    <!--Partners -->
    <!--PARALLAX-->
    <div id="prlx_portafolio" class="dzsparallaxer auto-init height-is-based-on-content use-loading">
    <!-- stylesheets -->
        <div class="super_parallax divimage dzsparallaxer--target w-100 g-bg-size-cover g-bg-img-hero g-bg-cover g-bg-black-opacity-0_6--after" style="height: 130%; background-image: url('{{asset('public_web/img/parallax/clientes.jpg')}}');"></div>
        <div class="container g-pt-100 g-pb-70">
          <div class="row centrado">
            <div class="col-sm-6 col-lg-6 align-items-end mt-auto g-mb-50 texto_parallax">
              <div class="text-center">
                <h1 class="d-inline-block g-color-secondary g-font-weight-800 g-font-size-26 mb-0 g-z-index-1"> Clientes </h1>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- Clients Slider -->
    <section id="clientes" class="">
        <div class="container">
            <div class="row cuerpo_clientes animated fadeInUp">
                <div class="col-lg-12 text-center">
                    <h3 class="section-subheading text-muted" style="text-align: justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ullamcorper scelerisque varius. Sed pretium consectetur augue, id malesuada lacus tincidunt sed. Nulla facilisi. Phasellus id purus consectetur, ultrices ligula vel, aliquet tortor. Quisque interdum dictum turpis eu eleifend</h3>
                </div>
            </div>
        </div>    
        <aside class="clients" id="clients">
            <div class="container">
                <div id="clients-carousel" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                    <div class="item active">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <a href="index.html#">
                                    <img src="{{asset('public_web/img/logos/logo1.jpg')}}" class="img-responsive img-centered img_clientes" alt="">
                                </a>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <a href="index.html#">
                                    <img src="{{asset('public_web/img/logos/logo2.jpg')}}" class="img-responsive img-centered img_clientes" alt="">
                                </a>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <a href="index.html#">
                                    <img src="{{asset('public_web/img/logos/logo3.jpg')}}" class="img-responsive img-centered img_clientes" alt="" style="width:250px;">
                                </a>
                            </div>
                            <div style="clear:both"></div>
                        </div>
                    </div><!-- /.item -->
                    <div class="item">
                        <div class="row">
                             <div class="col-md-4 col-sm-6">
                                <a href="index.html#">
                                    <img src="{{asset('public_web/img/logos/logo4.jpg')}}" class="img-responsive img-centered img_clientes" alt="">
                                </a>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <a href="index.html#">
                                    <img src="{{asset('public_web/img/logos/logo5.jpg')}}" class="img-responsive img-centered img_clientes" alt="">
                                </a>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <a href="index.html#">
                                    <img src="{{asset('public_web/img/logos/logo6.jpg')}}" class="img-responsive img-centered img_clientes" alt="">
                                </a>
                            </div>   
                            <div style="clear:both"></div>                 
                        </div> 
                    </div><!-- /.item -->

                    </div><!-- /.carousel-inner -->

                    <!-- Indicators -->
                      <ol class="carousel-indicators">
                        <li data-target="#clients-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#clients-carousel" data-slide-to="1"></li>
                      </ol><!-- /ol -->

                </div><!-- /.carousel -->
            </div><!-- /.container -->
        </aside>
    </section>
    <!-- -->
    <!--PARALLAX-->
    <div id="prlx_portafolio" class="dzsparallaxer auto-init height-is-based-on-content use-loading">
    <!-- stylesheets -->
        <div class="super_parallax divimage dzsparallaxer--target w-100 g-bg-size-cover g-bg-img-hero g-bg-cover g-bg-black-opacity-0_6--after" style="height: 130%; background-image: url('{{asset('public_web/img/parallax/noticias.jpg')}}');"></div>
        <div class="container g-pt-100 g-pb-70">
          <div class="row centrado">
            <div class="col-sm-6 col-lg-6 align-items-end mt-auto g-mb-50 texto_parallax">
              <div class="text-center">
                <h1 class="d-inline-block g-color-secondary g-font-weight-800 g-font-size-26 mb-0 g-z-index-1"> Noticias </h1>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- Noticias -->    
    <section class="noticias " >
        <div class="container">
            <div class="row blog-row">
                <div class="col-md-4 col-lg-4 blog-col">
                    <a href="index.html#newsModal1" data-toggle="modal" class="blog-preview-img">
                        <div class="caption">
                            <div class="caption-content">
                                <div class="caption-content">
                                    <div class="btn btn-primary">Leer mas</div>
                                </div>
                            </div>
                        </div>
                        <img src="{{asset('public_web/img/blog1.jpg')}}" class="img-responsive image_fotos" alt="">
                    </a>
                    <div class="blog-preview-content">
                        <h3>
                            <a href="index.html#" class="super_titulo">Lorem ipsum dolor sit amet</a>
                        </h3>
                        <ul class="meta list-inline">
                            <div>
                              <i class="fa fa-user" aria-hidden="true"></i>
                              <label>Administrador</label>
                            </div>
                            <div>
                              <i class="fa fa-calendar" aria-hidden="true"></i>
                              12/12/2017
                            </div>
                            <div style="clear:both"></div>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, quisquam, sunt, corporis.</p>
                        <div class="continue"><a href="index.html#">Leer mas→</a>
                        </div>
                        
                    </div><!-- /.blog-preview-content -->
                </div><!-- /.blog-col -->
                <div class="col-md-4 col-lg-4 blog-col">
                    <a href="index.html#newsModal2" data-toggle="modal" class="blog-preview-img">
                        <div class="caption">
                            <div class="caption-content">
                                <div class="caption-content">
                                    <div class="btn btn-primary">Leer mas</div>
                                </div>
                            </div>
                        </div>
                        <img src="{{asset('public_web/img/blog2.jpg')}}" class="img-responsive image_fotos" alt="">
                    </a>
                    <div class="blog-preview-content">
                        <h3>
                            <a href="index.html#" class="super_titulo">Consectetur adipisicing elit</a>
                        </h3>
                        <ul class="meta list-inline">
                            <div>
                              <i class="fa fa-user" aria-hidden="true"></i>
                              <label>Administrador</label>
                            </div>
                            <div>
                              <i class="fa fa-calendar" aria-hidden="true"></i>
                              12/12/2017
                            </div>
                            <div style="clear:both"></div>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, quisquam, sunt, corporis.</p>
                        <div class="continue"><a href="index.html#">Leer más →</a>
                        </div>
                        
                    </div><!-- /.blog-preview-content -->
                </div><!-- /.blog-col -->
                <div class="col-md-4 col-lg-4 blog-col">
                    <a href="index.html#newsModal3" data-toggle="modal" class="blog-preview-img image_fotos">
                       <div class="caption">
                            <div class="caption-content">
                                <div class="caption-content">
                                    <div class="btn btn-primary">Leer mas</div>
                                </div>
                            </div>
                        </div>
                        <img src="{{asset('public_web/img/blog3.jpg')}}" class="img-responsive image_fotos" alt="">
                    </a>
                    <div class="blog-preview-content">
                        <h3>
                            <a href="index.html#" class="super_titulo">Nam quisquam sunt</a>
                        </h3>
                        <ul class="meta list-inline">
                            <div>
                              <i class="fa fa-user" aria-hidden="true"></i>
                              <label>Administrador</label>
                            </div>
                            <div>
                              <i class="fa fa-calendar" aria-hidden="true"></i>
                              12/12/2017
                            </div>
                            <div style="clear:both"></div>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, quisquam, sunt, corporis.</p>
                        <div class="continue"><a href="index.html#">Leer mas →</a>
                        </div>
                    </div><!-- /.blog-preview-content -->
                </div><!-- /.blog-col -->
            </div><!-- /.blog-row -->
            <div class="row" style="padding-top: 100px;">
                <div class="col-12">
                    <div class="super_btn" style="">
                      <a class="btn btn-primary btn_centrado fadeInUp" href="">Leer más</a>
                    </div>              
                </div>
            </div>
        </div><!-- /.container -->
    </section>
    <!--PARALLAX-->
    <div id="prlx_servicios" class="dzsparallaxer auto-init height-is-based-on-content use-loading">
    <!-- stylesheets -->
        <div class="super_parallax divimage dzsparallaxer--target w-100 g-bg-size-cover g-bg-img-hero g-bg-cover g-bg-black-opacity-0_6--after" style="height: 130%; background-image: url('{{asset('public_web/img/parallax/redes_sociales.jpg')}}');"></div>
        <div class="container g-pt-100 g-pb-70">
          <div class="row centrado">
            <div class="col-sm-6 col-lg-6 align-items-end mt-auto g-mb-50 texto_parallax">
              <div class="text-center">
                <h1 class="d-inline-block g-color-secondary g-font-weight-800 g-font-size-26 mb-0 g-z-index-1"> REDES SOCIALES </h1>
              </div>
            </div>
          </div>
        </div>
    </div>
    <section id="redes_sociales">
        <div class="container">
            <div class="row">
                <p class="introduccion_parrafos" style="text-align: center">
                </p>
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 padding0 fadeInUp wow">
                  <div style="" class="cuerpo_redes col-lg-12 col-md-12 col-xs-12 col-sm-12">
                    <div class="col-4 col-lg-4 padding0 redes_individual" style="float:left;display: flex; margin: 0 auto;">  
                      <div class="redes_individual" style="display: flex;margin: 0 auto">
                        <div class="contenedor_icono_pasos">
                          <div class="iconos_pasos iconos_redes">
                            <i class="fa fa-facebook color_icono2" aria-hidden="true"></i>
                          </div>
                        </div>  
                      </div>
                      <div style="clear:both"></div>  
                    </div>
                    <div class="col-4 col-lg-4 padding0 redes_individual" style="float:left;display: flex; margin: 0 auto;" title="Facebook">
                      <div  class="redes_individual" style="display: flex;margin: 0 auto">
                        <div class="contenedor_icono_pasos">
                          <div class="iconos_pasos iconos_redes">
                              <i class="fa fa-linkedin-square color_icono2" aria-hidden="true"></i>
                          </div>
                        </div>  
                      </div>
                      <div style="clear:both"></div>
                    </div>
                    <div class="col-4 col-lg-4 padding0 redes_individual"  style="float:left;display: flex; margin: 0 auto;">
                      <div class="redes_individual" style="float:left;display: flex; margin: 0 auto;">  
                        <div class="contenedor_icono_pasos">
                          <div class="iconos_pasos iconos_redes" href="" target="_blank">
                            <i class="fa fa-twitter color_icono2" aria-hidden="true"></i>
                          </div>
                        </div>  
                      </div>
                      <div style="clear:both"></div>
                    </div>
                      
                    <div style="clear:both"></div>
                  </div>
                </div>  
                <!-- Bloque de facebook -->
                <!-- 0 -->
                <div class="col-lg-4 fadeInLeft wow redes_cuadro hidden-0 hidden-md hidden-sm  tamano_facebook" id="row_redes" style="float:left">
                <div class=" div_facebook ">
                   <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Faktivedigital&tabs=timeline&width=325&height=250&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="325" height="250" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>  
                </div>
                </div>
                <div class="col-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 fadeInUp wow " style="float:left;">
                <div class="blog-posts-grid " style="margin-top: 0px;">
                  <div class="container">
                    <div class="post" style="width:280px;height:256px;">
                      <div class="bg" style="background-image:url('{{asset('public_web/img/parallax/redes2.jpg')}}');">
                      </div>
                      <a href="blog-grid.html#" class="info">
                        <span class="title">Siguenos en nuestras redes</span>
                        <span class="author"></span>
                        <span class="date">@AktiveDigital</span>
                      </a>
                    </div>
                  </div>
                </div>  
                </div>
                <div class="col-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 fadeInRight wow redes_cuadro tamano_twitter" style="float:left;border-top: 1px solid #e8e8e8;">
                  <div class=" fadeInLeft wow redes_cuadro" id="row_redes">
                    <div class=" div_twitter" style="max-height: 250px;overflow-x: hidden">
                       <a class="twitter-timeline" href="https://twitter.com/aktivedigital">Tweets by @AktiveDigital</a>
                       <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>
                  </div> 
                </div>  
            </div>
            <div style="clear:both"></div>
            </div> 
    </section>
    <!-- -->
    <!--PARALLAX-->
    <div id="prlx_servicios" class="dzsparallaxer auto-init height-is-based-on-content use-loading ">
    <!-- stylesheets -->
        <div class="super_parallax divimage dzsparallaxer--target w-100 g-bg-size-cover g-bg-img-hero g-bg-cover g-bg-black-opacity-0_6--after" style="height: 130%; background-image: url('{{asset('public_web/img/parallax/contactanos.jpg')}}');"></div>
        <div class="container g-pt-100 g-pb-70">
          <div class="row centrado">
            <div class="col-sm-6 col-lg-6 align-items-end mt-auto g-mb-50 texto_parallax">
              <div class="text-center">
                <h1 class="d-inline-block g-color-secondary g-font-weight-800 g-font-size-26 mb-0 g-z-index-1"> Contáctanos </h1>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- -->
    <!-- Contact section -->
    <section class="" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12 centrado">
                    <form name="sentMessage" id="contactForm" novalidate class="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Nombre*" id="name" required data-validation-required-message="Ingrese su nombre">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email*" id="email" required data-validation-required-message="Ingrese su email">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Teléfono" id="phone" required data-validation-required-message="Ingrese su número de teléfono">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Mensaje*" id="message" required data-validation-required-message="Ingrese el mensaje" rows="8" style="resize: none"></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center" style="margin-top:20px;">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-primary btn-xl">Enviar mensaje</button>
                            </div>
                        </div><!-- /.row -->
                    </form><!-- /form -->
                </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
    <!-- Google Map -->
    <section class="ptb-60 black-bg text-center dark-bg" style="display: none">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 mb-sm-30">
                    <div class="contact-info">
                        <div class="alt-icon-top alt-icon-color">
                            <i class="icon-phone"></i>
                        </div>
                        <p class="large">+58 (0) 416 345 6789</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-sm-30">
                    <div class="contact-info">
                        <div class="alt-icon-top alt-icon-color">
                            <i class="icon-map-pin"></i>
                        </div>
                        <p class="large">
                            250 South Street Baldwin,<br>
                            NY 11510
                        </p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-sm-30">
                    <div class="contact-info">
                        <div class="alt-icon-top alt-icon-color">
                            <i class="icon-envelope"></i>
                        </div>
                        <p class="large">hola@aktive.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mapas" style="padding-top: 0px;padding-bottom: 0px;">
        <!-- Contact Infobar Section -->
        <div id="">
            <section class="map noMargin" id="map" style="">
                <div id="map_canvas" style="height: 354px; width:100%;background-color: #f6f6f6;"></div>
            </section>
        </div>
    </section>
    <div id="js_up" class="boton-subir">
      <i class="fa fa-arrow-up" aria-hidden="true" style="display: block;"></i>
    </div>
</div>
@section('cuerpo_js')
<script type="text/javascript" src="{{asset('public_web/js/angular/controladores/inicioController.js')}}"></script>
<script type="text/javascript">
//--------------------------------------------------------------------------
function initialize() {
  var directionsService = new google.maps.DirectionsService();
  directionsDisplay = new google.maps.DirectionsRenderer();
  var myLatlng1 = new google.maps.LatLng(10.4914821,-66.8294758);
  var mapOptions = { 
    center: { lat: 10.4914821, lng: -66.8294758},
          zoom: 18,
          zoomControl: false,
          scaleControl: false,
          scrollwheel: false,
          disableDoubleClickZoom: true,
          draggable: false
  }
  map1 = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
  directionsDisplay.setMap(map);
  //var image = './public/public_web/img/posicion_editado2.ico';
  var image = "{{asset('public_web/img/posicion_editado2.ico')}}";
  var marker = new google.maps.Marker({
      position: myLatlng1,
      map: map1,
      title: 'Aktive USA',
      icon: image
  });

  google.maps.event.addDomListener(window, 'resize', function() {
      map1.panTo(myLatlng1);
  });
}
//---------------------------------------------------------------------------    
</script>
@endsection