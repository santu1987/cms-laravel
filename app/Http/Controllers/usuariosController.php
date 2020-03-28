<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Estatus;

use App\Http\Requests\UserRequest;
use Hash;

class usuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$users = User::all();
        return view('admin.users.index')->with('users',$users);*/
        //Retorno la vista...
        return view('templates.cms.usuarios.index');
    }
    /**
     * Consulta vía ajax que retorna arreglo jso
    **/
    public function getConsulta(){
        $array_users = array();
        $users = User::all();
        foreach ($users as $user)  {
            $array_users [] =array("id"=>$user->id,"name"=>$user->name,"email"=>$user->email,"type"=>$user->type,"estatus_id"=>$user->estatus_id);
        }
        return response()->json($array_users);
    } 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('templates.cms.usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $user = new User($request->all());
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->type= $request->input('type');
        $user->password = $request->input('password');
        #Consulto si existe un registro con ese correo
        //$count = User::find($user->email)->count();
        $count = User::where('email',$user->email)->count();
        $mensaje = ($count>0)?"existe_correo":"registro_exitoso";
        if($count==0){
            //$estatus = Estatus::find("1");
            //$user->estatus_id = $estatus->id;
            $user->estatus_id = 1;
            $user->save();
        }
        return response()->json($mensaje);
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
        //---
        $user = User::find($id);
        #dd($user);
        return view('templates.cms.usuarios.edit')->with('user',$user);
        //---
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizarUser(Request $request)
    {
        //--
        $id = $request->id;
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type= $request->type;
        $user->password = $request->password;
        //$user->password = Hash::make($request->password);
        #Consulto si existe un registro con ese correo
        //$count = User::find($user->email)->count();
        $count = User::where('email',$user->email)->where('id','!=',$user->id)->count();
        if($count>0){
            $mensaje = "existe_correo";        
        }else{
            $user->save();
            $mensaje = "actualizacion_exitosa";
        }            
        return response()->json($mensaje);
        //--
    }
    /**
     *
     *
     */
    public function actualizarEstatusUser(Request $request){
        //--
        $id = $request->id;
        $count = User::where('id',$id)->count();
        if($count>0){
            $user = User::find($id);
            if($user->estatus_id==1){
                $nuevo_estatus = 2;
            }else{
                $nuevo_estatus = 1;
            }
            $user->estatus_id = $nuevo_estatus;
            $user->save();
            $mensaje = "cambio_exitoso";
        }else{
            $mensaje = "no_existe";
        }
        return response()->json($mensaje);
        //--    
    }
    /**
     *
     *
     */
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
