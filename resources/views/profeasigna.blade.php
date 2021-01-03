@extends('layout')
@section('content')
<?php
$asignaturas = App\Models\Asigxcurso::get();
$profesores = App\Models\Profesor::get();
$asignaturaAsigned = App\Models\Course::find(Request::get('idcourse'));
echo '<pre>';
//print_r($asignaturas);
    echo '</pre>';
?>
<br><br>
    <div class="container">
        <h3>Asignación de Asignaturas</h3>
        <hr>
        <br>
        <div class="row">
            <div class="col-md-5">
                <form class="asignatio" action="/profeasigna/delasigna" method="post">
                    @csrf

                    <div class="form-group  editasign">
                        <label for="">Asginaciones</label>
                        <input type='hidden' name='idclass' value=''>
                        <select name='asignacion' size="10" class="form-control" id="">

                            @foreach ($profesores as $profesor)
                                @if (($profesor->asignado)==1)
                                    <option value="{{$profesor->id_teacher}}|@foreach($asignaturas as $asignatura)@if(($asignatura->id_teacher)==($profesor->id_teacher)){{trim($asignatura->id_class)}}@endif @endforeach">{{$profesor->name}} {{$profesor->surname}} >--< @foreach ($asignaturas as $asignatura) @if (($asignatura->id_teacher)==($profesor->id_teacher)) {{$asignatura->name}} @endif @endforeach </option>
                                @endif
                            @endforeach


                        </select>
                        <br>
                        <button type="submit" class="btn btn-primary mb-2">Borrar Asignación</button>
                    </div>
                </form>
            </div>
            <div class="col-md-7">
                <form class="asignatio editasign" action="/profeasigna/asigna" method="post">
                    @csrf

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="">Profesor</label>
                                <select name='profesor' class="form-control" id="">
                                    <option disabled value="">Seleccionar profesores docentes...</option>

                                    @foreach ($profesores as $profesor)
                                            @if ($profesor->asignado==null)
                                            <option value="{{$profesor->id_teacher}}">{{$profesor->name}} {{$profesor->surname}}</option>
                                            @endif
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Asignatura</label>
                                <select name="clase" class="form-control" id="">
                                     @foreach ($asignaturas as $asignatura)
                                     @if (sizeof($asignaturas)==0)
                                        <option value="">No hay asignaturas, hay que crearlas</option>
                                     @else
                                        @if (($asignatura->id_teacher) == null)
                                       <option value="{{$asignatura->id_class}}">{{$asignatura->name}}</option>
                                        @endif
                                    @endif
                                     @endforeach


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
    <script>
        if (window.history.replaceState) { // verificamos disponibilidad
            window.history.replaceState(null, null, window.location.href);
        }
    </script>


@endsection
