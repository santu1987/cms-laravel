angular.module("ContentManagerApp")
//---------------------------------------------------------------------------------------
//--Bloque de servicios
//--Servicio para cargar imagenes...	
.service('upload', ["$http", "$q", function ($http, $q) 
{
	this.uploadFile = function(file,categoria,nombre)
	{
		var deferred = $q.defer();
		var formData = new FormData();
		formData.append("file", file);
		formData.append("categoria", categoria);
		formData.append("nombre", nombre);

		console.log(formData)
		return $http.post("/administrador/albums/cargar_imagen", formData, {
			headers: {
				"Content-type": undefined
			},
			transformRequest: angular.identity
		})
		.success(function(res)
		{
			deferred.resolve(res);
		})
		.error(function(msg, code)
		{
			deferred.reject(msg);
		})
		return deferred.promise;
	}	
}])
//--Bloque de servicios ----------------------------------------------------------------------------------
//--Servicio para compartir datos de mensajes iniciales
.service('serverDataMensajes',[function(){
	var puente = [];
	this.puenteData = function(arreglo){
		puente = arreglo;
		return puente;
	}
	this.obtener_arreglo = function(){
		return puente;
	}
	this.limpiar_arreglo_servicio = function (){
		puente = [];
		return puente;
	}
}])
//--Bloque de factorias----------------------------------------------------------------------------------
//Para consultar datos de usuarios
.factory("usuariosFactory",['$http', function($http){

	return{
			valor_token : function (valor_token){
				if(valor_token!="")
					token = valor_token;
				else
					token = "";
			},
			cargar_usuarios : function(callback){
				$http.post("/administrador/usuarios/getConsulta",{ "_token":token}).success(callback);
			}
	}
}])
.factory("categoriasFactory",['$http',function($http){
	return{
			valor_token: function (valor_token){
				if(valor_token!="")
					token = valor_token;
				else
					token = "";
			},
			cargar_categorias : function(callback){
				$http.post("/administrador/categorias/consultar_categorias",{ "_token":token}).success(callback);
			}
	}
}])
.factory("categoriasImagenFactory",['$http',function($http){
	return{
			valor_token: function (valor_token){
				if(valor_token!="")
					token = valor_token;
				else
					token = "";
			},
			cargar_categoria_imagen : function(callback){
				$http.post("/administrador/albums/getConsultaCategorias",{ "_token":token,"valor":"valor"}).success(callback);
			}
	}
}])
.factory("galeriaFactory",['$http',function($http){
	return{
			valor_token: function (valor_token,valor_id_categoria){
				if(valor_token!="")
					token = valor_token;
				else
					token = "";
				if(valor_id_categoria!="")
					id_categoria = valor_id_categoria;
				else
					id_categoria = "";
			},
			cargar_galeria : function(callback){
				$http.post("/administrador/albums/getConsultaGaleria",{ "_token":token, "id_categoria":id_categoria}).success(callback);
			}
	}
}])
.factory ("imagenesFactory",['$http',function($http){
	return{

			valor_token: function (valor_token){
				if(valor_token!="")
					token = valor_token;
				else
					token = "";
				//--
				categoria = 3;
			},
			cargar_imagenes : function(callback){
				$http.post("/administrador/albums/consulta_imagenes",{ "_token":token, "categoria":categoria}).success(callback);
			}
	}
}])
.factory("tagsFactory",['$http',function($http){
	return{
			valor_token: function (valor_token){
				if(valor_token!="")
					token = valor_token;
				else
					token = "";
			},
			cargar_tags : function(callback){
				$http.post("/administrador/tags/getConsulta",{ "_token":token}).success(callback);
			}
	}
}]);