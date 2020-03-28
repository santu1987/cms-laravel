<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Estatus;
use Auth;
use Hash;


class inicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Retorno la vista
        return view('templates.cms.dashboard');
    }
    /**
    */
    public function getConsultarDatos(Request $request){
        $mensaje = array();

        $count = 0;

        $user = new User($request->all());

        $user->login = $request->input('email');

        $user->clave =  $request->input('password');


        //$count =  User::where('email',$user->login)->where('password',$user->clave)->count();
        $usuarios = User::where('email',$user->login)->get();
                
        foreach ($usuarios as $usuario)  {

            if (Hash::check($user->clave,$usuario->password))
            {
                // The passwords match...
                $count++;
            }

        }

        $mensaje["mensajes"] = ($count>0)?"inicio_exitoso":"datos_errados";

        return response()->json($mensaje);
    }
    /**
    */
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

    public function password_verify($password, $hash) {
        if (!function_exists('crypt')) {
            trigger_error("Crypt must be loaded for password_verify to function", E_USER_WARNING);
            return false;
        }
        $ret = crypt($password, $hash);
        if (!is_string($ret) || strlen($ret) != strlen($hash) || strlen($ret) <= 13) {
            return false;
        }

        $status = 0;
        for ($i = 0; $i < strlen($ret); $i++) {
            $status |= (ord($ret[$i]) ^ ord($hash[$i]));
        }

        return $status === 0;
    }
}
