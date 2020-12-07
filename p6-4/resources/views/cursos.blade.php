@extends('layout')
@section('content')

<?php

    $cursos = App\Models\Course::get();

    $cursoId = App\Models\Course::find(Request::get('idcourse'));

    echo '<pre>';
    print_r($cursoId);


    /*
    foreach ($courses as $course) {
        echo $course->id_course;echo '<br>';
        echo $course->description;echo '<br>';
        echo $course->date_start;echo '<br>';
        echo $course->date_end;echo '<br>';
        echo $course->active;echo '<br>';
    }
*/


    echo '</pre>';

?>

<br><br>
<div id='' class="container">
    <h3>Edición de cursos</h3>
    <hr>
    <br>
    <div class="row">
        <div class='col-lg-5'>
            <form  class="asignatio" action="crea" method="post">
                @csrf

                <div class="form-group editasign">
                    <label for="exampleFormControlSelect1">

                        @if (Request::get('edita'))
                            Editar Curso
                        @else
                            Crear Curso
                        @endif
                    </label>
                    <div class="input-group mb-3">
                        @if (Request::get('edita'))
                            <input type="hidden" name="id" value="{{ Request::get('idcourse')}}">
                        @endif
                        <input autofocus="true" required type="text" class="form-control fullwidth" name="name"
                               placeholder="Nombre"
                               aria-label="Nombre"
                               aria-describedby="basic-addon1"
                               value="@if (Request::get('edita')){{$cursoId->name}}@endif">
                        <br>
                        <div class="fdorm-group mb-3">
                            <label for="">Descripcion</label>
                            <textarea required class="form-control" id="" cols="60" rows="5" name="description">@if (Request::get('edita')){{$cursoId->description}}@endif </textarea>
                        </div>
                        <div class="fdorm-group row mb-3">
                            <div class="col-sm-6">
                                <label for="">Inicio</label>
                                <input required type="date" class="form-control fullwidth" id="" name="alfaday" placeholder="Dia inicio" value="@if (Request::get('edita')){{$cursoId->date_start}}@endif" >
                            </div>
                            <div class="col-sm-6">
                                <label for="">Finaliza</label>
                                <input  required type="date" class="form-control fullwidth" id="" name="omegaday" placeholder="Dia final" value="@if (Request::get('edita')){{$cursoId->date_end}}@endif">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Activo</label>
                            </div>
                            <select class="custom-select" name="active" id="inputGroupSelect01">

                                @if (Request::get('edita'))
                                    <option >Elegir...</option>
                                    @if ($cursoId->active=='1')
                                        <option selected  value="1">Si</option>
                                        <option value="0">No</option>
                                    @else
                                        <option  value="1">Si</option>
                                        <option selected value="0">No</option>

                                    @endif
                               @else
                                    <option >Elegir...</option>
                                    <option  value="1">Si</option>
                                    <option value="0">No</option>
                                @endif
                            </select>
                        </div>
                    </div>
                 @if (Request::get('edita'))
                        <input type="submit" name="accion" value="Edita" class="btn btn-primary mb-2">
                 @else
                            <button type="submit" class="btn btn-primary mb-2">Crear Curso</button>
                 @endif
                </div>
            </form>
        </div>
        <div class="col-lg-7">
            <form class="asignatio" action="" method="">

                <div class="form-group editasign">
                    <label for="">Lista de Cursos</label>
                    <select name="idcourse" size="10" class="form-control" id="">

                       @foreach ($cursos as $curso)

                                <option value="{{$curso->id_course}}">{{ $curso->name}} @if (($curso->active)=='1') - Activo  @else - No Activo @endif</span></option>

                       @endforeach



                    </select>
                    <br>
                    <input type="submit" name="edita" value="Edita" class="btn btn-primary mb-2">
                    <input type="submit" name="borra" value="Borra" class="btn btn-primary mb-2">

                </div>
            </form>


        </div>
    </div>


</div>

<script>
    if (window.history.replaceState) { // verificamos disponibilidad
        window.history.replaceState(null, null, window.location.href);
    }


</script>
<?php
  //  if($reload){
    ///    echo '<script>location.reload();</script>';
  //  }
?>



@endsection
