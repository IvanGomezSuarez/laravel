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

        /*creamos ficha t_exam o t_work*/
        if ($request['examen']=='Crear'){
       // DB::insert('insert into t_exam (name,id_class) values (?, ?)', [$request['name'], $request['id_class']]);

        $id = DB::table('t_exam')-> insertGetId(array(
                'name' => $request['name'],
                'id_class' => $request['id_class']
            ));
        DB::insert('insert into schedule (id_class, time_start, time_end, day, id_t_exam) values (?, ?, ?, ?, ?)', [$request['id_class'], $request['time_start'], $request['time_end'], $request['day'], $id ]);


        return back();

        }

        if ($request['work']=='Crear'){
            $id = DB::table('t_work')-> insertGetId(array(
                'name' => $request['name'],
                'id_class' => $request['id_class']
            ));
            DB::insert('insert into schedule (id_class, time_start, time_end, day, id_t_work) values (?, ?, ?, ?, ?)', [$request['id_class'], $request['time_start'], $request['time_end'], $request['day'], $id ]);


            return back();
        }



        /* creamos evento schedule de exam o weork*/
      //  DB::insert('insert into schedule (id_class, time_start, time_end, day, id_t_wok, id_t_exam) values (?, ?, ?, ?, ?, ?)', [$request['i_class'], $request['time_start'], $request['time_end'], $request['day'] ]);
        //return back();
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

        return back();
    }
}
