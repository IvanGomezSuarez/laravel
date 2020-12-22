<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
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

            //Session::put('isadmin', 'admin');

           return redirect('profesores');
        } else {
            return redirect('dashboard');
        }
        
        return $request->wantsJson()
                    ? response()->json(['two_factor' => false])
                    : redirect()->intended(config('fortify.home'));
    }

}