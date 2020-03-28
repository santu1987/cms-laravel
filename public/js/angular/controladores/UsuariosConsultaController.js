angular.module("ContentManagerApp")
	.controller("UsuariosConsultaController", function($scope,$http,$location,$window,serverDataMensajes,usuariosFactory){
		
		$(".menu").css({"display":"none"})
		$("#menu_configuracion").css({"display":"block"})

		$scope.usuario = {
							'id':'',
							'name':'',
							'email':'',
							'type':'',
							'password':'',
							'csrftoken':'',
							'estatus_id':''
		}
		$scope.usuario_individual = {
										'id':'',
										'name':'',
										'email':'',
										'type':'',
										'password':'',
										'csrftoken':'',
										'estatus_id':''			
		}
		$scope.formUser = "Inactivo"
		$scope.configuracion_inicial = function(){
			//---
			setTimeout(function(){
				iniciar_datatable();
			},500);
			//---
		}
		//--Metodo para consultar usuarios via ajax
		$scope.consultar_usuarios = function(){
			usuariosFactory.valor_token($("inpute:text[name=_token]").val());
			usuariosFactory.cargar_usuarios(function(data){
					$scope.usuario=data;
					console.log($scope.usuario);				
			});
		}
		//--Metodo para ver el formulario del registro
		$scope.ver_registro = function(indice){
			$scope.usuario_individual = $scope.usuario[indice]
			$scope.formUser = "Activo"
			console.log($scope.usuario_individual)
			$(".form-control").addClass("form-control--active")
		}
		//--Metodo para consultar usuarios
		$scope.consultar_usuarios_ac = function(){
			$scope.usuario_individual = ""
			$scope.formUser = "Inactivo"
		}
		//--Metodo para actualizar datos de usuarios
		$scope.actualizar_usuario = function(){
			if ($scope.validar_form()==true){
			//---------------------------------------------
			var in_data ={
							"id": $scope.usuario_individual.id,
							"name":  $scope.usuario_individual.name,
							"email": $scope.usuario_individual.email,
							"password": $scope.usuario_individual.clave,
							"type":$scope.usuario_individual.type, 
							"_token":  $("inpute:text[name=_token]").val()
						};		
			$http({
					method: "POST",
					url:"/administrador/usuarios/actualizar_user",
					data: in_data
			})
			.success(function(data){
				if(data=="actualizacion_exitosa"){
					fin_preloader_guardar('El registro se ha actualizado de manera exitosa','success');
					$scope.limpiar_formulario_actualizacion();
				}else if(data="existe_correo"){
					fin_preloader_guardar('El correo ingresado ya se encuentra asociado a otro usuario','danger');
					$('#usuario_email').focus()
				}else if(data="no_existe_usuario"){
					fin_preloader_guardar('El usuario no se encuentra registrado','danger');
				}else{
					fin_preloader_guardar('Ha ocurrido un error inesperado','danger');
				}
			})
			.error(function(data,estatus){
				notificaciones_material("Ocurrió un error, contacte al administrador del sistema"+ data,"danger")
				console.log(data);
			});
			//---------------------------------------------	
			}
		}
		//--Metodo para modificar estatus
		$scope.modificar_estatus = function(indice,event){
			caja = event.currentTarget.id;
			if($("#"+caja).hasClass("btn-danger")){
				proceso = "inactivar"
			}else{
				proceso = "activar"
			}
			swal({
                    title: 'Desea '+proceso+' el usuario seleccionado',
                    text: '¿Está seguro de realizar esta acción?',
                    type: 'warning',
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonClass: 'btn btn-danger',
                    confirmButtonText: 'Si',
                    cancelButtonText: 'No',
                    cancelButtonClass: 'btn btn-secondary'
                }).then(function(){
                    $scope.ejecutar_modificar_estatus(indice,caja)
                });
			
			//---------------------------------------------
		}
		$scope.ejecutar_modificar_estatus = function(indice,caja){
			//---------------------------------------------
			var in_data = {
								"id":$scope.usuario[indice].id

			}
			$http({
					method: "POST",
					url: "/administrador/usuarios/actualiza_estatus_user",
					data:in_data
			})
			.success(function(data){
				//--------------------------------------------------------------------------------------
				if(data=="cambio_exitoso"){
					if($("#"+caja).hasClass("btn-danger")){
						fin_preloader_guardar('El registro se ha inactivado de manera exitosa','success');
						$("#"+caja).addClass("btn-success").removeClass("btn-danger");
					}else{
						fin_preloader_guardar('El registro se ha activado de manera exitosa','success');
						$("#"+caja).addClass("btn-danger").removeClass("btn-success");
					}				
				}else if(data="no_existe"){
					fin_preloader_guardar('El usuario no se encuentra registrado','danger');
				}else{
					fin_preloader_guardar('Ha ocurrido un error inesperado','danger');
				}
				//--------------------------------------------------------------------------------------
			})
			.error(function(data,estatus){
				notificaciones_material("Ocurrió un error, contacte al administrador del sistema"+ data,"danger")
				console.log(data);
			});
		}
		//-- Limpiar formulario actualizacion
		$scope.limpiar_formulario_actualizacion = function(){
			$scope.usuario_individual = {
										'id':'',
										'name':'',
										'email':'',
										'type':'',
										'password':'',
										'csrftoken':'',
										'estatus_id':''			
			}
			$(".limpiar").val("")
			$(".select").val("0")
			$scope.formUser = "Inactivo"
		}
		//-- Validar formulario
		$scope.validar_form = function(){
			if(($scope.usuario_individual.name=="")||($scope.usuario_individual.name==undefined)){
				notificaciones_material("Debe ingresar nombre de usuario","danger")				
				return false;
			}else if(($scope.usuario_individual.email=="")||($scope.usuario_individual.email==undefined)){
				notificaciones_material("Debe ingresar email","danger")				
				return false;
			}else if(($scope.usuario_individual.password=="")||($scope.usuario_individual.password==undefined)){
				notificaciones_material("Debe ingresar clave de usuario","danger")				
				return false;
			}
			else if(($scope.usuario_individual.type=="")||($scope.usuario_individual.type==undefined)){
				notificaciones_material("Debe seleccionar tipo de usuario","danger")				
				return false;
			}else{
				return true;
			}	
		}
		//--------------------------------------------
		//--Cuerpo de llamados
		$scope.configuracion_inicial();
		$scope.consultar_usuarios();
	});	