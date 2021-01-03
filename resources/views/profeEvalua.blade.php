@extends('layout')
@section('content')
<?php

    /* alumnos y alumno en concreto  tabla students  id, username, pass, email, name, surname, telephone, nif, date registered*/
    $alumnos = App\Models\Adminalumn::get();
    $alumnId = App\Models\Adminalumn::find(Request::get('id-alumns'));


    /* tabla class asignaturas y asignatura id_class, id_teacher, id_course, id_schedule, name, color */
    $asignaturas = App\Models\Asignatura::get();
    $asignaturaId = App\Models\Asignatura::find(Request::get('borra-id-asigns'));

    $asignaturasxCurso = App\Models\Asigxcurso::get();

   /* tabla enrollment id_enrollmen, id_student, id_course, status*/
    $enrollments = App\Models\Enrollment::get();

    if ((Request::get('id-alumns'))){
        $cursoxAlumno = DB::table('enrollment')->where('id_student',Request::get('id-alumns'))->get();
    }else{
        $cursoxAlumno = DB::table('enrollment')->get();
    }

    /* curso name de un alumno */
    $namecursoxAlumno = DB::table('courses')->where('id_course',$cursoxAlumno[0]->id_course)->get();

    if (isset($cursoxAlumno[0]->id_course)){

        $nameCurso = $namecursoxAlumno[0]->name;

    }else{
        $nameCurso = '';
    }

    /* todas las clasees pertencientes a un curso */
    $clasesxCurso = DB::table('class')->where('id_course',$cursoxAlumno[0]->id_course)->get();

    $cursos = App\Models\Course::get();
    $cursoId = App\Models\Course::find(Request::get('idcourse'));

    $percentiles  = App\Models\Calificable::get();
    $calendario = App\Models\Calendario::get();
    $works = App\Models\TWork::get();
    $exams = App\Models\TExam::get();
    $examenes = App\Models\Exam::get();
    $trabajos = App\Models\Work::get();
    $hide ='';

    $asignaturas = App\Models\Asigxcurso::get();
    $profesores = App\Models\Profesor::get();

    $asignaturaAsigned = App\Models\Course::find(Request::get('idcourse'));

    $profeId=79;

    $clase =  DB::table('class')->where('id_teacher',$profeId)->get();
    $claseProfe =  $clase[0]->id_class;
    $asignaturaCourse=$clase[0]->id_course;;

if ( (isset($_GET['evaluar'])) && $_GET['evaluar']=='Evaluar')
{
    $porcentaje = DB::table('percentage')->where('id_class',$claseProfe)->get();

    $percentExam = $porcentaje[0]->exams;
    $percentWork = $porcentaje[0]->continuous_assessment;

}


?>


<style>
    .notas input{
        padding: 10px;;
    }
    .marks{
        padding: 15px  20px;
    }

</style>
<br><br>
<div class="container notas">

<h3>Evaluación de @if (Request::get('evaluar')) {{$alumnId->name}} {{$alumnId->surname}} - {{$alumnId->nif}} <br> Curso: {{$nameCurso}} @else Alumnos @endif</h3>
<hr>
<br>
<div class="row">

    <div class="col-md-6">
        <form class="asignatio" action="" method="get">
            @csrf

            <div class="form-group editasign">
                <label for="">Alumnos</label>
                <select size="4" name="id-alumns"  class="form-control" id="" >
                    @foreach ($alumnos as $alumno) {{$alumno->id}}
                        @foreach ($enrollments as $enrollment)
                           {{$enrollment}}
                            @if ( ($alumno->id==$enrollment->id_student) && ($enrollment->id_course==$asignaturaCourse) )
                                <option value="{{$alumno->id}}"><span>{{$alumno->name}} {{$alumno->surname}} -- {{$alumno->nif}}</span></option>
                            @endif
                        @endforeach
                    @endforeach
                </select>
                <br>
                <input type="submit" formaction="/evaluar-alumnos" name="evaluar" value="Evaluar" class="btn btn-primary mb-2">
            </div>
        </form>
    </div>

    <div class="col-md-6 asignatio">

        <div class="form-group editasign marks">

            <label for="total-asignatura">Notas Asignatura</label>

            @if (Request::get('evaluar')=='Evaluar')
                <div class="lanota">
                    <h2>0</h2>
                </div>
            @endif
        </div>
    </div>


    <?php /* ?>
    @if (Request::get('evaluar')=='Evaluar')
    <div class="col-md-6">
        <form class="asignatio" action="" method="get">
            @csrf
            <div class="form-group editasign">
                <input hidden type="number" name="id-alumns" value="{{Request::get('id-alumns')}}">
                <input hidden  name="evaluar" value="Evaluar">

                <label for="">Lista de Asignaturas</label>
                <select name="id-asigns" size="4" class="form-control" id="">
                    @foreach ($clasesxCurso as $asignatura)
                    <option value="{{$asignatura->id_class}}">{{$asignatura->name}}</span></option>
                    @endforeach


                </select>
                <br>
                <input type="submit" formaction="/evaluacion-alumno" name="asignatura" value="Elegir" class="btn btn-primary mb-2">


            </div>
        </form>
    </div>
    @endif
    <?php */ ?>


</div>

@if (Request::get('evaluar')=='Evaluar')
<div class="row">
    <div class="col-md-12 ">

        @php // $estaAsigna = Request::get('id-asigns') @endphp

        @php $estaAsigna = $claseProfe @endphp

        @php $esteAlumno = Request::get('id-alumns') @endphp


        <h5>Examenes</h5>

        @php $mediaItems=0 @endphp
        @php $media=0 @endphp
        @foreach ($exams as $exam) {{-- bucle en t_exam tabla unica de examenes --}}

        @if (($exam->id_class)==($estaAsigna))

        {{-- bucle en exams si ya hay examenes calificados --}}
        @foreach ($examenes as $examen)

        @if (($exam->id_t_exam == $examen->id_t_exam)&&($examen->id_student == $esteAlumno))

        @php ++$mediaItems @endphp
        <form id="{{$exam->id_t_exam}}" class="asignatio  form-group ">
            <div class="form-group editasign ">
                @csrf
                <input hidden type="number" name="alumno" value="{{Request::get('id-alumns')}}">
                <input hidden type="number" name="asignatura" value="{{$estaAsigna}}">
                <input hidden type="text"  name="name" value="{{$exam->name}}" >
                <input hidden type="text" name="id_exam" value="{{$examen->id_exam}}">
                <input type="text"  readonly value="{{$exam->name}}" >
                @if ($examen->mark)
                <input type="number" step=".01" placeholder="nota" name="nota" value="{{$examen->mark}}@php $media=$media+$examen->mark @endphp">
                @else
                <input type="number" step=".01" placeholder="nota" name="nota" value="">
                @endif
                <input hidden type="number" name="id_t_exam" value="{{$exam->id_t_exam}}" >

                <input type="submit" formaction="/ponernota/update"  class="btn btn-primary btn-sm mb-2">
            </div>
        </form>
        @endif

        @endforeach



        <form id="{{$exam->id_t_exam}}" class="asignatio form-group ">
            <div class="form-group editasign">
                @csrf
                <input hidden type="number" name="alumno" value="{{Request::get('id-alumns')}}">
                <input hidden type="number" name="asignatura" value="{{$estaAsigna}}">
                <input hidden type="text"  name="name" value="{{$exam->name}}" >
                <input hidden type="text" name="id_exam" value="{{$exam->id_exam}}">
                <input type="text"  readonly value="{{$exam->name}}" >
                @if ($examen->mark)
                <input type="number" step=".01" placeholder="nota" name="nota" value="{{$exam->mark}}">
                @else
                <input type="number" step=".01" placeholder="nota" name="nota" value="">
                @endif
                <input hidden type="number" name="id_t_exam" value="{{$exam->id_t_exam}}" >

                <input type="submit" formaction="/ponernota/new"  class="btn btn-primary btn-sm mb-2">
            </div>
        </form>

        @endif
        @endforeach




        @if (($exam->id_class)==($estaAsigna))


        @if ($mediaItems==0)
       @php $mediaItems=1; @endphp

        @endif
        @if ($media==0)
        @php $media=1; @endphp

        @endif

        @endif



        <hr>

        @php $estaAsigna = $claseProfe @endphp

        @php $esteAlumno = Request::get('id-alumns') @endphp

        <h5>Trabajos</h5>

        @php $mediaItemsW=0 @endphp
        @php $mediaW=0 @endphp


    @foreach ($works as $work) {{-- bucle en work tabla unica de trabajos --}}

        @if (($work->id_class)==($estaAsigna))

            {{-- bucle en works si ya hay trabajos calificados --}}
            @foreach ($trabajos as $trabajo)

                @if (($work->id_t_work == $trabajo->id_t_work)&&($trabajo->id_student == $esteAlumno))

                    @php ++$mediaItemsW @endphp

                    <form id="{{$work->id_t_work}}" class="asignatio">
                        <div class="form-group editasign">
                            @csrf
                            <input hidden type="number" name="alumno" value="{{Request::get('id-alumns')}}">
                            <input hidden type="number" name="asignatura" value="{{$estaAsigna}}">
                            <input hidden type="text"  name="name" value="{{$work->name}}" >
                            <input hidden type="text" name="id_work" value="{{$trabajo->id_work}}">
                            <input type="text"  readonly value="{{$work->name}}" >
                            @if ($trabajo->mark)
                            <input type="number" step=".01" placeholder="nota" name="nota" value="{{$trabajo->mark}}@php $mediaW=$mediaW+$trabajo->mark @endphp">
                            @else
                            <input type="number" step=".01" placeholder="nota" name="nota" value="">
                            @endif
                            <input hidden type="number" name="id_t_work" value="{{$work->id_t_work}}" >

                            <input type="submit" formaction="/ponernota-work/update"  class="btn btn-primary btn-sm mb-2">
                        </div>
                    </form>
                @endif

            @endforeach



                <form id="{{$work->id_t_work}}" class="asignatio">
                    <div class="form-group editasign">
                        @csrf
                        <input hidden type="number" name="alumno" value="{{Request::get('id-alumns')}}">
                        <input hidden type="number" name="asignatura" value="{{$estaAsigna}}">
                        <input hidden type="text"  name="name" value="{{$work->name}}" >
                        <input hidden type="text" name="id_work" value="{{$work->id_work}}">
                        <input type="text"  readonly value="{{$work->name}}" >
                        @if ($work->mark)
                        <input type="number" step=".01" placeholder="nota" name="nota" value="{{$work->mark}}">
                        @else
                        <input type="number" step=".01" placeholder="nota" name="nota" value="">
                        @endif
                        <input hidden type="number" name="id_t_work" value="{{$work->id_t_work}}" >

                        <input type="submit" formaction="/ponernota-work/new"  class="btn btn-primary btn-sm mb-2">
                    </div>
                </form>



        @endif
    @endforeach

    @if (isset($work))&&(($work->id_class)==($estaAsigna))



            @if ($mediaItemsW==0)
                @php $mediaItemsW=1; @endphp

            @endif
            @if ($mediaW==0)
            @php $mediaW=1; @endphp

            @endif

    @endif
    @if ($mediaItemsW==0)
    @php $mediaItemsW=1; @endphp

    @endif
    @if ($mediaW==0)
    @php $mediaW=1; @endphp

    @endif
<span id="lanota" hidden>{{(($percentExam*($media/$mediaItems))/100)  +   (($percentWork*($mediaW/$mediaItemsW))/100)}}</span>


    </div>

</div>
<hr>

<div class="row">
    <div class="col-md-12">
        <form class="form-group">
            <h5>Enviar Mail:</h5>
            @if (Request::get('evaluar')=='Evaluar')
            <input id="texter" type="text" hidden name="email" value="{{$alumnId->email}}">
            <textarea style="padding: 10px; width:100%" name="mensaje" cols="50" class="mb-3">Hola {{$alumnId->name}}, </textarea>
            <input type="submit" formaction="/mail" name="mail" value="Enviar" class="btn btn-primary btn-sm mb-2">
            @endif
        </form>

    </div>
</div>


@endif


<br>
<hr>
<br>


</div>
<script>
    $('[id]').each(function () {
        $('[id="' + this.id + '"]:gt(0)').remove();
    });

</script>
<script>
    $( document ).ready(function() {
       var nota= $("#lanota").text();
        $(".lanota h2").html(nota);
    });

</script>


@endsection
