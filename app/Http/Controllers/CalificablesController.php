<?php

namespace App\Http\Controllers;

use App\Models\Calificable;
use Illuminate\Http\Request;
use DB;

class CalificablesController extends Controller
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
     * @param  \App\Models\Calificable  $calificable
     * @return \Illuminate\Http\Response
     */
    public function show(Calificable $calificable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calificable  $calificable
     * @return \Illuminate\Http\Response
     */
    public function edit(Calificable $calificable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Calificable  $calificable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

       /* if ($request['modo']=='update'){
            DB::update('UPDATE percentage SET id_course = ? WHERE id_class=?', [$request['curso'], $request['clase']]);
        }
        if ($request['modo']=='crea'){*/
        $exam['exam']=100-($request['rangeInput']);

        DB::update('UPDATE percentage SET continuous_assessment = ?, exams= ? WHERE id_class=?', [$request['rangeInput'], 100-($request['rangeInput']), $request['ider']]);

        //DB::insert('insert into percentage (id_course, id_class, continuous_assessment, exams) values (?, ?, ?, ?)', [0, $request['ider'], $request['rangeInput'], $exam['exam']]);
       /* }*/


        return redirect('/calificables?ider='.$request['ider']);
    }

        //echo ("User Record deleted successfully.");



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calificable  $calificable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calificable $calificable)
    {
        //
    }
}
