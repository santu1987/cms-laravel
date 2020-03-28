angular.module("ContentManagerApp")
	.controller("TagsController", function($scope,$http,$location,serverDataMensajes){
		
		$(".menu").css({"display":"none"})
		$("#menu_blog").css({"display":"block"})
		
		$scope.tag = {
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
			if($scope.tag.id==undefined){
				$scope.tag.id="";
			}
			if($scope.tag.name==undefined){
				$scope.tag.name="";
			}
		}
		//----
		//----------------------------------------------------------
		$scope.registrar_tag = function(){

			//notificaciones_material("Prueba de gilly gilly","success")
			if($scope.validar_form()==true){
				//Para guardar
				notificaciones_preloader()
				if((($scope.tag.id!=undefined)&&($scope.tag.id!=""))){
					//$scope.modificar_doctor();
					$scope.modificar_tag()
				}else{
					$scope.insertar_tag()
				}				
			}
		}
		//---------------------------------------
		$scope.validar_form = function(){
			if($scope.tag.name==""){
				notificaciones_material("Debe ingresar nombre del tag","danger")				
				return false;
			}else{
				return true;
			}	
		}
		//------------------------------------------
		$scope.insertar_tag = function(){
			var in_data ={
							"name":  $scope.tag.name,
							"_token":  $("inpute:text[name=_token]").val(),
							"estatus":'1'
						};		
			$http({
					method: "POST",
					url:"/administrador/tags",
					data: in_data
			})
			.success(function(data){
				if(data=="registro_exitoso"){
					fin_preloader_guardar('El registro ha sido realizado de manera exitosa','success');
					setTimeout(function(){					
						$scope.limpiar_formulario();
					},1000)
				}else if(data=="existe"){
					fin_preloader_guardar('Ya existe un tags con ese nombre','success');
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
			$scope.tag = {
								'id':'',
								'name':'',
								'csrftoken':'',
								'estatus':''
			}
			$(".limpiar").val("")
		}
		//--------------------------------------------
	}); 