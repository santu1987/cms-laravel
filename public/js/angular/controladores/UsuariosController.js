angular.module("ContentManagerApp")
	.controller("UsuariosController", function($scope,$http,$location,serverDataMensajes){
		
		$(".menu").css({"display":"none"})
		$("#menu_configuracion").css({"display":"block"})
		
		$scope.usuario = {
							'id':'',
							'name':'',
							'email':'',
							'type':'',
							'password':'',
							'csrftoken':'',
							'estatus':''
		}
		$scope.algo = "A ver si funciona esto!"
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
			if($scope.usuario.id==undefined){
				$scope.usuario.id="";
			}
			if($scope.usuario.name==undefined){
				$scope.usuario.name="";
			}
			if($scope.usuario.email==undefined){
				$scope.usuario.email="";
			}
			if($scope.usuario.type==undefined){
				$scope.usuario.type="";
			}
			if($scope.usuario.password==undefined){
				$scope.usuario.password="";
			}
		}
		$scope.validar_vacio();
		//----
		//----------------------------------------------------------
		$scope.valor_intermedio = serverDataMensajes.obtener_arreglo();
		if($scope.valor_intermedio){
			$scope.usuario = $scope.valor_intermedio;
		}
		$scope.validar_vacio();			
		if($scope.usuario.id==undefined){
			$scope.usuario.id="";
		}
		//alert($scope.doctor.id);
		//----------------------------------------------------------
		$scope.registrar_usuario = function(){

			//notificaciones_material("Prueba de gilly gilly","success")
			if($scope.validar_form()==true){
				//Para guardar
				notificaciones_preloader()
				if((($scope.usuario.id!=undefined)&&($scope.usuario.id!=""))){
					//$scope.modificar_doctor();
					$scope.modificar_usuario()
				}else{
					$scope.insertar_usuario()
				}				
			}
		}
		//---------------------------------------
		$scope.validar_form = function(){
			if($scope.usuario.name==""){
				notificaciones_material("Debe ingresar nombre de usuario","danger")				
				return false;
			}else if($scope.usuario.email==""){
				notificaciones_material("Debe ingresar email","danger")				
				return false;
			}else if($scope.usuario.password==""){
				notificaciones_material("Debe ingresar clave de usuario","danger")				
				return false;
			}
			else if($scope.usuario.type==""){
				notificaciones_material("Debe seleccionar tipo de usuario","danger")				
				return false;
			}else{
				return true;
			}	
		}
		//------------------------------------------
		$scope.activar_check = function(caja){
			if($(caja).hasClass("fa-check-square-o")){
				$(caja).removeClass("fa-check-square-o").addClass("fa-square-o");
				$scope.doctor.estatus = "0";	
			}else
			if($(caja).hasClass("fa-square-o")){
				$(caja).removeClass("fa-square-o").addClass("fa-check-square-o");
				$scope.doctor.estatus = "1";	
			}			
		}
		//---------------------------------------
		$scope.insertar_usuario = function(){
			var in_data ={
							"name":  $scope.usuario.name,
							"email": $scope.usuario.email,
							"password": $scope.usuario.clave,
							"type":$scope.usuario.type, 
							"_token":  $("inpute:text[name=_token]").val(),
							"estatus":'1'
						};		
			$http({
					method: "POST",
					url:"/administrador/usuarios",
					data: in_data
			})
			.success(function(data){
				if(data=="registro_exitoso"){
					fin_preloader_guardar('El registro ha sido realizado de manera exitosa','success');
					setTimeout(function(){					
						$scope.limpiar_formulario();
					},1000)
				}else if(data="existe_correo"){
					fin_preloader_guardar('El correo ingresado ya se encuentra asociado a otro usuario','danger');
					$('#usuario_email').focus()
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
			$scope.usuario = {
							'id':'',
							'name':'',
							'email':'',
							'type':'',
							'password':'',
							'csrftoken':'',
							'estatus':''
			}
			$(".limpiar").val("")
			$(".select").val("0")
			$('select').select2().enable(false);
		}
		//--------------------------------------------
	}); 