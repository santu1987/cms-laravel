<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Empresa;

use App\Idioma;

use App\Estatus;

use App\Image;


class quienesSomosController extends Controller
{
    //
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //--
        return view('templates.cms.quienes_somos.create');
        //--
    }
    //
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        //--
        $empresa = new Empresa($request->all());
        $empresa->objetivo = $request->input('objetivo');
        $empresa->mision = $request->input('mision');
        $empresa->vision = $request->input('vision');
        $empresa->id_imagen = $request->input('id_imagen');
        $empresa->id_idioma = $request->input('id_idioma');
        $empresa->estatus = '1';

        $mensaje = "registro_exitoso";
        
        $empresa->save();

        return response()->json($mensaje);
        //--
    }
//
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function consultarNosotros(Request $request)
    {
        $array_empresa = array();
        $empresas = DB::table('empresa')
                        ->join('images', 'empresa.id_imagen', '=', 'images.id')
                        ->join('idioma', 'empresa.id_idioma', '=', 'idioma.id')
                        ->select('empresa.*', 'images.path', 'idioma.descripcion')
                        ->where('empresa.estatus','!=',3)
                        ->get();
        $a = 0;
        foreach ($empresas as $empresa) {
             $a++;
             $path = "public_cms/".$empresa->path;
             $array_empresa [] = array("numero"=>$a,"id"=>$empresa->id,"objetivo"=>$empresa->objetivo, "mision"=>$empresa->mision,"vision"=>$empresa->vision,"id_imagen"=>$empresa->id_imagen,"idioma_id"=>$empresa->id_idioma,"estatus"=>$empresa->estatus,"imagen"=>$path,"descripcion_idioma"=>$empresa->descripcion);
        }
        return response()->json($array_empresa);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataTableNosotros()
    {
        //
        return view('templates.cms.quienes_somos.datatable_nosotros');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function actualizarEstatusNosotros(Request $request)
    {
        //--
        $id = $request->id;
        $count = Empresa::where('id',$id)->count();
        if($count>0){
            $empresa = Empresa::find($id);
            if($empresa->estatus==1){
                $nuevo_estatus = 2;
            }else{
                $nuevo_estatus = 1;
            }
            $empresa->estatus = $nuevo_estatus;
            $empresa->save();
            $mensaje = "cambio_exitoso";
        }else{
            $mensaje = "no_existe";
        }
        return response()->json($mensaje);
        //--    
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function actualizarNosotros(Request $request)
    {
         //--
        $id = $request->id;
        $empresa = Empresa::find($id);
        $empresa->objetivo = $request->objetivo;
        $empresa->mision = $request->mision;
        $empresa->vision = $request->vision;
        $empresa->id_imagen = $request->id_imagen;
        $empresa->id_idioma = $request->id_idioma;
        $empresa->estatus = $request->estatus;

        $count = Empresa::where('id',$empresa->id)->count();
        if($count==0){
            $mensaje = "no_existe";        
        }else{
            $empresa->save();
            $mensaje = "actualizacion_exitosa";
        }            
        return response()->json($mensaje);
        //--
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function eliminarNosotros(Request $request)
    {
         //--
        $id = $request->id;
        $empresa = Empresa::find($id);

        $count = Empresa::where('id',$empresa->id)->count();
        if($count==0){
            $mensaje = "no_existe";        
        }else{
            $empresa->estatus = 3;
            $empresa->save();
            $mensaje = "cambio_exitoso";
        }            
        return response()->json($mensaje);
        //--
    }
}
