<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{

    public function toResponse($request)
    {

        // below is the existing response
        // replace this with your own code
        // the user can be located with Auth facade
        $role = Auth::user()->role;
        $checkrole = explode(',', $role);  // However you get role

        if (in_array('admin', $checkrole)) {

            Session::put('role', 'admin');

           return redirect('dashboard');
        } else if (in_array('teacher', $checkrole)) {

            Session::put('role', 'teacher');

           return redirect('docente');
        } else {
            Session::put('role', 'student');
            return redirect('studwelcome');
        }

        return $request->wantsJson()
                    ? response()->json(['two_factor' => false])
                    : redirect()->intended(config('fortify.home'));
    }

}
