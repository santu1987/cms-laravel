@section('side_bar')
    @include('templates.cms.partials.side_bar')
@endsection

@section('menu_rapido')
    <header class="content__title" style="padding:0px;">
        <h1>Content Manager V4.0</h1>
        <small>Acceda a las distintas opciones que provee su manejador de contenidos</small>
    </header>
    <!-- -->
    <div class="row groups">
        <!-- -->
        <div class="col-xl-2 col-lg-3 col-sm-4 col-6">
            <div class="groups__item">
                <a href="/administrador/dashboard">
                    <div class="groups__img">
                        <div class="avatar-img imagen_menu">
                            <i class="zmdi zmdi-home"></i>
                        </div>
                    </div>

                    <div class="groups__info">
                        <strong>Home</strong>
                        <small>Principal</small>
                    </div>
                </a>
            </div>
        </div>  
        <!-- -->
        <div class="col-xl-2 col-lg-3 col-sm-4 col-6">  
            <div class="groups__item">
                <a href="/administrador/usuarios/create">
                    <div class="groups__img">
                        <div class="avatar-img imagen_menu">
                            <i class="zmdi zmdi-account-circle zmdi-hc-fw"></i>
                        </div>
                    </div>

                    <div class="groups__info">
                        <strong>Usuarios</strong>
                        <small>Administración de usuarios</small>
                    </div>
                </a>
            </div>
        </div>    
        <!-- -->
        <div class="col-xl-2 col-lg-3 col-sm-4 col-6">  
            <div class="groups__item">
                <a href="/admin/categorias/create">
                    <div class="groups__img">
                        <div class="avatar-img imagen_menu">
                            <i class="zmdi zmdi-view-list zmdi-hc-fw"></i>
                        </div>
                    </div>

                    <div class="groups__info">
                        <strong>Categorías</strong>
                        <small>Administración de categorías</small>
                    </div>
                </a>
            </div>
        </div>    
        <!-- -->
        <div class="col-xl-2 col-lg-3 col-sm-4 col-6">  
            <div class="groups__item">
                <a href="/admin/tags/create">
                    <div class="groups__img">
                        <div class="avatar-img imagen_menu">
                            <i class="zmdi zmdi-tag"></i>
                        </div>
                    </div>

                    <div class="groups__info">
                        <strong>Tags</strong>
                        <small>Administración de tags</small>
                    </div>
                </a>
            </div>
        </div>    
        <!-- -->
        <div class="col-xl-2 col-lg-3 col-sm-4 col-6">  
            <div class="groups__item">
                <a href="/admin/articles/create">
                    <div class="groups__img">
                        <div class="avatar-img imagen_menu">
                            <i class="zmdi zmdi-library"></i>
                        </div>
                    </div>

                    <div class="groups__info">
                        <strong>Artículos</strong>
                        <small>Administración de artículos</small>
                    </div>
                </a>
            </div>
        </div>    
        <!-- -->
        <div class="col-xl-2 col-lg-3 col-sm-4 col-6">  
            <div class="groups__item">
                <a href="/admin/albums/create">
                    <div class="groups__img">
                        <div class="avatar-img imagen_menu">
                            <i class="zmdi zmdi-picture-in-picture zmdi-hc-fw"></i>
                        </div>
                    </div>

                    <div class="groups__info">
                        <strong>Album</strong>
                        <small>Administración de imagenes </small>
                    </div>
                </a>
            </div>
        </div>
        <!-- -->
    </div>    
    <!-- -->
@endsection