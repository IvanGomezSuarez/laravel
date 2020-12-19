<?php

namespace App\Http\Controllers;

use App\Models\Adminalumn;
use Illuminate\Http\Request;
use DB;

class AdminalumnController extends Controller
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
//return $request;

        Adminalumn::create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Adminalumn  $adminalumn
     * @return \Illuminate\Http\Response
     */
    public function show(Adminalumn $adminalumn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Adminalumn  $adminalumn
     * @return \Illuminate\Http\Response
     */
    public function edit(Adminalumn $adminalumn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Adminalumn  $adminalumn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
            DB::update('UPDATE students SET username = ?, pass = ?, email = ?, name = ?, surname = ?, telephone = ?, nif = ?, date_registered = ? WHERE id = ?', [$request['username'], $request['pass'], $request['email'],$request['name'], $request['surname'], $request['telephone'], $request['nif'], $request['date_registered'], $request['id']]);
            return back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Adminalumn  $adminalumn
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::delete('DELETE FROM students WHERE id = ?', [$request['id-alumns']]);

        return back();
    }

}
