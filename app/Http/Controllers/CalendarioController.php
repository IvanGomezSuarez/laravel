<?php

namespace App\Http\Controllers;

use App\Models\Calendario;
use Illuminate\Http\Request;
use DB;


class CalendarioController extends Controller
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
        DB::insert('insert into schedule (id_class, time_start, time_end,day) values (?, ?, ?, ?)', [$request['id_class'], $request['time_start'], $request['time_end'], $request['day'] ]);
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
        DB::insert('insert into schedule (id_class, time_start, time_end,day) values (?, ?, ?, ?)', [$request['ider'], $request['time_start'], $request['time_end'], $request['day'] ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Calendario  $calendario
     * @return \Illuminate\Http\Response
     */
    public function show(Calendario $calendario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calendario  $calendario
     * @return \Illuminate\Http\Response
     */
    public function edit(Calendario $calendario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Calendario  $calendario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calendario $calendario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calendario  $calendario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::delete('DELETE FROM schedule WHERE id_schedule = ?', [$request['erasethis']]);
        echo ("User Record deleted successfully.");
        return back();
    }
}
