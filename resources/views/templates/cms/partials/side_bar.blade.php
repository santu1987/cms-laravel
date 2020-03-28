<aside class="sidebar">
    <div class="scrollbar-inner">
        <div class="user">
            <div class="user__info" data-toggle="dropdown">
                <img class="user__img" src="{{asset('img/user.png')}}" alt="">
                <div>
                    <div class="user__name">Administrador</div>
                    <div class="user__email">admin@axioma_dvlp.com</div>
                </div>
            </div>

            <div class="dropdown-menu">
                <a class="dropdown-item" href="form-elements.html">Ver Perfil</a>
                <a class="dropdown-item" href="form-elements.html">Configuración</a>
                <a class="dropdown-item" href="form-elements.html">Salir</a>
            </div>
        </div>

        <ul class="navigation">
        <li class="navigation__sub @@formactive">
            <a href="">
                <i class="fa fa-building-o" aria-hidden="true"></i> 
                Nuestra empresa
            </a>
            <ul id="menu_empresa">
                <li class="@@formelementactive">
                    <a href="">
                        <i class="fa fa-users" aria-hidden="true"></i> 
                        Nosotros
                    </a>
                </li>
                <li class="@@formcomponentactive">
                    <a href="">
                        <i class="fa fa-question-circle" aria-hidden="true"></i> 
                        Como funciona
                    </a>
                </li>
                <li class="@@formvalidationactive">
                    <a href="">
                        <i class="fa fa-question" aria-hidden="true"></i>
                        Preguntas frecuentes
                    </a>
                </li>
            </ul>
        </li>
        
        <li class="navigation__sub @@formactive">
             <a href="">
                <i class="fa fa-usd" aria-hidden="true"></i> 
                Negocios
            </a>
            <ul>
                <li class="@@formelementactive" id="negocios_tipo">
                    <a href="">
                       <i class="fa fa-calendar" aria-hidden="true"></i> 
                       Tipo de negocio
                    </a>
                </li>
                <li class="@@formelementactive" id="negocios_detalle">
                    <a href="">
                        <i class="fa fa-id-card" aria-hidden="true"></i> 
                        Det. negocios
                    </a>
                </li>
                <li class="@@formcomponentactive" id="negocios_ordenar">
                    <a href="">
                        <i class="fa fa-list-ul" aria-hidden="true"></i> 
                        Ordenar negocio
                    </a>
                </li>
                <li class="@@formvalidationactive" id="negocios_ordenar_detalle">
                    <a href="">
                        <i class="fa fa-list-ol" aria-hidden="true"></i>
                        Ordenar det. negocio
                    </a>
                </li>
            </ul>
        </li>

        <li class="navigation__sub @@formactive" >
             <a href="">
                <i class="fa fa-bold" aria-hidden="true"></i>
                Blog
            </a>
            <ul id="menu_blog" class="menu">
                <li class="@@formelementactive" id="blog_tags">
                    <a href="/administrador/tags/create">
                       <i class="fa fa-list-ol" aria-hidden="true"></i> 
                       Tags
                    </a>
                </li>
                <li class="@@formelementactive" id="blog_categorias">
                    <a href="/administrador/categorias/create">
                        <i class="fa fa-folder-open" aria-hidden="true"></i> 
                        Categorías blog
                    </a>
                </li>
                <li class="@@formcomponentactive" id="blog_articulos">
                    <a href="/administrador/articulos/create">
                        <i class="fa fa-file-text" aria-hidden="true"></i> 
                        Crear blog
                    </a>
                </li>
            </ul>
        </li>

        <li class="navigation__sub @@formactive">
             <a href="">
                <i class="fa fa-video-camera" aria-hidden="true"></i>
                Galería multimedia
            </a>
            <ul id="menu_galeria" class="menu">
                <li class="@@formelementactive" id="album_conf">
                    <a href="/administrador/albums/create">
                       <i class="fa fa-folder" aria-hidden="true"></i> 
                       Configurar album
                    </a>
                </li>
                <li class="@@formelementactive" id="blog_videos">
                    <a href="">
                        <i class="fa fa-youtube-play" aria-hidden="true"></i> 
                        Videos
                    </a>
                </li>
                <li class="@@formcomponentactive" id="blog_imagenes">
                    <a href="">
                        <i class="fa fa-picture-o" aria-hidden="true"></i> 
                        Imagenes
                    </a>
                </li>
            </ul>
        </li>

        <li class="navigation__sub @@formactive">
             <a href="">
                <i class="fa fa-table" aria-hidden="true"></i>
                Contactos
            </a>
            <ul id="menu_contactos" >
                <li class="@@formelementactive" id="contactos_redes">
                    <a href="">
                       <i class="fa fa-facebook-square" aria-hidden="true"></i>
                       Redes Sociales
                    </a>
                </li>
                <li class="@@formelementactive" id="contactos_direccion">
                    <a href="">
                        <i class="fa fa-map-marker" aria-hidden="true"></i> 
                        Dirección
                    </a>
                </li>
                <li class="@@formcomponentactive" id="contactos_ordenar_direccion">
                    <a href="">
                        <i class="fa fa-list-ol" aria-hidden="true"></i>
                        Ordenar dirección
                    </a>
                </li>
                <li class="@@formelementactive" id="contactos_mapas">
                    <a href="">
                       <i class="fa fa-map-o" aria-hidden="true"></i> 
                       Mapas
                    </a>
                </li>
                <li class="@@formelementactive" id="contactos_form">
                    <a href="">
                        <i class="fa fa-th" aria-hidden="true"></i> 
                        Contactos
                    </a>
                </li>
                <li class="@@formcomponentactive">
                    <a href="" id="contactos_footer">
                        <i class="fa fa-caret-square-o-down" aria-hidden="true"></i>
                        Footer
                    </a>
                </li>
            </ul>
        </li>

        <li class="navigation__sub @@formactive">
             <a href="">
                <i class="fa fa-cogs" aria-hidden="true"></i>
                Configuración
            </a>
            <ul id="menu_configuracion" class="menu" >
                <li class="@@formelementactive" id="conf_usuarios">
                    <a href="/administrador/usuarios/create">
                       <i class="fa fa-user-circle" aria-hidden="true"></i> 
                       Usuarios
                    </a>
                </li>
                <li class="@@formelementactive" id="conf_palabras_claves">
                    <a href="">
                        <i class="fa fa-code" aria-hidden="true"></i> 
                        Palabras claves
                    </a>
                </li>
                <li class="@@formcomponentactive" id="conf_categorias">
                    <a href="/administrador/categorias/create">
                        <i class="fa fa-folder-open" aria-hidden="true"></i> 
                        Categorías
                    </a>
                </li>
            </ul>
        </li>
        </ul>
    </div>
</aside>