@extends('layout')
@section('content')

<?php

    $asignaturas = App\Models\Asignatura::get();

    $enrollments = App\Models\Enrollment::get();

    $cursos = App\Models\Course::get();

    $asignaturasxCurso = App\Models\Asigxcurso::get();

?>
<div class="container">
    <br><br>
    <h3>Aplicativo de Usuario</h3>
    <hr>

    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Hola, {{Session::get('name')}}</h4>
        <p>Esta es tu área de @if (Session::get('role')=='student') <b>Estudiante</b> @elseif  (Session::get('role')=='teacher') <b>Profesor</b> @elseif (Session::get('role')=='admin') <b>Administrador</b> @endif </p>
        <hr>
        @if (Session::get('role')=='student')

            <p class="mb-0">Matriculado en
        <h4>
            @foreach ($enrollments as $enrollment)
                @if ($enrollment->id_student == Session::get('id_user'))
                    @php $cursoID = $enrollment->id_course; @endphp
                    @foreach ($cursos as $curso)
                       @if ($curso->id_course == $cursoID)
                        {{$curso->name}}
                        @endif
                    @endforeach
                @endif
            @endforeach
        </h4>
        </p>

            <hr>
            <label>Asignaturas:</label><br>

                @foreach ($asignaturas as $asignatura)
                    @foreach ($enrollments as $enrollment)
                        @if (($enrollment->id_student == Session::get('id_user')) && ($asignatura->id_course == $enrollment->id_course))
                            {{$asignatura->name}}<br>
                        @endif
                    @endforeach
                @endforeach

            <ul>

                <li style=' font-weight:500;'>
                </li>

            </ul>

        @endif
        @if (Session::get('role')=='teacher')

        <p class="mb-0">Tienes asignada la asignatura como docente:</p>

        @foreach($asignaturas as $asignatura)
            @if ($asignatura->id_teacher == Session::get('id_user'))
              <h4>{{$asignatura->name}}</h4>
            @endif
        @endforeach
        <hr>


        <p class="mb-0">Desde aquí podrás establecer horarios de clase, examenes y trabajos, así como podrás evaluar a tus alumnos.</p>


        @endif

        @if (Session::get('role')=='admin')



        <p class="mb-0">Desde aquí podras tener acceso a todas las propiedades de la aplicación.</p>
        @endif



    </div>

</div>


@endsection