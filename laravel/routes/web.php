<?php

use App\Http\Controllers\_adminAlumnController;
use App\Http\Controllers\_adminMatriculasController;
use App\Http\Controllers\_asignaturasController;
use App\Http\Controllers\_asigxcursoController;
use App\Http\Controllers\_calendarioController;
use App\Http\Controllers\_cursosController;
use App\Http\Controllers\_graphCalendarController;
use App\Http\Controllers\_indexController;
use App\Http\Controllers\_loginController;
use App\Http\Controllers\_profeAsignaController;
use App\Http\Controllers\_profesoresController;
use App\Http\Controllers\_registerController;
use App\Http\Controllers\_studAsignaturasController;
use App\Http\Controllers\_studCalendarioController;
use App\Http\Controllers\_studConfigController;
use App\Http\Controllers\_studCursosController;
use App\Http\Controllers\_studentAdminController;
use App\Http\Controllers\_studWelcomeController;
use App\Http\Controllers\_userConfigController;
use App\Http\Controllers\_welcomeController;
use Illuminate\Support\Facades\Route;

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

/*Route::get('/', _welcomeController::class);
Route::get('/', _adminAlumnController::class);
Route::get('/', _adminMatriculasController::class);
Route::get('/', _asigxcursoController::class);
Route::get('/', _asignaturasController::class);
Route::get('/', _calendarioController::class);
Route::get('/', _cursosController::class);
Route::get('/', _graphCalendarController::class);
Route::get('/', _indexController::class);*/
Route::get('/', _loginController::class);
/*Route::get('/', _profesoresController::class);
Route::get('/', _profeAsignaController::class);
Route::get('/', _registerController::class);
Route::get('/', _studAsignaturasController::class);
Route::get('/', _studCalendarioController::class);
Route::get('/', _studConfigController::class);
Route::get('/', _studCursosController::class);
Route::get('/', _studWelcomeController::class);
Route::get('/', _studentAdminController::class);
Route::get('/', _userConfigController::class);*/





