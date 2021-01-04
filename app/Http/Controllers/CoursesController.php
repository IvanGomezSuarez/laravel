<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use DB;

class CoursesController extends Controller
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


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Course::create($request->all());

      //  INSERT INTO courses (name, description, date_start, date_end, active) VALUES ('$nombre','$descripcion','$alfadate','$omegadate','$active')
       return back();

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
    public function update(Request $request)
    {

        // return $request;

        if ($request['accion']=='Edita'){
            DB::update('UPDATE courses SET name = ?, description = ?, date_start = ?, date_end = ?, active = ? WHERE id_course=?', [$request['name'], $request['description'], $request['date_start'], $request['date_end'], $request['active'], $request['id'] ]);
           // DB::update($request->all());
            //echo ("User Record deleted successfully.");
            return back();
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request['borra']=='Borra'){
            DB::delete('DELETE FROM courses WHERE id_course = ?', [$request['idcourse']]);
            /* borramos asignaciones del curso borrado en asignaturas */
            DB::update('UPDATE class SET  id_course = 0 WHERE id_course =?', [$request['idcourse']]);


            DB::update('UPDATE percentage SET id_course = 0 WHERE id_course=?', [$request['idcourse']]);


            return back();
        }




    }
}

