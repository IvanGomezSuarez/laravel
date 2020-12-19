<?php

namespace App\Http\Controllers;

use App\Models\Configuracion_usuario;
use Illuminate\Http\Request;
use DB;
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
               return redirect('/configuracion_usuario?warning=true&passdsnmatch=true');
          }

        return $request;



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
