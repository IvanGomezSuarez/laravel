<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;


class loginViewController extends Controller
{
    public function show(Request $request)
    {


        $studs =  DB::select('select * from students' );

        foreach ($studs as $stud){

            if ( ($stud->username == $request['user']) &&($stud->pass == $request['pass'])){
                Session::put('id_user', $stud->id);
                Session::put('email', $stud->email);
                Session::put('name', $stud->name);
                Session::put('username', $stud->username);
                Session::put('pass', $stud->pass);
                Session::put('surname', $stud->surname);
                Session::put('telephone', $stud->telephone);
                Session::put('nif', $stud->nif);
                Session::put('date_registered', $stud->date_registered);
                Session::put('role','student');
            }
        }
        if (Session::get('role')=='student'){
            return redirect('/welcome/?stud');
        }

        $teachers = DB::select('select * from teachers' );

        foreach ($teachers as $teacher){
            if ( ($teacher->email == $request['user'])&&($teacher->password == $request['pass'])){
                Session::put('id_user', $teacher->id_teacher);
                Session::put('email', $teacher->email);
                Session::put('username', $teacher->email);
                Session::put('pass', $teacher->password);
                Session::put('name', $teacher->name);
                Session::put('surname', $teacher->surname);
                Session::put('telephone', $teacher->telephone);
                Session::put('nif', $teacher->nif);
                Session::put('role', 'teacher');
            }
        }
        if (Session::get('role')=='teacher'){
            return redirect('/welcome/?teacher');
        }




        $admins = DB::select('select * from users_admin' );

        foreach ($admins as $admin){
            if ( ($admin->username == $request['user']) &&($admin->password == $request['pass'])){
                Session::put('id_user', $admin->id_user_admin);
                Session::put('email', $admin->email);
                Session::put('name', $admin->name);
                Session::put('username', $admin->username);
                Session::put('role', 'admin');
                Session::put('pass', $admin->password);
            }
        }
        if (Session::get('role')=='admin'){
            return redirect('/welcome/?admin');
        }





    }
}
