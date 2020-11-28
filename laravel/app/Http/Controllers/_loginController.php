<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class _loginController extends Controller
{
    public function __invoke()
    {
        return view('_loginView');
    }
}
