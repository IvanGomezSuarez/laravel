<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\AsigxcursoController;
use App\Http\Controllers\ProfesoresController;
use App\Http\Controllers\ProfeasignaController;
use App\Http\Controllers\AdminalumnController;
use App\Http\Controllers\AdminmatriculasController;
use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\Configuracion_usuarioController;
use App\Http\Controllers\CalificablesController;
    use App\Http\Controllers\ExamsController;
    use App\Http\Controllers\WorksController;
use App\Http\Controllers\EmailController;

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

    Route::get('dashboard', function () {
        return view('dashboard');
    });

    Route::get('/asignaturas', function () {
    return view('asignaturas');
    });

    Route::get('/docente', function () {
        return view('profeHome');
    });

    Route::get('/asignaturas/edita', function () {
        return view('asignaturas');
    });
    Route::get('/calificables', function () {
        return view('calificables');
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

    Route::get('/evaluacion', function () {
        return view('evaluacion');
    });
    Route::get('/evaluacion-alumno', function () {
        return view('evaluacion');
    });

    Route::get('/configuracion_usuario', function () {
        return view('userconfig');
    });

    Route::get('/calendario', function () {
        return view('calendario');
    });


    /* estudiantes*/
    Route::get('/estudiante', function () {
        return view('studwelcome');
    });
    Route::get('/notas', function () {
        return view('notas-estudiante');
    });

    Route::get('/calendario-estud', function () {
        return view('_studCalendarioView');
    });

    Route::get('/fullcalendar', function () {
        return view('/fullcdalendar/');
    });


    /* profesores*/
    Route::get('/evaluar-alumnos', function () {
        return view('profeEvalua');
    });



    /*ADMIN */
    /* Asignaturas Redirecciones de formularios asignatura */
    Route::post('/asignaturas/crea', [AsignaturaController::class, 'store']);
    Route::post('/asignaturas/edita', [AsignaturaController::class, 'destroy']);
    Route::post('/asignaturas/borra', [AsignaturaController::class, 'destroy']);
    Route::post('/asignaturas/update', [AsignaturaController::class, 'update']);

    Route::post('/cursos/crea', [CoursesController::class, 'store']);
    Route::post('/cursos/update', [CoursesController::class, 'update']);
    Route::get('/cursos/borra', [CoursesController::class, 'destroy']);

    Route::post('/asigxcurso/asocia', [AsigxcursoController::class, 'update']);
    Route::post('/asigxcurso/borra', [AsigxcursoController::class, 'destroy']);

    Route::get('/profesores/borra', [ProfesoresController::class, 'destroy']);
    Route::post('/profesores/crea', [ProfesoresController::class, 'store']);
    Route::post('/profesores/update', [ProfesoresController::class, 'update']);

    Route::post('/profeasigna/asigna', [ProfeasignaController::class, 'update']);
    Route::post('/profeasigna/delasigna', [ProfeasignaController::class, 'destroy']);

    Route::get('/profeasigna/asigna', [ProfeasignaController::class, 'update']);
    Route::get('/profeasigna/delasigna', [ProfeasignaController::class, 'destroy']);

    Route::get('/adminalumn/borra', [AdminalumnController::class, 'destroy']);
    Route::get('/adminalumn/crea', [AdminalumnController::class, 'store']);
    Route::get('/adminalumn/update', [AdminalumnController::class, 'update']);

    Route::get('/adminmatriculas/borra', [AdminmatriculasController::class, 'destroy']);
    Route::get('/adminmatriculas/matricular', [AdminmatriculasController::class, 'store']);

    Route::get('/calendario/borra', [CalendarioController::class, 'destroy']);
    Route::get('/calendario/crea', [CalendarioController::class, 'create']);

    Route::get('/configuracion_usuario/update', [Configuracion_usuarioController::class, 'update']);
/* STUDENTS */

    Route::get('/studwelcome/update', [Configuracion_usuarioController::class, 'update']);

    Route::get('/calificables/percent', [CalificablesController::class, 'update']);
    Route::get('/calificables/examen', [CalendarioController::class, 'store']);
    Route::get('/calificables/work', [CalendarioController::class, 'store']);


    Route::get('/ponernota/update', [ExamsController::class, 'update']);
    Route::get('/ponernota/new', [ExamsController::class, 'create']);

    Route::get('/ponernota-work/update', [WorksController::class, 'update']);
    Route::get('/ponernota-work/new', [WorksController::class, 'create']);


    Route::get('/mail', [EmailController::class, 'create']);



    Route::middleware(['auth:sanctum', 'verified'])->get('/s', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/asignaturas', function () {
    return view('asignaturas');
})->name('asignaturas');

Route::middleware(['auth:sanctum', 'verified'])->get('/calificables', function () {
    return view('calificables');
})->name('calificables');

Route::middleware(['auth:sanctum', 'verified'])->get('/cursos', function () {
    return view('cursos');
})->name('cursos');

Route::middleware(['auth:sanctum', 'verified'])->get('/asigxcurso', function () {
    return view('asigxcurso');
})->name('asigxcurso');

Route::middleware(['auth:sanctum', 'verified'])->get('/profesores', function () {
    return view('profesores');
})->name('profesores');

Route::middleware(['auth:sanctum', 'verified'])->get('/profeasigna', function () {
    return view('profeasigna');
})->name('profeasigna');

Route::middleware(['auth:sanctum', 'verified'])->get('/adminalumn', function () {
    return view('adminalumn');
})->name('adminalumn');

Route::middleware(['auth:sanctum', 'verified'])->get('/adminmatriculas', function () {
    return view('adminmatriculas');
})->name('adminmatriculas');

Route::middleware(['auth:sanctum', 'verified'])->get('/evaluacion', function () {
    return view('evaluacion');
})->name('evaluacion');

Route::middleware(['auth:sanctum', 'verified'])->get('/calendario', function () {
    return view('calendario');
})->name('calendario');

Route::middleware(['auth:sanctum', 'verified'])->get('/navbarstudent', function () {
    return view('navbarstudent');
})->name('navbarstudent');

Route::middleware(['auth:sanctum', 'verified'])->get('/navbar', function () {
    return view('navbar');
})->name('navbar');

Route::middleware(['auth:sanctum', 'verified'])->get('/dropdown', function () {
    return view('dropdown');
})->name('dropdown');

Route::middleware(['auth:sanctum', 'verified'])->get('/studwelcome', function () {
    return view('studwelcome');
})->name('studwelcome');


Route::middleware(['auth:sanctum', 'verified'])->get('/calendario-estud', function () {
    return view('_studCalendarioView');
})->name('calendario-estud');

Route::middleware(['auth:sanctum', 'verified'])->get('/notas', function () {
    return view('notas-estudiante');
})->name('notas-estudiante');

Route::middleware(['auth:sanctum', 'verified'])->get('/register', function () {
    return view('register');
})->name('register');
