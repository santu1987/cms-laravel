<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //--
        return view('templates.cms.tags.index');
        //--
    }
    /**
     * Consulta vía ajax que retorna arreglo jso
    **/
    public function getConsulta(){
        $array_tags = array();
        $tags = Tag::all();
        foreach ($tags as $tag) {
            $array_tags [] = array("id"=>$tag->id,"name"=>$tag->name, "estatus_id"=>$tag->estatus_id);
        }
        return response()->json($array_tags);
    } 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('templates.cms.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //--
        $tag = new Tag($request->all());
        $tag->name = $request->input('name');
        $count = Tag::where('name',$tag->name)->count();
        $tag->estatus_id =1;
        $mensaje = ($count>0)?"existe":"registro_exitoso";
        if($count==0){
            $tag->save();
        }
        return response()->json($mensaje);
        //--
    }
    /**
    *
    *
    **/
    public function actualizarTag(Request $request){
        //--
        $id = $request->id;
        $tag = $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->estatus_id= "1";
        #Consulto si existe un registro con ese correo
        //$count = User::find($user->email)->count();
        $count = Tag::where('name',$tag->name)->where('id','!=',$tag->id)->count();
        if($count>0){
            $mensaje = "existe";        
        }else{
            $tag->save();
            $mensaje = "actualizacion_exitosa";
        }            
        return response()->json($mensaje);
        //--
    }
    /**
     *
     *
    **/
    public function actualizarEstatusTag(Request $request){
        $id = $request->id;
        $count = Tag::where('id',$id)->count();
        if($count>0){
            $tag = Tag::find($id);
            if($tag->estatus_id==1){
                $nuevo_estatus = 2;
            }else{
                $nuevo_estatus = 1;
            }
            $tag->estatus_id = $nuevo_estatus;
            $tag->save();
            $mensaje = "cambio_exitoso";
        }else{
            $mensaje = "no_existe";
        }
        return response()->json($mensaje);
        //--
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