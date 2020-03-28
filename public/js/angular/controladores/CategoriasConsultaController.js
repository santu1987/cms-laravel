angular.module("ContentManagerApp")
	.controller("CategoriasConsultaController", function($scope,$http,$location,$window,categoriasFactory){
		
		$(".menu").css({"display":"none"})
		$("#menu_blog").css({"display":"block"})
		
		$scope.categoria = {
							'id':'',
							'name':'',
							'csrftoken':'',
							'estatus_id':''
		}
		$scope.categoria_individual = {
							'id':'',
							'name':'',
							'csrftoken':'',
							'estatus_id':''
		}
		$scope.formCategory = "Inactivo"
		$scope.configuracion_inicial = function(){
			//---
			setTimeout(function(){
				iniciar_datatable();
			},500);
			//---
		}
		//--Metodo para consultar usuarios via ajax
		$scope.consultar_categorias = function(){
			categoriasFactory.valor_token($("inpute:text[name=_token]").val());
			categoriasFactory.cargar_categorias(function(data){
					$scope.categoria=data;
					console.log($scope.categoria);				
			});
		}
		//--Metodo para ver el formulario del registro
		$scope.ver_registro = function(indice){
			$scope.categoria_individual = $scope.categoria[indice]
			$scope.formCategory = "Activo"
			console.log($scope.categoria_individual)
			$(".form-control").addClass("form-control--active")
		}
		//--Metodo para consultar usuarios
		$scope.consultar_categorias_ac = function(){
			$scope.categoria_individual = ""
			$scope.formCategory = "Inactivo"
		}
		//--Metodo para actualizar datos de usuarios
		$scope.actualizar_categoria = function(){
			if ($scope.validar_form()==true){
			//---------------------------------------------
			var in_data ={
							"id": $scope.categoria_individual.id,
							"name":  $scope.categoria_individual.name,
							"_token":  $("inpute:text[name=_token]").val()
						};		
			$http({
					method: "POST",
					url:"/administrador/categorias/actualizar_categoria",
					data: in_data
			})
			.success(function(data){
				if(data=="actualizacion_exitosa"){
					fin_preloader_guardar('El registro se ha actualizado de manera exitosa','success');
					$scope.limpiar_formulario_actualizacion();
				}else if(data="existe_categoria"){
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
								"id":$scope.categoria[indice].id

			}
			$http({
					method: "POST",
					url: "/administrador/categorias/actualiza_estatus_categoria",
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
			$scope.categoria_individual = {
										'id':'',
										'name':'',
										'csrftoken':'',
										'estatus_id':''			
			}
			$(".limpiar").val("")
			$(".select").val("0")
			$scope.formCategory = "Inactivo"
		}
		//-- Validar formulario
		$scope.validar_form = function(){
			if(($scope.categoria_individual.name=="")||($scope.categoria_individual.name==undefined)){
				notificaciones_material("Debe ingresar nombre de usuario","danger")				
				return false;
			}else{
				return true;
			}	
		}
		//--------------------------------------------
		//--Cuerpo de llamados
		$scope.configuracion_inicial();
		$scope.consultar_categorias();
	});	