angular.module("ContentManagerApp")
	.controller("CategoriasController", function($scope,$http,$location,serverDataMensajes){
		
		$(".menu").css({"display":"none"})
		$("#menu_blog").css({"display":"block"})
		
		$scope.categoria = {
							'id':'',
							'name':'',
							'csrftoken':'',
							'estatus':''
		}
		//----------------------------------------------------------
		//valido inicio de sesion
		/*$scope.sesion_usuario = function(){
			sesionFactory.sesion_usuario(function(data){
				if(data["respuesta"]=="cerrado"){
					$location.path("/");
				}
			});
		}*/
		//----------------------------------------------------------
		$scope.validar_vacio = function(){
			if($scope.categoria.id==undefined){
				$scope.categoria.id="";
			}
			if($scope.categoria.name==undefined){
				$scope.categoria.name="";
			}
		}
		//----
		//----------------------------------------------------------
		$scope.registrar_categoria = function(){

			//notificaciones_material("Prueba de gilly gilly","success")
			if($scope.validar_form()==true){
				//Para guardar
				notificaciones_preloader()
				if((($scope.categoria.id!=undefined)&&($scope.categoria.id!=""))){
					//$scope.modificar_doctor();
					$scope.modificar_categoria()
				}else{
					$scope.insertar_categoria()
				}				
			}
		}
		//---------------------------------------
		$scope.validar_form = function(){
			if($scope.categoria.name==""){
				notificaciones_material("Debe ingresar nombre de la categoría","danger")				
				return false;
			}else{
				return true;
			}	
		}
		//------------------------------------------
		$scope.insertar_categoria = function(){
			var in_data ={
							"name":  $scope.categoria.name,
							"_token":  $("inpute:text[name=_token]").val(),
							"estatus":'1'
						};		
			$http({
					method: "POST",
					url:"/administrador/categorias/guardar_categoria",
					data: in_data
			})
			.success(function(data){
				if(data=="registro_exitoso"){
					fin_preloader_guardar('El registro ha sido realizado de manera exitosa','success');
					setTimeout(function(){					
						$scope.limpiar_formulario();
					},1000)
				}else if(data=="existe"){
					fin_preloader_guardar('Ya existe una categoría con ese nombre','success');
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
		//--------------------------------------------
		$scope.limpiar_formulario = function(){
			$scope.categoria = {
							'id':'',
							'name':'',
							'csrftoken':'',
							'estatus':''
			}
			$(".limpiar").val("")
		}
		//--------------------------------------------
	}); 