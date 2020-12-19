@extends('layout')
@section('content')
<?php
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

@endsection
