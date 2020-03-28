angular.module("ContentManagerApp")
	.controller("TagsConsultaController", function($scope,$http,$location,$window,tagsFactory){
		
		$(".menu").css({"display":"none"})
		$("#menu_blog").css({"display":"block"})

		$scope.tags = {
							'id':'',
							'name':'',
							'csrftoken':'',
							'estatus_id':''
		}
		$scope.tags_individual = {
							'id':'',
							'name':'',
							'csrftoken':'',
							'estatus_id':''
		}
		$scope.formTag = "Inactivo"
		$scope.configuracion_inicial = function(){
			//---
			setTimeout(function(){
				iniciar_datatable();
			},500);
			//---
		}
		//--Metodo para consultar usuarios via ajax
		$scope.consultar_tags = function(){
			tagsFactory.valor_token($("input:text[name=_token]").val());
			tagsFactory.cargar_tags(function(data){
					$scope.tags=data;
					console.log($scope.tags);				
			});
		}
		//--Metodo para ver el formulario del registro
		$scope.ver_registro = function(indice){
			$scope.tags_individual = $scope.tags[indice]
			$scope.formTag = "Activo"
			console.log($scope.tags_individual)
			$(".form-control").addClass("form-control--active")
		}
		//--Metodo para consultar usuarios
		$scope.consultar_tags_ac = function(){
			$scope.tags_individual = ""
			$scope.formTag = "Inactivo"
		}
		//--Metodo para actualizar datos de usuarios
		$scope.actualizar_tag = function(){
			if ($scope.validar_form()==true){
			//---------------------------------------------
			var in_data ={
							"id": $scope.tags_individual.id,
							"name":  $scope.tags_individual.name,
							"_token":  $("inpute:text[name=_token]").val()
						};		
			$http({
					method: "POST",
					url:"/administrador/tags/actualizar_tag",
					data: in_data
			})
			.success(function(data){
				if(data=="actualizacion_exitosa"){
					fin_preloader_guardar('El registro se ha actualizado de manera exitosa','success');
					$scope.limpiar_formulario_actualizacion();
				}else if(data="existe_tag"){
					fin_preloader_guardar('El nombre ya se encuentra registrado para otra categoría','danger');
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
                    title: 'Desea '+proceso+' la categoría seleccionada',
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
								"id":$scope.tags[indice].id

			}
			$http({
					method: "POST",
					url: "/administrador/tags/actualiza_estatus_tag",
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
					fin_preloader_guardar('La categoría no se encuentra registrado','danger');
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
			$scope.tags_individual = {
										'id':'',
										'name':'',
										'csrftoken':'',
										'estatus_id':''			
			}
			$(".limpiar").val("")
			$(".select").val("0")
			$scope.formTag = "Inactivo"
		}
		//-- Validar formulario
		$scope.validar_form = function(){
			if(($scope.tags_individual.name=="")||($scope.tags_individual.name==undefined)){
				notificaciones_material("Debe ingresar nombre de usuario","danger")				
				return false;
			}else{
				return true;
			}	
		}
		//--------------------------------------------
		//--Cuerpo de llamados
		$scope.configuracion_inicial();
		$scope.consultar_tags();
	});	