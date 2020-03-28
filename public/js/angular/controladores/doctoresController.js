angular.module("ContentManagerApp")
	.controller("doctoresController", function($scope,$http,$location,serverDataMensajes,especialidadFactory,galeriaFactory,sesionFactory){
		$scope.menu = "activo";
		$scope.submenu = "admin"
		$scope.titulo_pagina = "Doctores";
		$scope.currentTab = 'datos_basicos';
		$scope.doctor = {
							'id':'',
							'id_personas':'',
							'cedula':'',
							'nombres_apellidos':'',
							'especialidad':'',
							'descripcion':'',
							'imagen':'',
							'doctores_soportes':'',
							'estatus':''
		}

		$scope.doctores_soportes =[]
		$scope.especialidad=[]
		$scope.galeria = []
		$scope.galeria_soporte = []
		$scope.borrar_imagen = []
		$scope.activo_img = "inactivo"
		$scope.borrar_imagen_soportes = []
		$scope.doctor.id_soportes = []
		$scope.activo_img.soportes = "inactivo"
		$scope.path_imagen_seleccionada = []
		$scope.valor_intermedio = ""
		//----------------------------------------------------------
		//valido inicio de sesion
		$scope.sesion_usuario = function(){
			sesionFactory.sesion_usuario(function(data){
				if(data["respuesta"]=="cerrado"){
					$location.path("/");
				}
			});
		}
		//----------------------------------------------------------
		$scope.validar_vacio = function(){
			//Para especialidad
			if($scope.doctor.especialidad){
				setTimeout(function(){
					$('#doctor_especialidad').val($scope.doctor.especialidad);
					$('#doctor_especialidad > option[value="'+$scope.doctor.especialidad+'"]').attr('selected', 'selected');
					$("#doctor_especialidad").selectpicker('refresh');
				},2500);
			}
			//Para estatus
			if($scope.doctor.estatus=="1"){
				$("#check_publicado").removeClass("fa-square-o").addClass("fa-check-square-o");
				$scope.doctor.estatus = "1";
			}else
			if($scope.doctor.estatus=="0"){
				$("#check_publicado").removeClass("fa-check-square-o").addClass("fa-square-o");
				$scope.doctor.estatus = "0";
			}
			//Para resumen curricular
			if($scope.doctor.descripcion){
				$(".trumbowyg-editor").html($scope.doctor.descripcion);
			}
			//Para imagenes
			if($scope.doctor.imagen){
				$scope.activo_img = "activo";
			}
			//Para soportes id
			if($scope.doctor.id_soportes){
				var arreglo_id_soportes = new Array();
				arreglo_id_soportes = $scope.doctor.id_soportes.split("|");
				for(i=0;i<arreglo_id_soportes.length;i++){
					$scope.borrar_imagen_soportes.push(arreglo_id_soportes[i]);	
				}				
			}
			//Para soportes rutas
			if($scope.doctor.doctores_soportes){
				var arreglo_soportes = new Array();
				arreglo_soportes = $scope.doctor.doctores_soportes.split("|");
				for(i=0;i<arreglo_soportes.length;i++){
					//alert("aqui"+arreglo_soportes[i]);
					$scope.doctores_soportes.push(arreglo_soportes[i]);	
				}				
				$scope.activo_img_soportes = "activo"
			}
		}
		//----
		//----------------------------------------------------------
		$scope.valor_intermedio = serverDataMensajes.obtener_arreglo();
		if($scope.valor_intermedio){
			$scope.doctor = $scope.valor_intermedio;
		}
		$scope.validar_vacio();			
		if($scope.doctor.id==undefined){
			$scope.doctor.id="";
		}
		//alert($scope.doctor.id);
		//----------------------------------------------------------
		$scope.carga_especialidad = function(){
			especialidadFactory.cargar_especialidad(function(data){
				$scope.especialidad = data;
				setTimeout(function(){
					$("#doctor_especialidad").selectpicker('refresh');
				},600);
				//console.log(data);
			});
		}
		//--
		$scope.seleccione_img_principal = function(){
			$("#modal_img1").modal("show");
				
		}
		//--
		$scope.seleccione_img_soporte = function(){
			$("#modal_img2").modal("show");

			//
			//console.log("Inicio"+$scope.doctores_soportes);
			var arreglo_soportes = $scope.doctores_soportes;
			//arreglo_soportes = arreglo_soportes.split("|"); 
			var galeria_soporte = $scope.galeria_soporte
			var galeryx = new Array();
			//Armo arreglo a consultar
			for (i=0;i<galeria_soporte.length;i++){
				galeryx[i] = galeria_soporte[i].path_imagen;
			}
			//$scope.borrar_imagen_soportes.lenght = 0;//manejo los id
			//$scope.doctores_soportes. length = 0; //maneja las rutas
			//Marco c/u
			for(j=0;j<arreglo_soportes.length;j++){
				//alert("El arreglo:"+j+"Cuantos:"+arreglo_soportes.length+" "+arreglo_soportes[j]);
				posicion = galeryx.indexOf(arreglo_soportes[j]);
				//--Limpio el scope...
				$scope.seleccionar_imagen_soportes_individual("img_soporte"+posicion);
			}
		}
		//--
		$scope.seleccionar_imagen = function(event){
			var imagen = event.target.id;//Para capturar id
			var vec = $("#"+imagen).attr("data");
			var vector_data = vec.split("|")
			var id_imagen = vector_data[0];
			var ruta = vector_data[1];
			$scope.borrar_imagen.push(id_imagen);
			$scope.activo_img = "activo"
			$scope.doctor.imagen = ruta;
			//--
			$("#modal_img1").modal("hide");
			//--
		}
		//--
		$scope.seleccionar_imagen_soportes_individual = function(imagen){
			var vec = $("#"+imagen).attr("data");
			var vector_data = vec.split("|")
			var id_imagen = vector_data[0];
			var ruta = vector_data[1];
			//--
			$("#"+imagen).addClass("marcado");
			if($scope.borrar_imagen_soportes.indexOf(id_imagen)==-1){
				$scope.borrar_imagen_soportes.push(id_imagen);//manejo los id
			}
			if($scope.doctores_soportes.indexOf(ruta)==-1){
				$scope.doctores_soportes.push(ruta); //maneja las rutas
			}	
			$scope.activo_img_soportes = "activo"				
			//--
		}
		//--
		$scope.seleccionar_imagen_soportes = function(event){

		//-------------------------------------------------
		var imagen = event.target.id;//Para capturar id
			var vec = $("#"+imagen).attr("data");
			var vector_data = vec.split("|")
			var id_imagen = vector_data[0];
			var ruta = vector_data[1];
			if(($("#"+imagen).hasClass("marcado"))==true){
				$("#"+imagen).removeClass("marcado");
				//alert("al iniciar:"+$scope.borrar_imagen_soportes)
				//Limpia los ids
				$indice = $scope.borrar_imagen_soportes.indexOf(id_imagen);
				$scope.borrar_imagen_soportes.splice($indice,1);
				//Limpio las rutas
				$indice_ruta = $scope.doctores_soportes.indexOf(ruta);
				$scope.doctores_soportes.splice($indice_ruta,1);
				//alert("al borrar:"+$scope.borrar_imagen_soportes)
				//
				if($scope.doctores_soportes.length==0){
					$scope.activo_img_soportes = "inactivo"
				}
			}else{
				$("#"+imagen).addClass("marcado");
				$scope.borrar_imagen_soportes.push(id_imagen);//manejo los id
				$scope.doctores_soportes.push(ruta); //maneja las rutas
				$scope.activo_img_soportes = "activo"				
			}
		//-------------------------------------------------	
			$scope.conf_masonrry();
		}
		//--
		$scope.consultar_galeria = function(){
			$scope.galeria = "";
			galeriaFactory.valor_id_categoria('1');//1 ya que es doctores
			galeriaFactory.cargar_galeria_fa(function(data){
					$scope.galeria=data;
					//console.log($scope.galeria);				
			});
		}
		//--
		$scope.consultar_galeria_soporte = function(){
			$scope.galeria_soporte = "";
			galeriaFactory.valor_id_categoria('2');//2 ya que es soportes del dr
			galeriaFactory.cargar_galeria_fa(function(data){
					//alert(data);
					$scope.galeria_soporte=data;
					$scope.conf_masonrry();
					//console.log($scope.galeria_soporte);				
			});
		}
		//---------------------------------------
		$scope.iniciar_select = function(){
			setTimeout(function(){
				//--
				$("#doctor_especialidad").selectpicker('refresh');
				//--
			},2000);
		}
		//---------------------------------------
		$scope.registrar_doctor = function(){
			$scope.asignar_model();
			if($scope.validar_form()==true){
				uploader_reg("#mensaje_dr","#doctor_cedula,#doctor_nombres,#doctor_especialidad");
				//Para guardar
				//alert("id_personas:"+$scope.doctor.id_personas);
				//alert("id_doctor:"+$scope.doctor.id);
				if((($scope.doctor.id_personas!=undefined)&&($scope.doctor.id!=undefined))&&(($scope.doctor.id_personas!="")&&($scope.doctor.id!=""))){
					$scope.modificar_doctor();	
				}else{
					$scope.insertar_doctor();
				}				
			}
		}
		//---------------------------------------
		$scope.asignar_model = function(){
			$scope.doctor.descripcion = $(".trumbowyg-editor").html();
		}
		//---------------------------------------
		$scope.validar_form = function(){
			if($scope.doctor.cedula==""){
				showErrorMessage("Debe indicar la cédula del Dr!");				
				return false;
			}else if($scope.doctor.nombres_apellidos==""){
				showErrorMessage("Debe indicar nombres y apellidos del Dr!");				
				return false;
			}else if(($scope.doctor.especialidad=="")||($scope.doctor.especialidad=="0")){
				showErrorMessage("Debe indicar la especialidad!");				
				return false;
			}
			else if($scope.doctor.descripcion==""){
				showErrorMessage("Debe incluir el resumén curricular!");				
				return false;
			}
			/*else if($scope.doctor.imagen==""){
				showErrorMessage("Debe incluir la foto del Dr!");				
				return false;
			}*/
			/*else if($scope.doctores_soportes.length=="0"){
				showErrorMessage("Debe incluir Soportes de la carrera del Dr");				
				return false;
			}*/else{
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
		$scope.insertar_doctor = function(){
			$http.post("./controladores/doctoresController.php",
			{
							 'cedula':$scope.doctor.cedula,
							 'id':$scope.doctor.id,
							 'nombres_apellidos':$scope.doctor.nombres_apellidos,
							 'especialidad':$scope.doctor.especialidad.id,
							 'descripcion':$scope.doctor.descripcion,
							 'imagen':$scope.doctor.imagen,
							 'soportes':$scope.doctores_soportes,
							 'id_soportes':$scope.borrar_imagen_soportes,
							 'accion':'registrar_doctor'

			}).success(function(data, estatus, headers, config){
							if(data["mensajes"]=="registro_procesado"){
								showSuccess("El registro fue realizado de manera exitosa");
								$scope.doctor.id_personas =data["id_persona"];
								$scope.doctor.id = data["id"]
								$scope.limpiar_cajas()
							}else if(data["mensajes"]=="existe"){
								showSuccess("Ya existe un D.R registrado con ese número de cédula");
							}
							else{
								showErrorMessage("Ocurrió un error inesperado");
							}
						desbloquear_pantalla("#mensaje_dr","#doctor_cedula,#doctor_nombres,#doctor_especialidad")
						}).error(function(data,estatus){
							console.log(data);
			});	
		}
		//--------------------------------------------
		$scope.modificar_doctor = function(){
			//alert($scope.borrar_imagen_soportes);
			especialidad = $("#doctor_especialidad").val()
			$http.post("./controladores/doctoresController.php",
			{
							 'cedula':$scope.doctor.cedula,
							 'id':$scope.doctor.id,
							 'nombres_apellidos':$scope.doctor.nombres_apellidos,
							 'especialidad':especialidad,
							 'descripcion':$scope.doctor.descripcion,
							 'imagen':$scope.doctor.imagen,
							 'soportes':$scope.doctores_soportes,
							 'id_soportes':$scope.borrar_imagen_soportes,
							 'accion':'modificar_doctor',
							 'id_personas':$scope.doctor.id_personas,
							 'estatus':$scope.doctor.estatus
			}).success(function(data, estatus, headers, config){
							if(data["mensajes"]=="modificacion_procesada"){
								showSuccess("El registro fue actualizado de manera exitosa");
								$scope.limpiar_cajas();
							}else if(data["mensajes"]=="no_existe"){
								showSuccess("No existe un D.R registrado con ese número de cédula");
							}else if(data["mensajes"]=="no_existe_persona"){
								showSuccess("No existe la persona");
							}
							else{
								showErrorMessage("Ocurrió un error inesperado");
							}
							desbloquear_pantalla("#mensaje_dr","#doctor_cedula,#doctor_nombres,#doctor_especialidad")
						}).error(function(data,estatus){
							console.log(data);
			});		
		}
		//----------------------------------------
		$scope.conf_masonrry = function(){
			$(".img_galeria").addClass("animated fadeIn");
            $("grid-item").masonry({itemSelector: '.grid-item',percentPosition: true});
			    	setTimeout(function(){
		    			$(".img_galeria").removeClass("animated fadeIn");
		    			if($scope.inicio_masonrry != '1'){
		    				//$("#masonrry").masonry( 'destroy' )
		    				$scope.iniciar_masonry(); 
		    			}             			
		    		},1000);		    			//
		}
		//-------------------------------------------
		$scope.iniciar_masonry = function(){
			setTimeout(function(){
   				$("#masonrry").masonry();
   				$scope.inicio_masonrry = "1";
   			},1000);	
		}
		//----------------------------------------
		$scope.consultar_doctores = function(){
			$location.path("/consultar_doctores");
		}
		//----------------------------------------
		$scope.limpiar_cajas = function (){
			$scope.doctor = {
							'id':'',
							'id_personas':'',
							'cedula':'',
							'nombres_apellidos':'',
							'especialidad':'',
							'descripcion':'',
							'imagen':'',
							'doctores_soportes':''
			}
			$scope.activo_img_soportes = "inactivo"
			$scope.activo_img = "inactivo"
			$scope.doctores_soportes =[]
			$("#masonrry").attr("style","height:0px;");
			$(".trumbowyg-editor").html("");
			$('#doctor_especialidad').val("0");
			$('#doctor_especialidad > option[value=0]').attr('selected', 'selected');
			$("#doctor_especialidad").selectpicker('refresh');
			serverDataMensajes.limpiar_arreglo_servicio();
		}
		//----
		//---Limpia arreglo de DataMensajes de otros controllers
		$scope.opcion_menu = function(opcion){
			serverDataMensajes.limpiar_arreglo_servicio();
		}
		//----------------------------------------
		//Bloque de eventos
		$scope.sesion_usuario();
		cargar_preload();
		$scope.carga_especialidad();
		$scope.consultar_galeria();
		$scope.consultar_galeria_soporte();
		$('#noticia_descripcion').trumbowyg();
		//$scope.iniciar_masonry();
		//---------------------------------------
	}); 