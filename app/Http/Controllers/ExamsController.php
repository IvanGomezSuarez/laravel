<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;
use DB;


class ExamsController extends Controller
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


        DB::insert('insert into exams (id_class, id_student, name, mark, id_t_exam) values (?, ?, ?, ?,?)', [$request['asignatura'], $request['alumno'], $request['name'], $request['nota'], $request['id_t_exam'] ]);
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
        DB::insert('insert into exams (id_class,  time_end,day) values (?, ?, ?, ?)', [$request['id_class'], $request['time_start'], $request['time_end'], $request['day'] ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      // return $request;
        ///DB::insert('insert into exams (id_class, id_student, name, mark, id_t_exam) values (?, ?, ?, ?,?)', [$request['asignatura'], $request['alumno'], $request['name'], $request['nota'], $request['id_t_exam'] ]);
        DB::update('UPDATE exams SET id_class = ?, id_student = ?, name=?, mark=?, id_t_exam=? WHERE id_exam=?', [$request['asignatura'], $request['alumno'], $request['name'],$request['nota'], $request['id_t_exam'],$request['id_exam'] ]);


        return back();    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        //
    }
}
