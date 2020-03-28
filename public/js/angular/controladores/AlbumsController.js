angular.module("ContentManagerApp")
	.controller("AlbumsController", function($scope,$compile,$http,$location,categoriasImagenFactory,galeriaFactory,upload){
		
		$(".menu").css({"display":"none"})
		$("#menu_galeria").css({"display":"block"})

		$scope.imagen = {
									"id":"",
									"name":"",
									"id_category":""
		}
		$scope.galeria = {
									"id":"",
									"name":"",
									"id_category":""
		}
		$scope.files = []
		$scope.cuantos = 0
		$scope.activo_img = "inactivo";
		$scope.borrar_imagen = []
		$scope.longitud = 0
		//Bloque de metodos
		$scope.consultar_categorias = function(){
			categoriasImagenFactory.valor_token($("inpute:text[name=_token]").val());
			categoriasImagenFactory.cargar_categoria_imagen(function(data){		
					$scope.categoria=data;
					console.log($scope.categoria);
			});
		}
		// Validaciones
		$scope.validar_campos = function(){
			if($scope.imagen.name ==""){
				notificaciones_material("Debe ingresar el nombre de la imagen","danger")				
				return false;
			}else if($scope.imagen.id_category ==""){
				notificaciones_material("Debe seleccionar una categoría","danger")				
				return false;
			}else if((file=="")||(file=="undefined")){
				notificaciones_material("Debe seleccionar una imagen","danger")				
				return false;
			}else
				return true;
		}	
		// Para guardar
		$scope.guardar_imagen = function(){
			if($scope.validar_campos()==true){
				$scope.uploadFile();
			}
		}
		//Subida de imagen
		$scope.uploadFile = function(){
			//--
			var file = $scope.file;
			var categoria = $scope.imagen.id_category.id;
			var nombre_archivo = $scope.imagen.name;
			//-
			upload.uploadFile(file,categoria,nombre_archivo).then(function(res){
				if(res.data=="supera_tamano"){
					notificaciones_material("Error #3 : La imagen supera el tamaño requerido de max 2mgb","danger")
				}
				else if(res.data=="existe"){
					notificaciones_material("Error #4 : La imagen ya fue registrada","danger")
				}else if(res.data=="existe_nombre"){
					notificaciones_material("Error #5 : ya existe una imagen con ese nombre","danger")
				}
				else if(res.data!="error_tipo_archivo"){
					fin_preloader_guardar('La imagen fue cargada de manera exitosa!');
					$scope.consultar_galeria();
					$scope.limpiar_formulario();
				}else{
					notificaciones_material("Error #6 : Error al subir tipo de archivo, solo puede subir imagenes .jpg","danger")	
				}
				//--------------------------------
			});
			//--
		}
		//
		$scope.eliminar_files = function(){
			swal({   
				title: "Eliminar listado de imagenes" ,
				text: " Desea eliminar los archivos seleccionados?",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#11c7cf",
				confirmButtonText: "Sí!",
				cancelButtonText: "No",
				closeOnConfirm: true 
			}, function(isConfirm){   
				if (isConfirm) {     
					$scope.eliminar_imagen();
				}
			});
		}
		//
		$scope.eliminar_imagen = function(){
			in_data = {
							'imagenes':$scope.borrar_imagen
			}
			$http.post("/admin/albums/eliminar_imagen",in_data)
			.success(function(data){
				if(data=="eliminacion_exitosa"){
					fin_preloader_guardar('Las imagenes fueron eliminadas de manera exitosa','success');
					$scope.imagen.name = "";
					$scope.consultar_galeria(); 
				}else{
					fin_preloader_guardar('Ha ocurrido un error inesperado','danger');
				}
			})
			.error(function(data,estatus){
				notificaciones_material("Ocurrió un error, contacte al administrador del sistema"+ data,"danger")
				console.log(data);
			});
		}
		//
		$scope.consultar_galeria = function(){
			galeriaFactory.valor_token($("inpute:text[name=_token]").val(),$scope.imagen.id_category);
			galeriaFactory.cargar_galeria(function(data){

				$("#cuadro_img").html($compile(data)($scope)).fadeIn();
				$scope.activo_img = "activo";
			});
		}//
		$scope.limpiar_formulario = function (){
			$scope.imagen = {
							"id":"",
							"name":"",
							"id_category":""
			}
			$("#cuerpo_preview_img").addClass("hidden");
		}
		//Para seleccionar una imagen a manipular
		$scope.seleccionar_imagen = function(){
			var imagen = event.target.id;//Para capturar id
			var id_imagen = $("#"+imagen).attr("data");
			if(($("#"+imagen).hasClass("marcado"))==true){
				$("#"+imagen).removeClass("marcado");
				$indice = $scope.borrar_imagen.indexOf(id_imagen);
				$scope.borrar_imagen.splice($indice,1);
			}else{
				$("#"+imagen).addClass("marcado");
				$scope.borrar_imagen.push(id_imagen);
			}
			$scope.longitud = $scope.borrar_imagen.length;
		}
		//Bloque de llamados
		$scope.consultar_categorias();
		document.getElementById('file').addEventListener('change', archivo, false);
});		