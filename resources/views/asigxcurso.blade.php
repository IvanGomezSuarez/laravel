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



@php
    $nohay=0;
    $asignaturas = App\Models\Asigxcurso::get();
    $cursos = App\Models\Course::get();
   // $asignaturas = App\Models\Asignatura::get();

//print_r(Request::all());
@endphp


<br><br>
    <div class="container">
        <h3>Asignaturas por Cursos</h3>
        <hr>
        <br>
        <div class="row">
            <div class="col-md-6">
                <form class="asignatio" action="/asigxcurso/borra" method="post">
                    @csrf

                    <div class="form-group  editasign">
                        <label for="">Asginaciones</label>
                        <input type='hidden' name='idclass' value=''>
                        <select name='asignacion' size="10" class="form-control" id="">

                                @foreach ($asignaturas as $asignatura)
                                    @if ($asignatura['id_course']!='0')

                            <option value="{{$asignatura['id_class']}}|@foreach ($cursos as $curso)@if ($asignatura['id_course']==$curso['id_course']){{$curso['id_course']}}@endif @endforeach">{{$asignatura['name']}} <--> @foreach ($cursos as $curso)
                                           @if ($asignatura['id_course']==$curso['id_course'])
                                           {{$curso['name']}}
                                           @endif
                                           @endforeach  </option>

                                    @endif
                                @endforeach
                        </select>
                        <br>
                        <button type="submit" class="btn btn-primary mb-2">Borrar Asignación</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <form class="asignatio editasign" action="/asigxcurso/asocia" method="post">
                    @csrf

                    <div class="row">


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Asignatura</label>
                                <select name="clase" class="form-control" id="exampleFormControlSelect1">
                                    @foreach ($asignaturas as $asignatura)
                                        @if ($asignatura['id_course']=='0')
                                        <option value="{{ $asignatura['id_class']}}"> {{$asignatura['name'] }}</option>
                                        <?php ++$nohay; ?>
                                        @endif
                                    @endforeach
                                    @if ($nohay==0)
                                        <option value="">No quedan asignaturas...</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="exampleFormControlSelect1">Curso</label>
                                <select name='curso' class="form-control" id="exampleFormControlSelect1">

                                    @foreach ($cursos as $curso)
                                    <option value="{{$curso['id_course']}}">{{$curso['name']}}</option>
                                    @endforeach
                                    <?php
                                       // if($totalCursos>1){
                                         //   for ( $a = 1; $a<$totalCursos; $a++){ ?>
                                               <!-- <option value="<?php // echo $arrayCursos[$a]->id_course ?>"><?php // echo $arrayCursos[$a]->name ?></option>
                                            <?php // }
                                        //}else{?>
                                            <option value="">No quedan cursos...</option>-->

                                        <?php
                                       // }
                                    ?>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mb-2 botonasignar">Asignar</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <br>
        <hr>
        <br>
    </div>



