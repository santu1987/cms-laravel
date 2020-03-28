<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryImg;
use App\Image;
use Validator;

class AlbumsController extends Controller
{
    //
    public function create()
    {
        //--
        return view('templates.cms.albums.create');
        //--
    }
    //
    public function getConsultaCategorias(){
        $array_cat = array();
        $categories_img = CategoryImg::all();
        foreach ($categories_img as $cat) {
            $array_cat [] = array("id"=>$cat->id,"content"=>$cat->content);
        }
        return response()->json($array_cat);
    }
    //
    public function cargarImagen(Request $request){
        //Recibo los datos
        $imagen = new Image();
        $imagen->name = $request->nombre;
        $id = $request->categoria;
        //Obtengo el nombre de la categoria
        $categoria = CategoryImg::find($id);
        //--- 
        #Busco si existe una imagen con ese nomnre
        $cuantos_nombres = Image::where('name','like',strtolower($imagen->name))->get()->count();
        if($cuantos_nombres>0){
            $mensaje = "existe_nombre";
        }else{
            //---
            
            $validacion = Validator::make($request->all(),[
                'file'=>'max:2560'///Es el valor maximo
            ]);
            if($validacion->fails()){
              $mensaje = "supera_tamano";  
            }else{
            //--------------------------------------------------------------------------------------------
                //Verifico que existan los directorios
                $ruta = public_path().'/img/archivos/'.$categoria->content."/";
                if(!is_dir(public_path().'/img/archivos/'.$categoria->content."/"))
                {
                    mkdir($ruta, 0777);
                }
                //---
                if($request->file){
                    $file = $request->file;

                    $name = $imagen->name.".".$file->getClientOriginalExtension();
                    $path = $ruta;
                    //dd($path);
                    $file->move($path, $name);
                    $nombre_img = "img/archivos/".$categoria->content."/".$name;
                    $count = Image::where('name',$imagen->name)->count();
                    $mensaje = ($count>0)?"existe":"registro_exitoso";
                    if($count==0){
                       
                        $imagen->path = $nombre_img;
                        $imagen->categories_img_id = $request->categoria;
                        $imagen->estatus = '1';
                        $imagen->save();
                    }
                }else{
                    $mensaje="no_imagen";
                }
            //--------------------------------------------------------------------------------------------    
            }
            //---
        }//fin sino existe el nombre...            
        return response()->json($mensaje);

    }
    //
    public function getConsultaGaleria(Request $request){
        //--
        $id_categoria = $request->id_categoria["id"];
        $arreglo_galeria = array();
        $galeria = Image::where('categories_img_id',$id_categoria)->where('estatus','1')->get();
        foreach ($galeria as $gal) {
           # 
           $arreglo_galeria [] = array ("id"=>$gal->id,"name"=>$gal->name,"path"=>$gal->path);
           #
        }
        return view('templates.cms.partials.carrete')->with('imagenes',$arreglo_galeria);
        //--
    }
    //Funcion para elimar imagenes
    public function eliminar_imagen(Request $request){
        $imagenes = $request->imagenes;
        foreach ($imagenes as $id) {
            #Inactivo c/u de las imagenes...
            $images = Image::find($id);
            $images->estatus = "2";
            $images->save();
            #
        }
        $mensaje = "eliminacion_exitosa";
        return response()->json($mensaje);
    }
    //Funcion para consultar imagenes en otros formularios
    public function consulta_imagenes(Request $request){
        $id_categoria = 4;
        $arreglo_galeria = array();
        $galeria = Image::where('categories_img_id',$id_categoria)->where('estatus','1')->get();
        foreach ($galeria as $gal) {
           # 
           $arreglo_galeria [] = array ("id"=>$gal->id,"name"=>$gal->name,"path"=>$gal->path);
           #
        }
        return view('templates.cms.partials.galeria')->with('imagenes',$arreglo_galeria);
        //return response()->json($arreglo_galeria);

    }
    //Funcion para ver el carrete
    public function ver_imagenes(Request $request){
        $imagen = $request->imagen;
        return view('templates.cms.partials.carrete_individual')->with('imagen',$imagen);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        //
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
