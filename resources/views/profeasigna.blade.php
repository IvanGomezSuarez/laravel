@extends('layout')


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



<?php
$asignaturas = App\Models\Asigxcurso::get();
$profesores = App\Models\Profesor::get();
$asignaturaAsigned = App\Models\Course::find(Request::get('idcourse'));

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
                                    @foreach ($profesores as $profesor)
                                            @if ($profesor->asignado==null)
                                            <option value="{{$profesor->id_teacher}}">{{$profesor->name}} {{$profesor->surname}}</option>
                                            @else
                                                <option value="">No quedan profesores docentes...</option>
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
                                       <option value="{{$asignatura->id_class}}">{{$asignatura->name}}</option>
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



