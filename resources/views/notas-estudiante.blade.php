@extends('layout')
@section('content')
<?php
    $alumnId = Session::get('id_user');
    /* alumnos y alumno en concreto  tabla students  id, username, pass, email, name, surname, telephone, nif, date registered*/
    $alumnos = App\Models\Adminalumn::get();
  //  $alumnId = App\Models\Adminalumn::find(Request::get('id-alumns'));


    /* tabla class asignaturas y asignatura id_class, id_teacher, id_course, id_schedule, name, color */
    $asignaturas = App\Models\Asignatura::get();
    $asignaturaId = App\Models\Asignatura::find(Request::get('borra-id-asigns'));

    $asignaturasxCurso = App\Models\Asigxcurso::get();

    /* tabla enrollment id_enrollmen, id_student, id_course, status*/
    $enrollments = App\Models\Enrollment::get();

    if ((Session::get('id_user'))){
        $cursoxAlumno = DB::table('enrollment')->where('id_student',$alumnId)->get();
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
/******************************************************/
    $profeId=79;

    if (isset($_GET['id-asigns'])&&($_GET['id-asigns']!='')){
        foreach ($clasesxCurso as $clasexCurso)
        {
            if ($clasexCurso->id_class == ($_GET['id-asigns'])){
            $profeId = $clasexCurso->id_teacher;

            }
        }

    }




/*******************************************************/


    $clase =  DB::table('class')->where('id_teacher',$profeId)->get();
    $claseProfe =  $clase[0]->id_class;
    $asignacuraCourse=$clase[0]->id_course;;

    if ( (isset($_GET['evaluar'])) && $_GET['evaluar']=='Evaluar')
    {
        $porcentaje = DB::table('percentage')->where('id_class',Request::get('id-asigns'))->get();

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

<hr>
<br>
<div class="row">

    <div class="col-md-6 asignatio">

        <div class="form-group editasign marks">

            <label for="total-asignatura">Notas Asignatura</label>


            <div class="lanota">
                <h2>0</h2>
            </div>

        </div>
    </div>

    <div class="col-md-6">
        <form class="asignatio" action="" method="get">
            @csrf
            <div class="form-group editasign">
                <input hidden type="number" name="id-alumns" value="{{$alumnId}}">
                <input hidden  name="evaluar" value="Evaluar">

                <label for="">Lista de Asignaturas</label>
                <select name="id-asigns" size="4" class="form-control" id="">
                    @foreach ($clasesxCurso as $asignatura)
                    <option value="{{$asignatura->id_class}}">{{$asignatura->name}}</span></option>
                  @endforeach


                </select>
                <br>
                <input type="submit" formaction="" name="asignatura" value="Elegir" class="btn btn-primary mb-2">


            </div>
        </form>
    </div>




</div>
    <br>
    <hr>
    <br>
<div class="row">
    <div class="col-md-12">

        <table class="table table-dark">
            <thead>
            <tr>

                <th scope="col">Nombre</th>
                <th scope="col">Nota</th>

            </tr>
            </thead>
            <tbody>
            @php $mediaItems=0 @endphp
            @php $media=0 @endphp
            @foreach ($examenes as $examen)
            @if( ($examen->id_student == $alumnId)&&($examen->id_class == Request::get('id-asigns') ) )
            @php ++$mediaItems @endphp
            @php $media=$media+$examen->mark @endphp
            <tr>

                <td>{{$examen->name}}</td>
                <td>{{$examen->mark}}</td>

            </tr>

            @endif
            @endforeach




            @php $mediaItemsW=0 @endphp
            @php $mediaW=0 @endphp

            @foreach ($trabajos as $trabajo)
            @if( ($trabajo->id_student == $alumnId)&&($trabajo->id_class == Request::get('id-asigns') ) )
            @php ++$mediaItemsW @endphp
            @php $mediaW=$mediaW+$trabajo->mark @endphp
            <tr>

                <td>{{$trabajo->name}}</td>
                <td>{{$trabajo->mark}}</td>

            </tr>


            @endif
            @endforeach



            </tbody>
        </table>






    </div>
</div>


    @if ($mediaItems==0)
    @php $mediaItems=1; @endphp

    @endif
    @if ($media==0)
    @php $media=1; @endphp

    @endif



    @if ($mediaItemsW==0)
    @php $mediaItemsW=1; @endphp

    @endif
    @if ($mediaW==0)
    @php $mediaW=1; @endphp

    @endif


    @if (Request::get('evaluar')=='Evaluar')
    <span id="lanota" hidden>{{(($percentExam*($media/$mediaItems))/100)  +  (($percentWork*($mediaW/$mediaItemsW))/100)}}</span>
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
