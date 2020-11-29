<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\_loginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', _loginController::class);

//esta función comentada es la original
/*Route::get('/', function () {
    return view('welcome');
});*/
