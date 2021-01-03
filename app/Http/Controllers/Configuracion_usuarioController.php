<?php

namespace App\Http\Controllers;

use App\Models\Configuracion_usuario;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;


class Configuracion_usuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

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
     * @param  \App\Models\Configuracion_usuario  $configuracion_usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Configuracion_usuario $configuracion_usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Configuracion_usuario  $configuracion_usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Configuracion_usuario $configuracion_usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Configuracion_usuario  $configuracion_usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {



          if ($request['password']!=$request['passwordcmp']){

            if ( Session::get('role') == 'teacher'){
              // return $request;
                DB::update('UPDATE teachers SET name = ?, email = ?, password = ? WHERE id_teacher = ?', [$request['name'], $request['username'],$request['password'],$request['id'] ]);
                Session::put('username', $request['email']);
                Session::put('name', $request['name']);
                Session::put('email', $request['username']);

                Session::put('pass', $request['password']);
                return redirect('/configuracion_usuario');


            }
            if ( Session::get('role') == 'student'){
                //return $request;

                DB::update('UPDATE students SET username = ?, pass = ?, email = ?, name = ? WHERE id = ?', [$request['username'], $request['password'],$request['email'],$request['name'],$request['id'] ]);
                Session::put('username', $request['username']);
                Session::put('name', $request['name']);
                Session::put('email', $request['email']);
                Session::put('pass', $request['password']);
                return redirect('/configuracion_usuario');


            }
            if ( Session::get('role') == 'admin'){

                //return $request;
                 DB::update('UPDATE users_admin SET username = ?, name = ?, email = ?, password = ? WHERE id_user_admin = ?', [$request['username'], $request['name'],$request['email'],$request['password'],$request['id'] ]);
                Session::put('username', $request['username']);
                Session::put('name', $request['name']);
                Session::put('email', $request['email']);
                Session::put('pass', $request['password']);




                return redirect('/configuracion_usuario');
            }
              // DB::update('UPDATE users_admin SET user_name = ?, name = ?, email = ?, password = ? WHERE id_user_admin = ?', [$request['name'], $request['color'],$request['id'] ]);






          }
        return redirect('/configuracion_usuario?warning=true&passdsnmatch=true');




        // DB::update('UPDATE users_admin SET user_name = ?, name = ?, email = ?, password = ? WHERE id_user_admin = ?', [$request['name'], $request['color'],$request['id'] ]);
            //echo ("User Record deleted successfully.");
           // return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Configuracion_usuario  $configuracion_usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Configuracion_usuario $configuracion_usuario)
    {
        //
    }
}
