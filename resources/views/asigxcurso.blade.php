@extends('layout')
@section('content')
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

@endsection

