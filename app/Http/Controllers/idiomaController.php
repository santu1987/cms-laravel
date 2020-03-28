<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idioma;

class idiomaController extends Controller
{
    //
    /**
     * Consulta vía ajax que retorna arreglo jso
    **/
    public function consulta_idioma(){
        $array_idiomas = array();
        $idiomas = Idioma::all();
        foreach ($idiomas as $idioma) {
            $array_idiomas [] = array("id"=>$idioma->id,"descripcion"=>$idioma->descripcion);
        }
        return response()->json($array_idiomas);
    } 
}
