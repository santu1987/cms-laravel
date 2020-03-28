angular.module("ContentManagerApp")
	.controller("inicioController", function($scope,$http,$location,serverDataMensajes){
		$scope.inicio = {};
		$scope.login = ""
		$scope.clave = ""
		$scope.inciar_sesion = function(){
			notificaciones_preloader()
			if($scope.validar_inicio_sesion()==true){
				//$("#form_inicio").submit();
				var in_data ={
							"email": $scope.login,
							"password": $scope.clave,
							"_token":  $("inpute:text[name=_token]").val()
				};		
				$http({
						method: "POST",
						//url:"/administrador/login",
						url:"/administrador/IniciaSesion",
						//url:"/administrador/login",
						data: in_data
				})
				.success(function(data){
					fin_preloader_sm()
					if(data["mensajes"]=="inicio_exitoso"){
						$scope.enviar_inicio();
					}else if(data["mensajes"] == "datos_errados"){
						notificaciones_material("Fallo en datos suministrados","danger");
					}else{
						notificaciones_material("Ocurrío un error inesperado","danger");
					}
				}).error(function(data,status){
					if(data["password"]){
						notificaciones_material("El campo clave es obligatorio","warning");
					}else if(data["email"]=="These credentials do not match our records."){
						notificaciones_material("Dirección de email invalida","warning");
					}
					notificaciones_material("Ocurrío un error inesperado en el servidor","danger");
					fin_preloader_sm()
				});
			}
		}
		$scope.validar_inicio_sesion = function(){
			if($scope.login==""){
				notificaciones_material("Debe ingresar nombre de usuario","danger");
				$("#login_p").focus();
				return false;
			}else
			if($scope.clave==""){
				notificaciones_material("Debe ingresar clave de usuario","danger");
				$("#clave").focus();
				return false;
			}else{
				return true;
			}
		}

		$scope.cerrar_sesion = function(){
			sesionFactory.cerrar_sesion(function(data){
				if(data["respuesta"]=="cerrado"){
					$location.path("/");
				}
			});
		}
	
		$scope.enviar_inicio = function(){
			$("#form_inicio").attr("action","/administrador/dashboard");
			$("#form_inicio").attr("method","POST")
			$("#form_inicio").attr("target","_self")
			$("#form_inicio").submit();
			notificaciones_material("Autenticación exitosa!","success");
		}
		$("#login_p,#clave").keypress(function(e) {
		  if(e.which==13){
		    	$scope.inciar_sesion();
		  }
		}); 

	});