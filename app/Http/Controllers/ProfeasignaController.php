<?php

namespace App\Http\Controllers;

use App\Models\Profeasigna;
use Illuminate\Http\Request;
use DB;


class ProfeasignaController extends Controller
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
     * @param  \App\Models\Profeasigna  $profeasigna
     * @return \Illuminate\Http\Response
     */
    public function show(Profeasigna $profeasigna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profeasigna  $profeasigna
     * @return \Illuminate\Http\Response
     */
    public function edit(Profeasigna $profeasigna)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profeasigna  $profeasigna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

       DB::update('UPDATE class SET id_teacher = ? WHERE id_class=?', [$request['profesor'], $request['clase']]);
       DB::update('UPDATE teachers SET asignado = 1 WHERE id_teacher=?', [$request['profesor']]);

       return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profeasigna  $profeasigna
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        DB::update('UPDATE class SET id_teacher = ? WHERE id_class=?', [$request['profesor'], $request['clase']]);
        DB::update('UPDATE teachers SET asignado = null WHERE id_teacher=?', [$request['profesor']]);

        return back();
    }
}
