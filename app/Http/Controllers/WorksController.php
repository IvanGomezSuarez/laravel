<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;
use DB;


class WorksController extends Controller
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
    public function create(Request $request)
    {

        //return $request;
        DB::insert('insert into works (id_class, id_student, name, mark, id_t_work) values (?, ?, ?, ?, ?)', [$request['asignatura'], $request['alumno'], $request['name'], $request['nota'], $request['id_t_work'] ]);
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::insert('insert into works (id_class,  time_end,day) values (?, ?, ?, ?)', [$request['id_class'], $request['time_start'], $request['time_end'], $request['day'] ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit(Work $work)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::update('UPDATE works SET id_class = ?, id_student = ?, name=?, mark=?, id_t_work=? WHERE id_work=?', [$request['asignatura'], $request['alumno'], $request['name'],$request['nota'], $request['id_t_work'],$request['id_work']]);


        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        //
    }
}
