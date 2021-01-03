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

?>

<br><br>
<div class="container">

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
        <div class="col-md-12">
            @if (Request::get('asignatura')=='Elegir')

            @php $estaAsigna = Request::get('id-asigns') @endphp
            @php $esteAlumno = Request::get('id-alumns') @endphp

            {{$esteAlumno}}<br>
            @foreach ($exams as $exam) {{-- bucle en t_exam --}}

            @if (($exam->id_class)==($estaAsigna))

            @foreach ($examenes as $examen)

            {{-- bucle en exams si ya hay examenes calificados --}}


            @if (($exam->id_t_exam == $examen->id_t_exam)&&($examen->id_student == $esteAlumno))
            <form class="asignatio">
                <div class="form-group editasign">
                    @csrf
                    <input hidden type="number" name="alumno" value="{{Request::get('id-alumns')}}">
                    <input hidden type="number" name="asignatura" value="{{Request::get('id-asigns')}}">
                    <input hidden type="text"  name="name" value="{{$exam->name}}" >
                    <input hidden type="text" name="id_exam" value="{{$examen->id_exam}}">
                    <input type="text"  readonly value="{{$exam->name}}" >
                    @if ($examen->mark)
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


            @foreach ($exams as $exam)

            @if (($exam->id_class)==($estaAsigna))


            <form class="asignatio">
                <div class="form-group editasign">
                    @csrf
                    <input hidden type="number" name="alumno" value="{{Request::get('id-alumns')}}">
                    <input hidden type="number" name="asignatura" value="{{Request::get('id-asigns')}}">
                    <input hidden type="text"  name="name" value="{{$exam->name}}" >
                    <input hidden type="text" name="id_exam" value="{{$exam->id_exam}}">

                    <input type="text"  readonly value="{{$exam->name}}p" >
                    <input type="number" step=".01" placeholder="nota" name="nota">

                    <input hidden type="number" name="id_t_exam" value="{{$exam->id_t_exam}}" >

                    <input type="submit" formaction="/ponernota/new"  class="btn btn-primary mb-2 btn-sm">
                </div>
            </form>



            @endif

            @endforeach

            @endif


            @endforeach
            @endif
        </div>


    </div>


    <br>
    <hr>
    <br>


</div>


@endsection
