<?php
namespace App\Http\Controllers;

use App\Models\Asignatura;
use Illuminate\Http\Request;
use DB;

class AsignaturaController extends Controller
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

        /*CONDICIONAL PARA CREAR */
       $nulo = '0';
       $request->request->add(['id_course'=>$nulo]);
       $request->request->add(['id_schedule'=>$nulo]);
       $id = Asignatura::create($request->all());

      /*asignar valor en percentage */

        DB::insert('insert into percentage (id_course, id_class, continuous_assessment, exams) values (?, ?, ?, ?)', [0, $id->id_class, 50, 50]);
        return back();


        /* CONDICIONAL PARA EDITAR ACTUALIZAR */

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function show(Asignatura $asignatura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignatura $asignatura)
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request['accion']=='Edita'){
            DB::update('UPDATE class SET name = ?, color = ? WHERE id_class=?', [$request['name'], $request['color'],$request['id'] ]);
            //echo ("User Record deleted successfully.");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {




      if ($request['borra']=='Borra'){
         DB::delete('DELETE FROM class WHERE id_class = ?', [$request['borra-id-asigns']]);
         DB::delete('DELETE FROM percentage WHERE id_class = ?', [$request['borra-id-asigns']]);



         return back();
      }
        if ($request['edita']=='Edita'){

        return redirect('/asignaturas?edita=Edita&borra-id-asigns='.$request['borra-id-asigns']);
        }

        /* borrrar referencia en percentage */



    }



}
