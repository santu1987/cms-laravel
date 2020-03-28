<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('templates.cms.categorias.index');
    }
    /**
     * Consulta vía ajax que retorna arreglo json
    **/
    public function consultarCategorias(){
        $array_categories = array();
        $categories = Category::all();
        foreach ($categories as $category) {
            $array_categories [] = array("id"=>$category->id,"name"=>$category->name, "estatus_id"=>$category->estatus_id);
        }
        //var_dump($array_categories);
        return response()->json($array_categories);
    } 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('templates.cms.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardarCategoria(Request $request)
    {
        //--
        $category = new Category($request->all());
        $category->name = $request->input('name');
        $count = Category::where('name',$category->name)->count();
        $category->estatus_id =1;
        $mensaje = ($count>0)?"existe":"registro_exitoso";
        if($count==0){
            $category->save();
        }
        return response()->json($mensaje);
        //--
    }
    /**
    *
    *
    **/
    public function actualizarCategoria(Request $request){
        //--
        $id = $request->id;
        $category = $category = Category::find($id);
        $category->name = $request->name;
        $category->estatus_id= "1";
        #Consulto si existe un registro con ese correo
        //$count = User::find($user->email)->count();
        $count = Category::where('name',$category->name)->where('id','!=',$category->id)->count();
        if($count>0){
            $mensaje = "existe";        
        }else{
            $category->save();
            $mensaje = "actualizacion_exitosa";
        }            
        return response()->json($mensaje);
        //--
    }
    /**
     *
     *
    **/
    public function actualizarEstatusCategorias(Request $request){
        $id = $request->id;
        $count = Category::where('id',$id)->count();
        if($count>0){
            $category = Category::find($id);
            if($category->estatus_id==1){
                $nuevo_estatus = 2;
            }else{
                $nuevo_estatus = 1;
            }
            $category->estatus_id = $nuevo_estatus;
            $category->save();
            $mensaje = "cambio_exitoso";
        }else{
            $mensaje = "no_existe";
        }
        return response()->json($mensaje);
        //--
    }
}