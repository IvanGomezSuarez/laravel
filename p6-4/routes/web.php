<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\AsignaturaController;
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

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/asignaturas', function () {
        return view('asignaturas');
    });

    Route::get('/cursos', function () {
            return view('cursos');
    });

    Route::get('/asigxcurso', function () {
        return view('asigxcurso');
    });

    Route::get('/profesores', function () {
        return view('profesores');
    });

    Route::get('/profeasigna', function () {
        return view('profeasigna');
    });

    Route::get('/adminalumn', function () {
        return view('adminalumn');
    });
    Route::get('/adminmatriculas', function () {
        return view('adminmatriculas');
    });

    Route::get('/configuracion_usuario', function () {
        return view('userconfig');
    });

    Route::get('/calendario', function () {
        return view('calendario');
    });



    Route::post('/asignatura/crea', [AsignaturaController::class, 'store']);
    Route::post('/cursos/crea', [CoursesController::class, 'store']);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/asignaturas', function () {
    return view('asignaturas');
})->name('asignaturas');

Route::middleware(['auth:sanctum', 'verified'])->get('/cursos', function () {
    return view('cursos');
})->name('cursos');

Route::middleware(['auth:sanctum', 'verified'])->get('/profesores', function () {
    return view('profesores');
})->name('profesores');

Route::middleware(['auth:sanctum', 'verified'])->get('/adminalumn', function () {
    return view('adminalumn');
})->name('adminalumn');

Route::middleware(['auth:sanctum', 'verified'])->get('/calendario', function () {
    return view('calendario');
})->name('calendario');

