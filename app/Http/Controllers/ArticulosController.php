<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

use App\Estatus;

use App\Tag;

use App\Image;

class ArticulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       return view('templates.cms.articulos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //--
        return view('templates.cms.articulos.create');
        //--
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        //---
        $article = new Article($request->all());
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->category_id = $request->input('category_id')['id'];
        //$article->user_id = \Auth::user()->id;
        //--Debo quitarlo cuando desarrolle el inicio de sesion
        $article->user_id = 1;
        //--
        //$article->article_tag = $request->input('articles_tags');
        //--
        $article->estatus_id = $request->input('estatus');
        $article->image = $request->input('imagen')['id'];
        //$article->category_id["id"]
        //return response()->json($article->articles_tags[0]["id"]);
        $article->tag()->sync($request->input('article_tag'));

        $article->save();
        $mensaje["mensaje"] = "registro_exitoso";
        $article_consulta = Article::all();
        $mensaje["id"] = $article_consulta->last();
        return response()->json($mensaje);
        //---
    }
    public function imagen_sector(Request $request){
        //---
        $imagen = $request->imagen;
        return view('templates.cms.partials.sectorimg')->with('imagen',$imagen);
        //---
    } 
    /**
      *
      *
      **/
    public function cargarImagen(Request $request){
        $id = $request->id;
        return response()->json($id);
        /*$article = Article::find($id);
        //---Manipulacion de imagenes
        if($request->file('file')){
            $file = $request->file('file');
            $name = 'blog_'.time().'.'.$file->getClientOriginalExtension();
            $path = public_path().'/img/articles/';
            $file->move($path, $name);
        } 
        //Para guardar la imagen
        $image = new Image();
        $image->name = $name;
        //--Para traer el id del artículo para registrar la imagen
        $image->article()->associate($article);
        $article->save();
        $mensaje = "registro_exitoso";
        return response()->json($mensaje);*/
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
    //--Metodo para realizar consulta
    public function getConsulta(Request $request){
        $articles = Article::all();
        $articles->each(function($articles){
            $articles->category_id;
            $articles->user;
            dd($articles->category_id->name);
        }); 
        
        /*$array_tags = array();
        $articles = Articles::all();
        foreach ($articles as $article) {
            $array_tags [] = array("id"=>$article->id,"tilte"=>$article->title, "content"=>$article->content ,"categoria"=>$article->category_id->name);
        }
        return response()->json($array_tags);*/
    }
}
