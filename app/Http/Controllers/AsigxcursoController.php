<?php

namespace App\Http\Controllers;

use App\Models\Asigxcurso;
use Illuminate\Http\Request;
use DB;

class AsigxcursoController extends Controller
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
     * @param  \App\Models\Asigxcurso  $asigxcurso
     * @return \Illuminate\Http\Response
     */
    public function show(Asigxcurso $asigxcurso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asigxcurso  $asigxcurso
     * @return \Illuminate\Http\Response
     */
    public function edit(Asigxcurso $asigxcurso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asigxcurso  $asigxcurso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        DB::update('UPDATE class SET id_course = ? WHERE id_class=?', [$request['curso'], $request['clase']]);

        DB::update('UPDATE percentage SET id_course = ? WHERE id_class=?', [$request['curso'], $request['clase']]);

        return redirect('/asigxcurso?curso='.$request['clase'].'&clase='.$request['curso']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asigxcurso  $asigxcurso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $arr = explode('|', $request['asignacion']);
        if (count($arr) == 2){

            $id_clase = intval(trim($arr[0]));
            $id_course = 0;

        }
       // DB::update('UPDATE class SET name = ?, color = ? WHERE id_class=?', [$request['name'], $request['color'],$request['id'] ]);

        DB::table('class')
            ->where('id_class',$id_clase)
            ->update(['id_course' => $id_course]);




        return back();
    }
}
