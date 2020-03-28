<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('templates.web.index');
});
*/
//---Rutas para CMS
Route::group(['prefix'=>'administrador'],function(){
	//Auth::routes();
	//--Inicio index
	Route::get('/', function () {
	    return view('templates.cms.index');
	});
	//--Para iniciar sesion
	
	Route::resource('IniciaSesion','inicioController');
	
	Route::post('/IniciaSesion',[
		'uses' => 'inicioController@getConsultarDatos',
		'as'   => 'administrador.inicio.getConsultarDatos'
	]);

	/*Route::resource('dashboard','inicioController');
	Route::post('/dashboard',[
		'uses' => 'inicioController@index',
		'as'   => 'administrador.inicio.index'
	]);*/
	/*-- DashBoard--*/
	Route::post("/dashboard", function(){
		return view('templates.cms.dashboard');
	});
	Route::get("/dashboard", function(){
		return view('templates.cms.dashboard');
	});
	/*--- Empresa --*/
	/*-- Nosotros --*/
	Route::get('nosotros/create',[
		'uses' => 'quienesSomosController@create',
		'as'   => 'administrador.quienesSomos.create'
	]);
	Route::post('nosotros/guardar',[
		'uses' => 'quienesSomosController@guardar',
		'as'   => 'administrador.quienesSomos.guardar'
	]);
	Route::post('nosotros/consultar_nosotros',[
		'uses' => 'quienesSomosController@consultarNosotros',
		'as'   => 'administrador.quienesSomos.consultarNosotros'
	]);
	Route::get('nosotros/datatable_nosotros',[
		'uses' => 'quienesSomosController@dataTableNosotros',
		'as'   => 'administrador.quienesSomos.dataTableNosotros'
	]);
	Route::post('nosotros/actualizar_nosotros',[
		'uses' => 'quienesSomosController@actualizarNosotros',
		'as'   => 'administrador.quienesSomos.actualizarNosotros'
	]);

	Route::post('nosotros/actualiza_estatus_nosotros',[
		'uses' => 'quienesSomosController@actualizarEstatusNosotros',
		'as'   => 'administrador.quienesSomos.actualizarEstatusNosotros'
	]);

	Route::post('nosotros/eliminar_nosotros',[
		'uses' => 'quienesSomosController@eliminarNosotros',
		'as'   => 'administrador.quienesSomos.eliminarNosotros'
	]);

	/*-- --*/
	/*-- Usuarios --*/
	Route::resource('usuarios','usuariosController');

	Route::post('usuarios/create',[
		'uses' => 'usuariosController@create',
		'as'   => 'administrador.usuarios.create'
	]);

	Route::post('usuarios/getConsulta',[
		'uses' => 'usuariosController@getConsulta',
		'as'   => 'administrador.usuarios.getConsulta'
	]);

	Route::post('usuarios/actualizar_user',[
		'uses' => 'usuariosController@actualizarUser',
		'as'   => 'administrador.usuarios.actualizarUser'
	]);

	Route::post('usuarios/actualiza_estatus_user',[
		'uses' => 'usuariosController@actualizarEstatusUser',
		'as'   => 'administrador.usuarios.actualizarEstatusUser'
	]);
	/*--- Para categories ---*/
	//Route::resource('categorias','CategoriasController');
	//Form para registro
	Route::get('categorias/create',[
		'uses' => 'CategoriasController@create',
		'as'   => 'administrador.categorias.create'
	]);
	//Mostrar tabla
	Route::get('categorias',[
		'uses' => 'CategoriasController@index',
		'as'   => 'administrador.categorias.index'
	]);
	//-Consulta data-table
	Route::post('categorias/consultar_categorias',[
		'uses' => 'CategoriasController@consultarCategorias',
		'as'   => 'administrador.categorias.consultarCategorias'
	]);
	//-Guarda categorias
	Route::post('categorias/guardar_categoria',[
		'uses' => 'CategoriasController@guardarCategoria',
		'as'   => 'administrador.categorias.guardarCategoria'
	]);
	//-Actualiza categorias
	Route::post('categorias/actualizar_categoria',[
		'uses' => 'CategoriasController@actualizarCategoria',
		'as'   => 'administrador.categorias.actualizarCategoria'
	]);
	//-Actualiza estatus
	Route::post('categorias/actualiza_estatus_categoria',[
		'uses' => 'CategoriasController@actualizarEstatusCategorias',
		'as'   => 'administrador.categorias.actualizarEstatusCategorias'
	]);
	/*--- ---*/
	/*--- Tags ---*/
	Route::resource('tags','TagsController');
	//-Consulta data-table
	Route::post('tags/getConsulta',[
		'uses' => 'TagsController@getConsulta',
		'as'   => 'administrador.tags.getConsulta'
	]);
	//-Actualiza tags
	Route::post('tags/actualizar_tag',[
		'uses' => 'TagsController@actualizarTag',
		'as'   => 'administrador.tags.actualizarTag'
	]);
	//-Actualiza estatus
	Route::post('tags/actualiza_estatus_tag',[
		'uses' => 'TagsController@actualizarEstatusTag',
		'as'   => 'administrador.tags.actualizarEstatusTag'
	]);
	/*--- ---*/
	/*--- ---*/
	//--Articles
	Route::resource('articulos','ArticulosController');

	Route::post('articulos/imagen_sector',[
		'uses' => 'ArticulosController@imagen_sector',
		'as'   => 'administrador.articulos.imagen_sector'
	]);
	Route::post('articulos/getConsulta',[
		'uses' => 'ArticulosController@getConsulta',
		'as'   => 'administrador.articulos.getConsulta'
	]);

	/*---Galería multimedia---*/
	//--Para albums
	Route::resource('albums','AlbumsController');

	Route::post('albums/getConsultaCategorias',[
		'uses' => 'AlbumsController@getConsultaCategorias',
		'as' => 'administrador.albums.getConsultaCategorias'
	]);
	Route::post('albums/cargar_imagen',[
		'uses' => 'AlbumsController@cargarImagen',
		'as'   => 'administrador.albums.cargarImagen'
	]);
	Route::post('albums/getConsultaGaleria',[
		'uses' => 'AlbumsController@getConsultaGaleria',
		'as' => 'administrador.albums.getConsultaGaleria'
	]);
	//Para eliminar imagenes
	Route::post('albums/eliminar_imagen',[
		'uses' => 'AlbumsController@eliminar_imagen',
		'as' => 'administrador.albums.eliminar_imagen'
	]);
	//Consulta de imagenes
	Route::post('albums/consulta_imagenes',[
		'uses' => 'AlbumsController@consulta_imagenes',
		'as' => 'administrador.albums.consulta_imagenes'
	]);
	//Para ver el carrete de imagenes
	Route::post('albums/ver_imagenes',[
		'uses' => 'AlbumsController@ver_imagenes',
		'as' => 'administrador.albums.ver_imagenes'
	]);
	
	//Route::resource('albums','AlbumsController', ['except' => ['show']]);
	//*--- Idiomas ---*/
	
	Route::post('idiomas/consultaIdioma',[
		'uses' => 'idiomaController@consulta_idioma',
		'as'   => 'administrador.idiomas.consulta_idioma'
	]);
	/*--- ---*/

});
