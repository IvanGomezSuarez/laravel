<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">



<?php
use Illuminate\support\Facades\Request;
use Illuminate\support\Facades\DB;
    $cursos = App\Models\Course::get();
    $cursoId = App\Models\Course::find(Request::get('idcourse'));
    $curso2Id = App\Models\Course::find(Request::get('idcourse'));

    $alumnos = App\Models\Adminalumn::get();
    $alumnId = App\Models\Adminalumn::find(Request::get('id-alumns'));

    $enrollments = App\Models\Enrollment::get();


?>
<br><br>
<div class="container">
    <h3>Matriculación de Alumnos en Cursos</h3>
    <hr>
    <br>
    <div class="row">
        <div class="col-md-12">
            <form class="asignatio" action="" method="get">
                @csrf

                <div class="form-group  editasign">
                    <label for="">Matriculaciones</label>
                    <select size="10" name='asignacion'  class="form-control" id="">
                        @foreach ($enrollments as $enrollment)
                            @foreach ($alumnos as $alumno)
                                @if ( (($enrollment->id_student)==($alumno->id)) &&(($alumno->status)==0) )
                                <option value="{{$alumno->id}}">{{$alumno->name}} {{$alumno->surname}} {{$alumno->nif}} -- <?php $cursox = DB::table('courses')->where('id_course', $enrollment->id_course)->first() ; print_r($cursox->name)?></option>

                                @endif
                            @endforeach
                        @endforeach


                    </select>
                    <br>
                    <button type="submit" formaction="/adminmatriculas/borra" class="btn btn-primary mb-2">Borrar Matrícula</button>
                </div>
            </form>
        </div>

    </div><!--/row -->
    <div class="row">
        <div class="col-md-12 ">
            <form class="asignatio editasign" action="" method="get">
                @csrf

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="">Alumnos sin matricular</label>{{$alumnos->count()}}
                            <select name='alumno' class="form-control" id="">
                                        @foreach ($alumnos as $alumno)
                                                <option value="{{$alumno->id}}">{{$alumno->name}} {{$alumno->surname}} {{$alumno->nif}}</option>
                                        @endforeach



                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Curso</label>
                            <select name="curso" class="form-control" id="">

                               @foreach ($cursos as $curso)
                                    @if ($cursos->count()>1)<option value="{{$curso->id_course}}">{{$curso->name}}</option>@else <option value="">No hay Cursos, hay que crearlos</option> @endif
                               @endforeach
                            </select>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button formaction="/adminmatriculas/matricular" type="submit" class="btn btn-primary mb-2 botonasignar">Matricular</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div><!--/row-->
    <br>
    <hr>
    <br>
</div>
<script>
    if (window.history.replaceState) { // verificamos disponibilidad
        window.history.replaceState(null, null, window.location.href);
    }
</script>


