angular.module("ContentManagerApp")
	.controller("ArticulosController", function($scope,$compile,$http,$location,serverDataMensajes,upload,categoriasFactory,tagsFactory,imagenesFactory){

		$(".menu").css({"display":"none"})
		$("#menu_blog").css({"display":"block"})

		$scope.categoria = {
							'id':'',
							'name':'',
							'csrftoken':'',
							'estatus':''
		}

		$scope.tags = {
							'id':'',
							'name':'',
							'csrftoken':'',
							'estatus_id':''
		}

		$scope.article = {
								"id":"",
								"title":"",
								"content":"",
								"user_id":"",
								"category_id":"",
								"estatus_id":"",
								"art_tag" :[],
								"image":""
		}
		$scope.wisi_cajas = {
								"descripcion":""
		}
		$scope.activo_img = "inactivo"
		$scope.galery={
						"id":"",
						"path_imagen":""
		}
		//----
		//--Metodo para consultar categorias via ajax
		$scope.consultar_categorias = function(){
			categoriasFactory.valor_token($("inpute:text[name=_token]").val());
			categoriasFactory.cargar_categorias(function(data){		
					$scope.categoria=data;		
			});
		}
		//--Metodo para consultar usuarios via ajax
		$scope.consultar_tags = function(){
			tagsFactory.valor_token($("input:text[name=_token]").val());
			tagsFactory.cargar_tags(function(data){
					$scope.tags=data;
					console.log($scope.tags);				
			});
		}
		//---Metodo para consultar imagenes
		$scope.consultar_imagenes = function(){
			imagenesFactory.valor_token($("input:text[name=_token]").val());
			imagenesFactory.cargar_imagenes(function(data){
					$scope.galery=data;
					console.log($scope.galery);	
					imagen_sector = '<div class="centrar_galeria" ng-show="galery.length ==0">Galería de imágenes noticias</div>\
										<div id="" ng-show="galery.length!=0" class="fade-in-out">\
											<div>\
												<div class="form-group">\
													<input type="text" name="filtro_noticias" id="filtro_noticias" placeholder="Ingrese el valor a filtrar" class="form-control" ng-model="searchNoticias">\
												</div>\
												<div class="col-lg-12" padding="0px;">\
													<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 divbiblioteca" ng-repeat="imagen in galery|filter:searchNoticias track by $index">\
														<img class="imgbiblioteca"  id="img_biblioteca{%$index%}" src="{{ asset({% imagen.path %})}}" height="115" data="{%imagen.id%}|{%imagen.path%}" data-ng-click="seleccionar_imagen($event)">\
													</div>\
												</div>\
											</div>\
										</div>\
										<div style="clear:both"></div>';
					$("#cuerpo_mensaje").html($compile($scope.galery)($scope)).fadeIn("slow");  			
			});
		}
		//--
		$scope.inicializar_text = function(){
			$('.textarea-content').trumbowyg();
		}
		//--
		$scope.asignar_model = function(){
			$scope.article.content = $(".trumbowyg-editor").html();
		}		
		//----
		$scope.validar_vacio = function(){
			if($scope.article.id==undefined){
				$scope.article.id="";
			}else if($scope.article.content==undefined){
				$scope.article.content="";
			}else if($scope.article.category_id==undefined){
				$scope.article.category_id="";
			}
		}
		//----
		$scope.validar_form = function(){
			var longitud = $scope.article.art_tag.length;
			console.log($scope.article.art_tag)
			if($scope.article.title==""){
				notificaciones_material("Debe ingresar el título del artículo","danger")				
				return false;
			}else if($scope.article.content==""){
				notificaciones_material("Debe ingresar el contenido del artículo","danger")				
				return false;
			}else if($scope.article.category_id==""){
				notificaciones_material("Debe seleccionar la categoría del artículo","danger")				
				return false;
			}
			else if(longitud==0){
				notificaciones_material("Debe seleccionar al menos un tag para registrar el artículo","danger")				
				return false;
			}else{
				return true;
			}	
		}
		//----
		$scope.registrar_articles = function(){
			$scope.asignar_model()
			console.log($scope.article.art_tag)
			alert($scope.article.art_tag)
			if($scope.validar_form()==true){
				var in_data ={
							"title":$scope.article.title,
							"content":$scope.article.content,
							"category_id":$scope.article.category_id,
							"articles_tags":$scope.article.art_tag,
							"_token":  $("inpute:text[name=_token]").val(),
							"estatus":'1'
						};		
				$http({
						method: "POST",
						url:"/admin/articles",
						data: in_data
				})
				.success(function(data){
					console.log(data)
					var id = data["id"]["id"]
					if(data["mensaje"]=="registro_exitoso"){
						fin_preloader_guardar('El registro ha sido realizado de manera exitosa','success');
						setTimeout(function(){					
							$scope.limpiar_formulario();
						},1000)
					}else{
						fin_preloader_guardar('Ha ocurrido un error inesperado','danger');
					}
				})
				.error(function(data,estatus){
					notificaciones_material("Ocurrió un error, contacte al administrador del sistema"+ data,"danger")
					console.log(data);
				});
			}	
		}
		//----
		$scope.limpiar_formulario = function(){

			$scope.article = {
									"id":"",
									"title":"",
									"content":"",
									"user_id":"",
									"category_id":"",
									"estatus_id":"",
									"art_tag": [],
									"image":""									
			}
			
			$(".trumbowyg-editor").html("")
			$(".select2").val("0")
		}
		//----
		$scope.wisi_modal = function(){
			//---
			$(".trumbowyg-editor").html($scope.article.content)
			$("#modal_contenido").modal("show")
			//---
		}	

		//---
		$scope.aceptar_wisi_cajas = function(){
			$scope.wisi_cajas.descripcion = 1
			alert($(".trumbowyg-editor").html());
			$scope.article.descripcion = $(".trumbowyg-editor").html()
			$("#div_descripcion_articulo").html($scope.article.descripcion)
		}
		//--Metodo para subir acrhivos
		$scope.seleccione_img_principal =  function(){
			$("#modal_img1").modal("show");
		}
		//---------------------------------------
		$('#select_categoria > option[value=5]').attr('selected', false);
		$("#modal_reporte_aceptar").click(function(){
			$scope.aceptar_wisi_cajas();
		});
		//----
		//Bloque de llamados
		$scope.validar_vacio()
		$scope.consultar_categorias()
		$scope.consultar_tags()
		$scope.consultar_imagenes()
		$scope.inicializar_text()
		//----
		$("#contenido_descripcion").trumbowyg();
});		