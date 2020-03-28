angular.module("ContentManagerApp")
//--- Bloque directivas:
//---Para galeria:
//----Directiva Doctores		
	//.directive('dropZone',dropZone)
	.directive('imgZone',imgZone)
	.directive('galeriaImagenes',galeriaImagenes)
	.directive('botoneraBloque',botoneraBloque)
//--Para el preloader	
	.directive('loading',   ['$http' ,function ($http)
    {
        return {
            restrict: 'A',
            link: function (scope, elm, attrs)
            {
                scope.isLoading = function () {
                    return $http.pendingRequests.length > 0;
                };

                scope.$watch(scope.isLoading, function (v)
                {
                    if(v){
                        elm.show();
                    }else{
                        elm.hide();
                    }
                });
            }
        };

    }])
	//------------------------------------------------------------------------------------------------
//--Directiva Subir archivos
	.directive('ngFileModel', ['$parse', function ($parse) {
	    return {
	        restrict: 'A',
	        link: function (scope, element, attrs) {
	            var model = $parse(attrs.ngFileModel);
	            var isMultiple = attrs.multiple;
	            var modelSetter = model.assign;
	            element.bind('change', function () {
	                var values = [];
	                angular.forEach(element[0].files, function (item) {
	                    var value = {
	                       // File Name 
	                        name: item.name,
	                        //File Size 
	                        size: item.size,
	                        //File URL to view 
	                        url: URL.createObjectURL(item),
	                        // File Input Value 
	                        _file: item
	                    };
	                    values.push(value);
	                });
	                scope.$apply(function () {
	                    if (isMultiple) {
	                        modelSetter(scope, values);
	                    } else {
	                        modelSetter(scope, values[0]);
	                    }
	                });
	            });
	        }
	    };
	}])
	.directive('uploaderModel', ["$parse", function ($parse) {
		return {
			restrict: 'A',
			link: function (scope, iElement, iAttrs) 
			{
				iElement.on("change", function(e)
				{
					$parse(iAttrs.uploaderModel).assign(scope, iElement[0].files[0]);
				});
			}
		};
	}])
	function botoneraBloque(){
		return {
				restrict:'E',
				transclude: true,
				scope:{
				},
            	templateUrl: "./site_media/templates/botonera.html",
            	controller:"mensajesController"
        };
	}

function galeriaImagenes(){
	//--
	return {
				restrict: 'E',
				transclude: true,
				scope:{
					galeria:'@'
				},
				templateUrl :"./site_media/templates/galeriaImagenes.html",
				controller:"albumController",
				replace:true
	}
	//--
}
//--
function imgZone(){
//--
	//---
	function archivo(evt) {
		var files = evt.target.files; // FileList object
	    //Obtenemos la imagen del campo "file".	
		for (var i = 0, f; f = files[i]; i++) {		
	    	 //Solo admitimos imágenes.
	     	if (!f.type.match('image.*')) {
		    	continue;
	     	}
	     var reader = new FileReader();
	     reader.onload = (function(theFile) {
		   return function(e) {
		   // Creamos la imagen.
		   //document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
		    $("#list").append(['<div class="col-lg-4 col-md-3 col-sm-4 col-xs-6 divbiblioteca"><img class="imgbiblioteca_principal" src="', e.target.result,'" title="', escape(theFile.name), '"/></div>'].join('')).fadeIn("slow");
		   };
	     })(f);

	     reader.readAsDataURL(f);
	   }
	}
	//---
	function armar_img_zone(){
	///---	
		document.getElementById('file').addEventListener('change', archivo, false);
	///---
	}
	//---
	return {
				link:armar_img_zone,
				restrict: 'E',
				transclude: true,
				scope:{

				},
				templateUrl :"./site_media/templates/imgZone.html",
				controller:"albumController",
				replace:true
	}
	//--	
}