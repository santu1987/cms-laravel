//Script que contiene funciones básicas de javascript utilizadas en diversos modulos del sistema.
var player;

//funciones mde validaciones de longitud
function longitud(campo,longitud)
{
  var campo_sin_espacios = $.trim($(campo).val());
  if(campo_sin_espacios.length < longitud)
  {
     $(campo).val("");  
     return false;     
  }
  else
    return true
}
//funciones de validaciones
function valida(e,s,i,l)
{   
  tecla = (document.all) ? e.keyCode : e.which; 
  if (tecla==8 || tecla==0 || tecla==13) return true;
  //Exepcion barras y barras invertidas
  if(tecla == 47 || tecla == 92) return false;
  if (s.value.length>=l) return false;
        
  if (i==0) patron = /[ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz]/;  // 0 Solo acepta letras
  if (i==1) patron = /[0123456789,.%]/;     // 1 Solo acepta n�meros
  if (i==2) patron = /[ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789]/;      // 2 Acepta n�meros y letras
  if (i==3) patron = /[ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789��������������\s]/;
  if (i==4) patron=  /[ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz��������������\s]/;
  if (i==5) patron=  /[ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789@._-]/; // Formato Correo Electronico
  if (i==6) patron=  /[ABCDEFabcdef0123456789]/;
  if (i==7) patron = /[ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789��������������()@:;_\-.,/\s]/;
  if (i==8) patron = /[01]/;
  if (i==9) patron = /[GJV0123456789]/; //Formato de RIF
  if (i==10)patron = /[0123456789]/;
  if (i==11)patron = /[abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_]/; 
  if (i==12)patron = /[gjveGJVE0123456789]/;  //RIF
  if (i==13) patron = /[0123456789,]/; 
  if (i==14) patron=  /[ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789._-]/; // Formato Nick Correo Electronico
  if (i==15) patron=  /[ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz@.]/; // Formato direccion manual Correo Electronico
  if (i==16) patron = /[ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz\wáéíóúÁÉÍÓÚ\s]/;  // 0 Solo acepta letras y comas
  if (i==17) patron = /[ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz\wáéíóúÁÉÍÓÚ0123456789\s,.]/; // Acepta n�meros, letras, espacios ,.
  if (i==18) patron = /[ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz\wáéíóúÁÉÍÓÚñÑ0123456789.,;()+-_=#*?¿{}$!\s]/; // Acepta n�meros, letras, espacios ,.
  if (i==19) patron=  /[A-Za-zñÑ'áéíóúÁÉÍÓÚàèìòùÀÈÌÒÙâêîôûÂÊÎÔÛÑñäëïöüÄËÏÖÜ\s\t]/; 
  if (i==20) patron = /[ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789*.,;%()+-_=?¿{}$!]/; // Acepta clave para el ldap
  if (i==21) patron = /[+0123456789.()]/;
  if (i==22) patron=  /[ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789;_\-.,\s]/; // Formato de url de red social
  te = String.fromCharCode(tecla);
  return patron.test(te);
} 
function valida2(s,i,l)
{
  if (i==0) patron = /[ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz]/;  // 0 Solo acepta letras
  if (i==1) patron = /[0123456789,.%]/;     // 1 Solo acepta n�meros
  if (i==2) patron = /[ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789]/;      // 2 Acepta n�meros y letras
  if (i==3) patron = /[ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789��������������\s]/;
  if (i==4) patron=  /[ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz��������������\s]/;
  if (i==5) patron=  /[ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789@._-]/;
  if (i==6) patron=  /[ABCDEFabcdef0123456789]/;
  if (i==7) patron = /[ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789��������������()@:;_\-.,/\s]/;
  if (i==8) patron = /[01]/;
  if (i==9) patron = /[GJV0123456789]/;
  if (i==10)patron = /[0123456789]/;
  if (i==11)patron = /[abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_]/;   
  if (i==12)patron = /[gjveGJVE0123456789]/;  //RIF
  if (i==13) patron = /[0123456789,]/; 
  if (i==14) patron=  /[ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789._-]/; // Formato Nick Correo Electronico
  if (i==15) patron=  /[ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz@.]/; // Formato direccion manual Correo Electronico
  if (i==16) patron = /[ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz\wáéíóúÁÉÍÓÚ\s]/;  // 0 Solo acepta letras y comas
  if (i==17) patron = /[ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789\s,.]/; // 2 Acepta n�meros, letras, espacios ,.
  if (i==18) patron = /[ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz\wáéíóúÁÉÍÓÚñÑ0123456789.,;()+-_=#*?¿{}$!\s]/; // Acepta n�meros, letras, espacios ,.
  if (i==19) patron=  /[A-Za-zñÑ'áéíóúÁÉÍÓÚàèìòùÀÈÌÒÙâêîôûÂÊÎÔÛÑñäëïöüÄËÏÖÜ\s]/;
  if (i==20) patron = /[ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789*.,;%()+-_=?¿{}$!]/; // Acepta clave para el ldap
  if (i==21) patron = /[+0123456789.()]/;
  if (i==22) patron=  /[ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789;_\-.,/\s]/; // Formato de url red social
  r="";
  ll=0;
  for (i=0;i<s.value.length;i++)
  {
    if (patron.test(s.value.charAt(i)))
    {
      r=r+s.value.charAt(i);
      ll++;
      if (ll==l) break;
    }
  }
  
  return s.value=r;
}
//--Bloque de funciones para los mensajes emergenetes
//funcion para crear estructura modal preconfigurado por el usuario
function crear_modal(texto)
{
  var cuerpo=texto;
  var cabecera='<h3 class="modal-title" id="myModalLabel" name="myModalLabel" >Informaci&oacute;n:</h3>';
  //$("#cuerpo_mensaje").css({"height":"auto"});
  $("#cabecera_mensaje").html(cabecera);
  $("#cuerpo_mensaje").html(cuerpo);
}
//funcion que inserta el mensaje dentro el modal
function mensajes(texto)
{
  crear_modal(texto);
  $("#modal_mensaje").modal("show");
}
//funcion para crear estructura modal2 preconfigurado por el usuario
function crear_modal2(texto)
{
  var cuerpo2=texto;
  var cabecera2='<h3 class="modal-title" id="myModalLabel2" name="myModalLabel2" >Informaci&oacute;n:</h3>';
  //$("#cuerpo_mensaje").css({"height":"auto"});
  $("#cuerpo_mensaje2").removeClass("cuerpo_normal").removeClass("cuerpo_xdefecto").removeClass("cuerpo_astecnico").addClass("cuerpo_auto");
  $("#cabecera_mensaje2").html(cabecera2);
  $("#cuerpo_mensaje2").html(cuerpo2);
}
//funcion que inserta el mensaje dentro el modal2
function mensajes_modal2(texto)
{
  crear_modal2(texto);
  $("#modal_mensaje2").modal("show");
}
//--Fin del bloque
function cambiar_formato(fecha_hora)
{
  var fecha = fecha_hora.substr(8,2)+"/"+fecha_hora.substr(5,2)+"/"+fecha_hora.substr(0,4)+" "+fecha_hora.substr(10);
  return fecha;
}
//Para restar caracteres de textarea
function restar_caracteres(campo,campo2)
{
    var value = $(campo).val().length;
    value = 400 - value;
    $(campo2).html(value);
}
//Mensaje de validacion
function mensaje_preloader(campo)
{
  $(campo).removeClass("alert alert-danger").removeClass("alert alert-success").removeClass("alert alert-info").addClass("alert alert-primary");
  $(campo).html("<i class='fa fa-spinner fa-pulse'></i>  Espere unos segundos mientra se realiza la carga..");
  $(campo).show();
}
//Mensaje de validacion
function mensaje_preloader2(campo,mensaje)
{
  $(campo).removeClass("alert alert-danger").removeClass("alert alert-success").addClass("alert alert-info mensaje_load");
  $(campo).html("<i class='fa fa-spinner fa-pulse'></i> "+mensaje);
  $(campo).show();
}
//Para quitar preloader...
function quitar_preloader(){
  $("#contenido_inicial").removeClass("mostrar").removeClass("contenido_inicial").addClass("ocultar");  
  $("#contenido_web").removeClass("ocultar").addClass("mostrar");
}
//Mensaje de validacion
function mensaje_alerta(campo, mensaje, tipo_alerta)
{
  $(campo).removeClass("alert alert-danger").removeClass("alert alert-success").removeClass("alert alert-info").removeClass("alert alert-primary");
  $(campo).addClass("alert "+tipo_alerta);
  $(campo).html(mensaje);
  setTimeout(function()
  {
    $(campo).fadeOut(1400);
  },2000);
  $(campo).show();
}
//Bloquear cualquier pantalla
function bloquear_pantalla(campos)
{
  $(campos).attr("disabled","disabled");
}
//Desbloquear cualquier pantalla apelacion
function desbloquear_pantalla(campos)
{
  $(campos).attr("disabled",false);
}
//Para validar que el texto no tenga mas de un espacio en blanco
function quitar_espacios(texto,campo){
 var cadena="";
 var texto2="";
 //cadena = texto.replace(/-+/g," "); 
 cadena = texto.replace(/([\ \t]+(?=[\ \t])|^\s+|\s+$)/g, ' ');
 $(campo).val(cadena);
 alert(cadena);
 alert("Este es el texto:"+texto);
}
//Para evitar ir hacia atras 
function nobackbutton(){
  window.location.hash="";
  window.location.hash="Again-No-back-buttonsafgasf";
  window.onhashchange=function(){
    window.location.hash="";
  }
}
//--Para formatear el campo fecha
function IsNumeric(valor) 
{ 
  var log=valor.length; var sw="S"; 
  for (x=0; x<log; x++) 
  { 
    v1=valor.substr(x,1); 
    v2 = parseInt(v1); 
    //Compruebo si es un valor num?rico 
    if (isNaN(v2))
    { 
      sw= "N";
    } 
  } 
  if (sw=="S") 
  {
    return true;
  } 
  else 
  {
    return false;
  } 
} 
//--
var primerslap=false; 
var segundoslap=false; 
function formateafecha(fecha) 
{ 
    var long = fecha.length; 
    var dia; 
    var mes; 
    var ano; 
    if ((long>=2) && (primerslap==false)) { dia=fecha.substr(0,2); 
    if ((IsNumeric(dia)==true) && (dia<=31) && (dia!="00")) { 
      fecha=fecha.substr(0,2)+"-"+fecha.substr(3,7); 
      primerslap=true; } 
    else { 
      fecha=""; primerslap=false;} 
    } 
    else
    {
       dia=fecha.substr(0,1); 
      if (IsNumeric(dia)==false) 
      {
        fecha="";} 
        if ((long<=2) && (primerslap=true)) {fecha=fecha.substr(0,1); primerslap=false; } 
      } 
      if ((long>=5) && (segundoslap==false)) 
      { 
        mes=fecha.substr(3,2); 
        if ((IsNumeric(mes)==true) &&(mes<=12) && (mes!="00")) 
        { 
          fecha=fecha.substr(0,5)+"-"+fecha.substr(6,4); 
          segundoslap=true; 
        } 
        else 
        { 
          fecha=fecha.substr(0,3); segundoslap=false;
        } 
    } 
    else 
    { 
      if ((long<=5) && (segundoslap=true)) 
      { 
        fecha=fecha.substr(0,4); segundoslap=false; 
      } 
    } 
    if (long>=7) 
    { 
      ano=fecha.substr(6,4); 
      if (IsNumeric(ano)==false) 
      { 
        fecha=fecha.substr(0,6); 
      } 
    else 
    { 
      if (long==10){ if ((ano==0) || (ano<1900) || (ano>2100)) { fecha=fecha.substr(0,6); } } } 
    } 
    if (long>=10) 
    { 
      fecha=fecha.substr(0,10); 
      dia=fecha.substr(0,2); 
      mes=fecha.substr(3,2); 
      ano=fecha.substr(6,4); 
    // A?o no viciesto y es febrero y el dia es mayor a 28 
    if ( 
    ((ano%4 != 0) && (mes ==02) && (dia > 28)) || 
    ((mes ==02) && (dia >= 30)) || 
    ((mes ==02) && (dia >= 31)) || 
    ((mes ==04) && (dia >= 31)) || 
    ((mes ==06) && (dia >= 31)) || 
    ((mes =='09') && (dia >= 31)) || 
    ((mes ==11) && (dia >= 31)) 
    )
    { 
      fecha=fecha.substr(0,2)+"-";} 
    } 
    return (fecha); 
} 
//Funcion que se encarga de transformar el formato de una fecha, para compararlo posteriormente...
function validar_fecha_formato(fecha_transformar)
{
  vector_fecha_d = fecha_transformar.split("-");
  var fecha_r = new Date(vector_fecha_d[2],(vector_fecha_d[1]-1),vector_fecha_d[0]);
  return fecha_r; 
}
//--Función que sustituye los &(vocal)acute; por acentos
function remplazar_acentos_acute(cadena1){
  var cadena = "";
  cadena = cadena1.replace("&aacute;","á");
  cadena = cadena.replace("&eacute;","é");
  cadena = cadena.replace("&iacute;","í");
  cadena = cadena.replace("&oacute;","ó");
  cadena = cadena.replace("&uacute;","ú");
  return cadena;
}
//--Funcion que se encarga de limpiar los acentos de un vector
function limpiar_acentos(vector){
  for(i=0;i<vector.length;i++){
        vector[i][0] = remplazar_acentos_acute(vector[i][0]);
  }
}
//--
function comArr(unitsArray) { 
  var outarr = [];
  for (var i = 0; i < unitsArray.length; i++) { 
    outarr[i] = [i, unitsArray[i]];
  }
return outarr;
} 
//--
function correo(campo)
{
  var exr = /^\w+[a-z_0-9\-\.]+@\w+[0-9a-z\-\.]+\.[a-z]{2,4}$/i;
    if(!(exr.test(campo.value)))
    {
      $(campo).val("");
      $(campo).focus();
      notificaciones_material("Debe ingresar un correo electrónico válido","warning")
    }
}
//--
function ytVidId(url) {
  var p = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
  return (url.match(p)) ? RegExp.$1 : false;
}
//--
function formato_tlf(tlf)
{
  //--
  var telefono = tlf.value.substring(0,4);
  var longitud = tlf.value.length;
  var telefono_local = tlf.value.substring(0,2);
  //alert(longitud_local);
  if(((telefono_local!="02")&&(telefono!="0414")&&(telefono!="0416")&&(telefono!="0426")&&(telefono!="0424"))||(longitud!=11))
  {
      tlf.value="";
      //mensaje_alerta("#campo_mensaje","Debe ingresar un n° de tel&eacute;fono v&aacute;lido de 11 d&iacute;gitos, considerando c&oacute;digo de operadora", "alert-danger"); 
      showErrorMessage("Debe ingresar un n° de tel&eacute;fono v&aacute;lido de 11 d&iacute;gitos, considerando c&oacute;digo de operadora");
  }
  //--
}
//Para cerrar modals
function cerrar_mensaje(){
  setTimeout(function()
  {
     $("#cerrar_mensaje").click();
  },2000);
}
//--
//--
//--
function cargar_div_video(material_contenido){
  var previa='<object height="400px" width="80%" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">\
          <param name="movie" value="'+material_contenido+'">\
          <param name="wmode" value="transparent">\
          <embed src="'+material_contenido+'" type="application/x-shockwave-flash" wmode="transparent" height="400" width="80%">\
          </object>';
  $("#preview_material_multimedia").html(previa);
}
//--
function cargar_enlace(){
  var enlace_url=$("#link_video").val();
  var material2=enlace_url.split("=");
  var material="https://www.youtube.com/v/"+material2[1];
  var enlace=ytVidId(material);
  if(enlace==false){
    //mensaje_alerta("#campo_mensaje","<i class='fa fa-exclamation-circle'></i> Enlace de video no valido", "alert-danger");    
    return false;
  }else{
    //--Creo el reproductor...
    player = new YT.Player('player', {
      height: '360',
      width: '640',
      videoId: enlace,
      events: {
        'onReady': onPlayerReady,
        'onStateChange': onPlayerStateChange
      }
    });
    //--
    return enlace;
  }
}

//--
function quitar_preloader_video(){
  $("#campo_mensaje2").removeClass("visible").addClass("invisible");
}
//--
function quitar_video(){
  $(".div_player").html("<div id='player'></div>");
}
//--
function iniciar_datatable(){
 /*"use strict";
  // Init Theme Core    
  Core.init();
  // Init Demo JS  
  Demo.init();*/
  //--
  //--
  $('#datatable2').dataTable().fnDestroy();
  $('#datatable2').dataTable({
    "aoColumnDefs": [{
      'bSortable': false,
      'aTargets': [-1]
    }],
    "oLanguage": {
      "oPaginate": {
        "sPrevious": "",
        "sNext": ""
      }
    },
    "iDisplayLength": 5,
    "aLengthMenu": [
      [5, 10, 25, 50, -1],
      [5, 10, 25, 50, "All"]
    ],
    "sDom": '<"dt-panelmenu clearfix"lfr>t<"dt-panelfooter clearfix"ip>',
  });
  // Add Placeholder text to datatables filter bar
  $('.dataTables_filter input').attr("placeholder", "Ingrese dato a filtrar...");
  /*$(".dataTables_length").attr("style","width: 50%; float: left;");*/
  $(".dataTables_length").attr("style","float: left;");
  $("#datatable2_filter").attr("style","float: right;");
  //$("#datatable2_filter").attr("style","width: 50%; float: left; padding-left:23%;");
}
//---
function iniciar_masonry(){
  $('.grid').masonry({
    // options
    itemSelector: '.grid-item',
    columnWidth: 180
  });
}
//--
function cargar_select_mes(){
    var fecha = new Date();
    var mes = fecha.getMonth()+1;//Obtengo el mes actual
    var nombre_mes="";
    var id_mes='';
    var opcion="<option id='mes0' value='0'>--Seleccione un mes--</option>";
    var select_adm ='';
    for(var i=1;i<=mes;i++)
    {
      //--
      switch (i){
        case 1:
          nombre_mes="Enero";
            break;
        case 2:
          nombre_mes="Febrero";
          break;
        case 3:
          nombre_mes="Marzo";
          break;
        case 4:
          nombre_mes="Abril";
          break;
        case 5:
          nombre_mes="Mayo";
          break;
        case 6:
          nombre_mes="Junio";
          break;
        case 7:
          nombre_mes="Julio";
          break;
        case 8:
          nombre_mes="Agosto";
          break;
        case 9:
          nombre_mes="Septiembre";
          break;
        case 10:
          nombre_mes="Octubre";
          break;
        case 11:
          nombre_mes="Noviembre";
          break;
        case 12:
          nombre_mes="Diciembre";
          break;
      }
      //- 
      if(i<10){
        var_mes = "0"+i;
      }else
      {
        var_mes = i;
      }
      opcion+="<option id='"+var_mes+"' value='"+var_mes+"'>"+nombre_mes+"</option>";    
    }
    //--
    select_adm="<select class='form-control' id='select_adm' name='select_adm'>\
            "+opcion+"\
            </select>";
    return(select_adm);
  }
  //---
//--
function calcular_duracion(tci,tco,operacion)
{
    var jhhi=tci.substr(0,2);
    hora = jhhi.split(":");
    if(hora[0]<10){
      jhhi="0"+hora[0];
    }
    //alert("jhhi:"+jhhi);
    var jmmi=tci.substr(3,2);
    //var jssi=tci.substr(6,2);
    //var jffi=tci.substr(9,2);
    var jhho=tco.substr(0,2);
    hora = jhho.split(":");
    if(hora[0]<10){
      jhho="0"+hora[0];
    }
    //alert("jhho:"+jhho);
    var jmmo=tco.substr(3,2);
    //var jsso=tco.substr(6,2);
    //var jffo=tco.substr(9,2);
    var tiempo_final;
    //////////////////////////
    var wholeseconds1 = parseFloat(jhhi * 3600) + parseFloat(jmmi * 60);
    //Bloqueo ffo, ya que no amerita calculo de cuadros
    // var partseconds1 = (jffi / 30);
    var seconds1 = wholeseconds1; //+ partseconds1; //TIME CODE IN (EN SEGUNDOS)

    var wholeseconds2 = parseFloat(jhho * 3600) + parseFloat(jmmo * 60);
    //Bloqueo ffo, ya que no amerita calculo de cuadros
    //var partseconds2 = (jffo / 30);
    var seconds2 = wholeseconds2;//+ partseconds2; //TIME CODE OUT (EN SEGUNDOS)
    if(operacion=="diferencia"){
      result= seconds2 - seconds1;   
    }else if (operacion=="suma"){
      result = seconds2 + seconds1;
      //alert("Este es el resultado de la suma"+result);
    }

    var timecode_resultante= secToTc(result);
    tiempo_final=timecode_resultante[0]+":"+timecode_resultante[1];
    //timecode_resultante=timecode_resultante.replace(",",":");
    return tiempo_final;
}
//--
function secToTc(seconds)
{
  var tc= new Array();
  tc[0] = "00";
  tc[1] = "00";
  //tc[2] = "00";
  //tc[3] = "00";
  seconds=seconds.toPrecision(8);
  var partseconds= Math.fmod(seconds, 1);////////// SEGUNDOS EN DECIMALES->
  var wholeseconds= seconds; //- partseconds; // SEGUNDOS ENTEROS
  var valor_s=seconds+"-"+partseconds;
  //alert(valor_s);
  // CUADROS//////////////////////////////////
  tc[3]= Math.round( partseconds * 30 );
  //alert(partseconds);
  ////////////////////////////////////////////
  // HORAS////////////////////////////////////
  tc[0]= Math.floor( wholeseconds / 3600 );
  var minsec= (wholeseconds - (tc[0] * 3600));
  ////////////////////////////////////////////
  // MINUTOS
  tc[1]= Math.floor( minsec / 60 );
  ////////////////////////////////////////////
  // SEGUNDOS
  tc[2]= Math.round( minsec - (tc[1] * 60) );
  ///////////////////////////////////////////
//  Luego de transformar a hh:mm:ss:ff se debe validar si el vector tc supera el margen del registro en cada caso
  /*//caso1: si ff>29
  if(tc[3]>29){tc[3]=tc[3]-30;tc[2]=tc[2]+1;}
  //caso2: si ss>59
  if(tc[2]>59){tc[2]=tc[2]-60;tc[1]=tc[1]+1;}
  //caso3: si mm>59
  if(tc[1]>59){tc[1]=tc[1]-60;tc[0]=tc[0]+1;}
*/
  ///////////////////////////////////////////
  for(var co in tc)
  {
    if (tc[co] > 0 && tc[co] < 10) tc[co]= "0"+tc[co];
    if (tc[co]=="0") tc[co]= "00";
  }  
  return tc;
  //////////////////////////////////////////

}
//--
Math.fmod = function (a,b) { return Number((a - (Math.floor(a / b) * b)).toPrecision(8)); };
//---
//--Configuracion de notificaciones
 // A "stack" controls the direction and position
    // of a notification. Here we create an array w
    // with several custom stacks that we use later
    var Stacks = {
      stack_top_right: {
        "dir1": "down",
        "dir2": "left",
        "push": "top",
        "spacing1": 10,
        "spacing2": 10
      },
      stack_top_left: {
        "dir1": "down",
        "dir2": "right",
        "push": "top",
        "spacing1": 10,
        "spacing2": 10
      },
      stack_bottom_left: {
        "dir1": "right",
        "dir2": "up",
        "push": "top",
        "spacing1": 10,
        "spacing2": 10
      },
      stack_bottom_right: {
        "dir1": "left",
        "dir2": "up",
        "push": "top",
        "spacing1": 10,
        "spacing2": 10
      },
      stack_bar_top: {
        "dir1": "down",
        "dir2": "right",
        "push": "top",
        "spacing1": 0,
        "spacing2": 0
      },
      stack_bar_bottom: {
        "dir1": "up",
        "dir2": "right",
        "spacing1": 0,
        "spacing2": 0
      },
      stack_context: {
        "dir1": "down",
        "dir2": "left",
        "context": $("#stack-context")
      },
    }
    // We modify the width option if the selected stack is a fullwidth style
    function findWidth(noteStack) {
        if (noteStack == "stack_bar_top") {
          return "100%";
        }
        if (noteStack == "stack_bar_bottom") {
          return "70%";
        } else {
          return "290px";
        }
    }
    // PNotify Plugin Event Init
    function pnoty(noteStyle,noteShadow,noteOpacity,noteStack,titulo,texto, icon) {
      var width = "290px";
      // If notification stack or opacity is not defined set a default
      noteStack = noteStack ? noteStack : "stack_top_right";
      noteOpacity = noteOpacity ? noteOpacity : "1";

      // Create new Notification
      new PNotify({
        title: titulo,
        text: texto,
        icon: icon,
        shadow: noteShadow,
        opacity: noteOpacity,
        addclass: noteStack,
        type: noteStyle,
        stack: Stacks[noteStack],
        width: findWidth(noteStack),
        delay: 3400
      });

    }
//---Mensaje de error
function carga_pnoty_danger(titulo,texto){
  var icon = 'fa fa-exclamation-circle';
  pnoty("danger","true","","stack_top_right",titulo,texto, icon);
}
//--Mensaje success
function carga_pnoty_success(titulo,texto){
  var icon = 'fa fa-check-circle';
  pnoty("success","true","","stack_top_right",titulo,texto,icon);
}
//--Mensaje info
function carga_pnoty_info(titulo,texto){
  var icon = 'fa fa-info-circle';
  pnoty("info","true","","stack_top_right",titulo,texto,icon);
}
//---Subir al top de la pagina
function subir_top(){
  $('body,html').animate({scrollTop : 0}, 500);
}
//---para uploader de la página
function uploader_reg(campo,campos_bloquear)
{
  $(campo).css({"display":"block"});
  $(campo).removeClass("alert alert-danger").removeClass("alert alert-success").addClass("alert alert-info mensaje_load");
  $(campo).html("");
  $(campo).html("<i class='fa fa-spinner fa-pulse'></i> Por favor espere unos segundos mientras se ejecuta el proceso");
  if(campos_bloquear!="")
  {
      bloquear_pantalla(campos_bloquear);
  }
}
//--Bloqueo campos de la pantalla
function bloquear_pantalla(campos)
{
  $(campos).attr("disabled","disabled");
}
//--Debloqueo de campos de la pantalla
function desbloquear_pantalla(campo_mensaje,campos)
{
  $(campos).prop("disabled",false);
  $(campo_mensaje).html("");
  $(campo_mensaje).removeClass("alert alert-info").removeClass("alert alert-danger").removeClass("alert alert-success mensaje_load");
}

//--Para iniciar trumbowyg
function iniciar_trumbowyg(){
  /*setTimeout(function(){
    $(caja).trumbowyg();
    alert("Caja:"+caja);
  },2000);*/
}
//--
function ng_no_back_button(){
}
//--
function messenger_confirm(mensaje){
  msg = Messenger().post({
    message: mensaje,
    actions: {
      retry: {
        label: 'Aceptar',
        phrase: '',
        auto: true,
        delay: 10,
        action: function() {
          return "1";
        }
      },
      cancel: {
        action: function() {
          return msg.cancel();
        }
      }
    }
  });
}
//--
function cargar_preload(){
  //cargar_ventana();
  Pace.restart();

}
//--
function cargar_drag(){
  $('#external-events .fc-event').each(function() {
    // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
    // it doesn't need to have a start or end
    var paciente = $.trim($(this).text())
    //var id = paciente.substr(2,1)
    var super_vector = paciente.split("|")
    var super_id = super_vector[1].split("#")
    var id = super_id[1]
    var eventObject = {
        title: $.trim($(this).text()), // use the element's text as the event title
        id:id
    };

    // store the Event Object in the DOM element so we can get to it later
    $(this).data('eventObject', eventObject);

    // make the event draggable using jQuery UI
    $(this).draggable({
        zIndex: 999,
        revert: true, // will cause the event to go back to its
        revertDuration: 0 //  original position after the drag
    });

  });
}
//--
function prueba_calendar(id){
  var item = $("#calendar").fullCalendar( 'clientEvents', id );
  console.log(item[0].title);
  //alert("Id"+id+"-"+item[0].title);
  //item[0].title =  "Que onda chavalesss!"
  //item.status = 'checked out';
  //$('#calendar').fullCalendar('updateEvent',item[0]);
}
//-------------------------------------------------------------------------------------
//Bloque de youtube....
// 2. This code loads the IFrame Player API code asynchronously.
var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// 3. This function creates an <iframe> (and YouTube player)
//    after the API code downloads.
function onYouTubeIframeAPIReady(enlace) {
  /*player = new YT.Player('player', {
    height: '360',
    width: '640',
    videoId: 'mEhBztupdaA',
    events: {
      'onReady': onPlayerReady,
      'onStateChange': onPlayerStateChange
    }
  });*/
}

// 4. The API will call this function when the video player is ready.
function onPlayerReady(event) {
  event.target.playVideo();
}

// 5. The API calls this function when the player's state changes.
//    The function indicates that when playing a video (state=1),
//    the player should play for six seconds and then stop.
var done = false;
//--------------------------------------------------------------------------------------
function stopVideo() {
  player.stopVideo();
}
//--------------------------------------------------------------------------------------
function onPlayerStateChange(event) {
  if (event.data == YT.PlayerState.PLAYING && !done) {
    setTimeout(stopVideo, 6000);
    done = true;
  }
}
//-------------------------------------------------------------------------------------
function estructurar_fecha(fecha){
  alert("Fecha al ingresar:"+fecha);
  //alert("Fecha:"+fecha)
  //alert("Fecha get date"+fecha.getDate())
  var mes_ant = (fecha.getMonth()+1)
  var mes = ""
  var dia_ant = fecha.getDate()
  var dia = ""
  alert(fecha.getDate());
  mes_ant = parseInt(mes_ant);

  if (mes_ant<10){
      mes = "0"+mes_ant
  }else{
      mes = mes_ant
  }
  if (dia_ant<10){
      dia = "0"+dia_ant
  }else{
      dia = dia_ant
  }
  fecha = dia+'-'+mes+'-'+fecha.getFullYear()
  //alert("Fecha al retornar"+fecha);
  return fecha
}
//-------------------------------------------------------------------------------------
function estructurar_fecha2(fecha){
  fecha = fecha.substr(8,2)+"-"+fecha.substr(5,2)+"-"+fecha.substr(0,4)
  return fecha
}
//-------------------------------------------------------------------------------------
//--
/*function cerrar_sesion(){
  var data = "";
  $.ajax({
            url:"",
            type:"POST",
            cache:false,
            data:data,
            error:function(resp){
              showErrorMessage("Ocurrió un error inesperado");
            },
            success:function(resp){
              alert(resp);

            }
  });
}*/
//--
function cargar_calendario(){
//---------------------------------------------------------------------------------------------------  
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay'
                },
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                droppable: true, // this allows things to be dropped onto the calendar !!!
                drop: function(date, allDay) { // this function is called when something is dropped
                    // retrieve the dropped element's stored Event Object
                    var originalEventObject = $(this).data('eventObject');
                    // we need to copy it, so that multiple events don't have a reference to the same object
                    var copiedEventObject = $.extend({}, originalEventObject);
                    // assign it the date that was reported
                    copiedEventObject.start = date;
                    copiedEventObject.allDay = allDay;
                    //--
                    var options = { year: 'numeric', month: 'numeric', day: 'numeric' };
                    //---------------------------------------------------------------------
                    var fecha = new Date(date);
                    var fecha_def = estructurar_fecha(fecha);
                    console.log(copiedEventObject)
                    //---------------------------------------------------------------------
                    $("#modal_agenda").modal("show");
                    $("#nombre_paciente").val(copiedEventObject.title);
                    $("#dia_cita_paciente").val(fecha_def);
                    //--
                    // render the event on the calendar
                    // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                    $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
                    $(this).remove();
                    // is the "remove after drop" checkbox checked?
                    /* if ($('#drop-remove').is(':checked')) {
                        // if so, remove the element from the "Draggable Events" list
                        $(this).remove();
                        //--
                    }*/
                    //
                },
                eventDragStart: function (event, jsEvent, ui, view) {
                    alert("Aquí debería de borrar!");
                },
                eventDragStop: function (event, jsEvent, ui, view) {
                    //---
                    //---
                },
                eventDrop: function(event, delta, revertFunc) {
                    var fecha = new Date(event.start.format());
                    var fecha_def = estructurar_fecha(fecha);
                    console.log(event);
                    $("#modal_agenda").modal("show");
                    $("#nombre_paciente").val(event.title);
                    $("#dia_cita_paciente").val(fecha_def);
                }/*,   
                events: [{
                    title: 'All Day Event',
                    start: new Date(y, m, 1)
                }/*, {
                    title: 'Long Event',
                    start: new Date(y, m, d - 5),
                    end: new Date(y, m, d - 2)
                }, {
                    id: 999,
                    title: 'Repeating Event',
                    start: new Date(y, m, d - 3, 16, 0),
                    allDay: false
                }, {
                    id: 999,
                    title: 'Repeating Event',
                    start: new Date(y, m, d + 4, 16, 0),
                    allDay: false
                }, {
                    title: 'Meeting',
                    start: new Date(y, m, d, 10, 30),
                    allDay: false
                }, {
                    title: 'Lunch',
                    start: new Date(y, m, d, 12, 0),
                    end: new Date(y, m, d, 14, 0),
                    allDay: false
                }, {
                    title: 'Conference',
                    start: new Date(y, m, d + 1, 19, 0),
                    end: new Date(y, m, d + 1, 22, 30),
                    allDay: false
                }, {
                    title: 'Staff Meeting',
                    start: new Date(y, m, 28),
                    end: new Date(y, m, 29),
                    url: 'http://google.com/'
                }]*/    
            });
//-------------------------------------------------------------------------------
}
//--
ng_no_back_button();
//---
/*function cargar_ventana(){
//---
  $(window).load(function() {
      $('#preloader').fadeOut('slow');
      $('body').css({'overflow':'visible'});
  })
//---
}*/
function mostrar_preload(){
  alert("iniciar-preloader")
  $('#cuerpo_preloader').css({"display":"block"})
  $('#super_form').css({"display":"none"})
}
function quitar_preload(){
  $('#super_form').css({"display":"block"})
  $('#cuerpo_preloader').css({"display":"none"})
}
//---
//Bootstrap notify
function notificaciones_material(mensaje,tipo){
  $.notify(mensaje,{ 
      type:tipo,
      animate: {
        enter: 'animated bounceIn',
        exit: 'animated bounceOut'
      } 
  })
}
//--Preloader notify
function notificaciones_preloader(){
  var notify = $.notify('<i class="fa fa-spinner fa-spin fa-fw"></i> <strong>Procesando</strong> Espere unos segundos por favor...', {
    type: 'info',
    allow_dismiss: true,
    showProgressbar: false,
    timer:0,
    animate: {
      enter: 'animated bounceIn',
      exit: 'animated bounceOut'
    }

  });
} 
//--
function fin_preloader_sm(){
  setTimeout(function(){$(".close").click();},3000) 
}
//--
function fin_preloader(){
  setTimeout(function(){$(".close").click();notificaciones_material('Proceso realizado de manera exitosa','success')},3000) 
}
function fin_preloader_guardar(mensaje,tipo){
  setTimeout(function(){$(".close").click();notificaciones_material(mensaje,tipo)},100) 
}
function archivo(evt) {

  var files = evt.target.files; // FileList object
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
        $("#previa").css("display","none");
        $("#list").css("display","block");
        $("#list").html("");
        $("#list").append(['<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 divbiblioteca"><img class="imgbiblioteca_principal" style="" src="', e.target.result,'" title="', escape(theFile.name), '"/></div>'].join('')).fadeIn("slow");
        $("#cuerpo_preview_img").removeClass("hidden");
       };
       })(f);

       reader.readAsDataURL(f);
       }
}