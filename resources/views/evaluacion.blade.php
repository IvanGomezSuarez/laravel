@extends('layout')
@section('content')
<?php
    $alumnos = App\Models\Adminalumn::get();
    $alumnId = App\Models\Adminalumn::find(Request::get('id-alumns'));

    $asignaturas = App\Models\Asignatura::get();
    $asignaturaId = App\Models\Asignatura::find(Request::get('borra-id-asigns'));

    $asignaturasxCurso = App\Models\Asigxcurso::get();

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
?>
<style>
    .notas input{
        padding: 10px;;
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
                    <select size="4" name="id-alumns"  class="form-control" id="" multiple>
                        @foreach ($alumnos as $alumno)
                        <option value="{{$alumno->id}}"><span>{{$alumno->name}} {{$alumno->surname}} -- {{$alumno->nif}}</span></option>
                        @endforeach

                    </select>
                    <br>
                    <input type="submit" formaction="/evaluacion-alumno" name="evaluar" value="Evaluar" class="btn btn-primary mb-2">
                </div>
            </form>
        </div>

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

    </div>
    <div class="row">
        <div class="col-md-6 offset-3">


        </div>
    </div>


    <div class="row">
        <div class="col-md-12 ">
            @if (Request::get('asignatura')=='Elegir')

                @php $estaAsigna = Request::get('id-asigns') @endphp
                @php $esteAlumno = Request::get('id-alumns') @endphp

                <h5>Examenes</h5>


                @foreach ($exams as $exam) {{-- bucle en t_exam tabla unica de examenes --}}

                    @if (($exam->id_class)==($estaAsigna))

                        {{-- bucle en exams si ya hay examenes calificados --}}
                        @foreach ($examenes as $examen)

                            @if (($exam->id_t_exam == $examen->id_t_exam)&&($examen->id_student == $esteAlumno))

                                <form id="{{$exam->id_t_exam}}" class="asignatio  form-group ">
                                    <div class="form-group editasign ">
                                        @csrf
                                        <input hidden type="number" name="alumno" value="{{Request::get('id-alumns')}}">
                                        <input hidden type="number" name="asignatura" value="{{Request::get('id-asigns')}}">
                                        <input hidden type="text"  name="name" value="{{$exam->name}}" >
                                        <input hidden type="text" name="id_exam" value="{{$examen->id_exam}}">
                                        <input type="text"  readonly value="{{$exam->name}}" >
                                        @if (isset($examen)&&($examen->mark))
                                            <input type="number" step=".01" placeholder="nota" name="nota" value="{{$examen->mark}}">
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
                                <input hidden type="number" name="asignatura" value="{{Request::get('id-asigns')}}">
                                <input hidden type="text"  name="name" value="{{$exam->name}}" >
                                <input hidden type="text" name="id_exam" value="{{$exam->id_exam}}">
                                <input type="text"  readonly value="{{$exam->name}}" >
                                @if (isset($examen)&&($examen->mark))
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

            @endif


            <hr>

            @if (Request::get('asignatura')=='Elegir')

                @php $estaAsigna = Request::get('id-asigns') @endphp
                @php $esteAlumno = Request::get('id-alumns') @endphp


                <h5>Trabajos</h5>

                @foreach ($works as $work) {{-- bucle en t_work tabla unica de trabajos --}}


                    @if  ($work->id_class == $estaAsigna)

                        {{-- bucle en exams si ya hay examenes calificados --}}
                        @foreach ($trabajos as $trabajo)
                            @if (($work->id_t_work == $trabajo->id_t_work)&&($trabajo->id_student == $esteAlumno))
                                <form id="{{$work->id_t_work}}" class="asignatio">
                                    <div class="form-group editasign">
                                        @csrf
                                        <input hidden type="number" name="alumno" value="{{Request::get('id-alumns')}}">
                                        <input hidden type="number" name="asignatura" value="{{Request::get('id-asigns')}}">
                                        <input hidden type="text"  name="name" value="{{$work->name}}" >
                                        <input hidden type="text" name="id_work" value="{{$trabajo->id_work}}">
                                        <input type="text"  readonly value="{{$work->name}}">
                                        @if ($trabajo->mark)
                                            <input type="number" step=".01" placeholder="nota" name="nota" value="{{$trabajo->mark}}">
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
                                <input hidden type="number" name="asignatura" value="{{Request::get('id-asigns')}}">
                                <input hidden type="text"  name="name" value="{{$work->name}}">
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

            @endif

    </div>

    </div>
    <hr>

    @if(isset($alumnId->email))
    <div class="row">
        <div class="col-md-12">
            <form class="form-group">
                <h5>Enviar Mail:</h5>

                <input id="texter" type="text" hidden name="email" value="{{$alumnId->email}}">
                <textarea style="padding: 10px; width:100%" name="mensaje" cols="50" class="mb-3">Hola {{$alumnId->name}}, </textarea>
                <input type="submit" formaction="/mail" name="mail" value="Enviar" class="btn btn-primary btn-sm mb-2">
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


@endsection
