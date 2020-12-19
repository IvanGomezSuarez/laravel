<?php

namespace App\Http\Controllers;

use App\Models\Adminmatriculas;
use Illuminate\Http\Request;
use DB;

class AdminmatriculasController extends Controller
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

        DB::insert('insert into enrollment (id_student, id_course, status) values (?, ?, ?)', [$request['alumno'], $request['curso'], 0 ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Adminmatriculas  $adminmatriculas
     * @return \Illuminate\Http\Response
     */
    public function show(Adminmatriculas $adminmatriculas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Adminmatriculas  $adminmatriculas
     * @return \Illuminate\Http\Response
     */
    public function edit(Adminmatriculas $adminmatriculas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Adminmatriculas  $adminmatriculas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adminmatriculas $adminmatriculas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Adminmatriculas  $adminmatriculas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::delete('DELETE FROM enrollment WHERE id_student = ?', [$request['asignacion']]);
        echo ("User Record deleted successfully.");
        return back();

    }
}
