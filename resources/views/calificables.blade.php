@extends('layout')
@section('content')
<?php

    $asignaturaId = App\Models\Asignatura::find(Request::get('ider'));
    $asignaturas = App\Models\Asignatura::get();
    $percentiles  = App\Models\Calificable::get();

 // print_r($percentiles);
 // print_r($percentiles->find(Request::get('ider'),['id_class'])->continuous_assessment);
 // print_r($percentiles->first()->continuous_assessment);
 //  print_r($asignaturas);
    echo '<pre>';
 print_r($asignaturaId);
echo '</pre>';


?>


<?php // echo $asignaturas->find(Request::get('ider'))->name ?>
<style>
    input.passive{
        border: none;
        background-color: transparent!important;
    }
</style>
    <br><br>
    <div class="container">

       <h3>@if (Request::get('ider')) Carga docente de {{$asignaturas->find(Request::get('ider'))->name}} @else Carga docente @endif</h3>
        <br>
        <div class="row">
            <div class="col-md-5">
                <form class="asignatio" action="" method="">
                    @csrf
                    <div class="form-group editasign">
                        <label for="asignaturas">Asignatura</label>
                        <select class="form-select form-control" multiple  id="asignaturas">
                            @foreach ($asignaturas as $asignatura)
                            <option value="{{$asignatura->id_class}}">{{$asignatura->name}}</option>
                            @endforeach

                        </select>
                     </div>
                </form>
            </div>

            <div class="col-md-7">
            <script>
                function updateTextInput(val) {
                    document.getElementById('textInput').value=val+'/'+(100-val);
                };
            </script>
                <form class="asignatio">
                    @csrf

                    <div class="form-group editasign">

                        <div class="row">
                            <div class="col-sm-5"><label class="text-sm-left asignatio">E.Continua %</label></div>
                            <div class="col-sm-2"><input readonly class="form-control passive text-center" type="text" id="textInput" value=""></div>
                            <div class="col-sm-5"><label class="float-right align-right">Exámenes %</label></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">

                                @if (Request::get('ider'))
                                    <input type="hidden" name="ider" value="{{Request::get('ider')? Request::get('ider') : ($asignaturas->first()->id_class) }}">

                                   <input value="<?php  foreach ($percentiles as $percentil) {
                                                if (($percentil->id_class)==(Request::get('ider'))){
                                                    echo ($percentil->continuous_assessment);
                                                }
                                            }  ?>"  type="range" class="w-100" name="rangeInput" min="0" max="100"  onmousemove="updateTextInput(this.value)">
                                @else
                                    Elegir asignatura
                                @endif
                            </div>
                        </div>
                    </div>
                    <input type="submit" formaction="calificables/percent" name="modo" value="Asignar"  class="btn btn-primary mb-2">

                </form>



            </div>
        </div>
        <br>  <hr>
        <br>
        <h3>Examenes y Trabajos</h3>
       <br>
        <div class="row">
            <div class="col-md-6">
                <form class="asignatio" action="" method="get">
                    @csrf
                    <div class="form-group editasign">
                        <label for="">Crear Examen @if (Request::get('ider')) de {{$asignaturas->find(Request::get('ider'))->name}} @endif</label>
                        <!--<label for="">@if (isset($_SESSION['borra-id-asigns'])) Editar Asignatura @else Crear Asignatura @endif</label>-->
                        <div class="input-group">
                            @if (Request::get('ider'))<input type="hidden" name="id_class" value="{{$asignaturaId->id_class}}"> @endif

                            <input autofocus="true" required type="text" class="form-control fullwidth"
                                   name="name" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1"
                                   value="">
                            <br>

                        </div>

                    <div class=" mb-2 ">

                        <div class="3form-group row mb-0">
                            <div class="col-md-12 mb-3">
                                <label for="entrada">Dia</label>
                                <input required name="day" id="entrada" class="form-control" type="date"  >
                            </div>
                        </div>

                        <div class="for3m-group row mb-4">
                            <div class="col-md-6">
                                <label for="entrada">Hora Inicio</label>
                                <input required name="time_start" id="entrada" class="form-control" type="time" min="08:00" max="20:00" step="1800" list="limiteini" >
                                <datalist id="limiteini">

                                    <option value="08:00">
                                    <option value="08:30">
                                    <option value="09:00">
                                    <option value="09:30">
                                    <option value="10:00">
                                    <option value="10:30">
                                    <option value="11:00">
                                    <option value="11:30">
                                    <option value="12:00">
                                    <option value="12:30">
                                    <option value="13:00">
                                    <option value="13:30">
                                    <option value="14:00">
                                    <option value="14:30">
                                    <option value="15:00">
                                    <option value="15:30">
                                    <option value="16:00">
                                    <option value="16:30">
                                    <option value="17:00">
                                    <option value="17:30">
                                    <option value="18:00">
                                    <option value="18:30">
                                    <option value="19:00">
                                    <option value="19:30">
                                    <option value="20:00">

                                </datalist>

                            </div>
                            <div class="col-md-6">
                                <label for="entrada">Hora Fin</label>
                                <input required name="time_end" class="form-control" type="time" min="09:00" max="21:00" step="1800" list="limitefin">
                                <datalist id="limitefin">


                                    <option value="09:00">
                                    <option value="09:30">
                                    <option value="10:00">
                                    <option value="10:30">
                                    <option value="11:00">
                                    <option value="11:30">
                                    <option value="12:00">
                                    <option value="12:30">
                                    <option value="13:00">
                                    <option value="13:30">
                                    <option value="14:00">
                                    <option value="14:30">
                                    <option value="15:00">
                                    <option value="15:30">
                                    <option value="16:00">
                                    <option value="16:30">
                                    <option value="17:00">
                                    <option value="17:30">
                                    <option value="18:00">
                                    <option value="18:30">
                                    <option value="19:00">
                                    <option value="19:30">
                                    <option value="20:00">
                                    <option value="20:30">
                                    <option value="21:00">

                                </datalist>
                            </div>



                        </div>

                        <input type="submit" formaction="calificables/examen" name="examen" value="Crear"  class="btn btn-primary mb-2">

                    </div>
                    </div>

                </form>
            </div>
            <div class="col-md-6">
                <form class="asignatio" action="" method="">
                    @csrf
                    <div class="form-group editasign">
                        <label for="">Crear Trabajo @if (Request::get('ider')) de {{$asignaturas->find(Request::get('ider'))->name}} @endif</label>
                        <!--<label for="">@if (isset($_SESSION['borra-id-asigns'])) Editar Asignatura @else Crear Asignatura @endif</label>-->
                        <div class="input-group">

                            @if (Request::get('ider'))<input type="hidden" name="id_class" value="{{$asignaturaId->id_class}}"> @endif

                            <input autofocus="true" required type="text" class="form-control fullwidth"
                                   name="name" placeholder="Nombre" value="">
                            <br>

                        </div>

                        <div class=" mb-2 ">

                            <div class="3form-group row mb-3">
                                <div class="col-md-12">
                                    <label for="entrada">Dia</label>
                                    <input required name="day" id="entrada" class="form-control" type="date"  >
                                </div>
                            </div>

                            <div class="for3m-group row mb-4">
                                <div class="col-md-6">
                                    <label for="entrada">Hora Inicio</label>
                                    <input required name="time_start" id="entrada" class="form-control" type="time" min="08:00" max="20:00" step="1800" list="limiteini" >
                                    <datalist id="limiteini">

                                        <option value="08:00">
                                        <option value="08:30">
                                        <option value="09:00">
                                        <option value="09:30">
                                        <option value="10:00">
                                        <option value="10:30">
                                        <option value="11:00">
                                        <option value="11:30">
                                        <option value="12:00">
                                        <option value="12:30">
                                        <option value="13:00">
                                        <option value="13:30">
                                        <option value="14:00">
                                        <option value="14:30">
                                        <option value="15:00">
                                        <option value="15:30">
                                        <option value="16:00">
                                        <option value="16:30">
                                        <option value="17:00">
                                        <option value="17:30">
                                        <option value="18:00">
                                        <option value="18:30">
                                        <option value="19:00">
                                        <option value="19:30">
                                        <option value="20:00">

                                    </datalist>

                                </div>
                                <div class="col-md-6">
                                    <label for="entrada">Hora Fin</label>
                                    <input required name="time_end" class="form-control" type="time" min="09:00" max="21:00" step="1800" list="limitefin">
                                    <datalist id="limitefin">


                                        <option value="09:00">
                                        <option value="09:30">
                                        <option value="10:00">
                                        <option value="10:30">
                                        <option value="11:00">
                                        <option value="11:30">
                                        <option value="12:00">
                                        <option value="12:30">
                                        <option value="13:00">
                                        <option value="13:30">
                                        <option value="14:00">
                                        <option value="14:30">
                                        <option value="15:00">
                                        <option value="15:30">
                                        <option value="16:00">
                                        <option value="16:30">
                                        <option value="17:00">
                                        <option value="17:30">
                                        <option value="18:00">
                                        <option value="18:30">
                                        <option value="19:00">
                                        <option value="19:30">
                                        <option value="20:00">
                                        <option value="20:30">
                                        <option value="21:00">

                                    </datalist>
                                </div>
                            </div>


                            <input type="submit" formaction="calificables/work" name="work" value="Crear"  class="btn btn-primary mb-2">
                        </div>

                    </div>

                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-dark table-sm">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Item</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Evaluaciones</th>
                        <th scope="col">Notificar</th>
                        <th scope="col">Borrar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @ foreach ($calenda as $calendar)
                    <tr>
                        <th scope="row">{$loop->index}}</th>
                        <td> {$calendar->day}}</td>
                        <td>{$calendar->time_start}}</td>
                        <td>{$calendar->time_end}}</td>
                        <td>{$calendar->time_end}}</td>
                        <td><form name="borra" action="/calendario/borra" method="get">@csrf<button type="submit" name="erasethis" value="{$calendar->id_schedule}}"><i class="fa fa-trash" aria-hidden="true"></i></button></form></td>
                    </tr>


                    @ endforeach


                    <tr>

                        <td>Examen</td>
                        <td>Examen Temas 1-2 </td>
                        <td>{$calendar->time_start}}</td>
                        <td>{$calendar->time_end}}</td>
                        <td>{$calendar->time_end}}</td>
                        <td><form name="borra" action="/calendario/borra" method="get">@csrf<button type="submit" name="erasethis" value="{$calendar->id_schedule}}"><i class="fa fa-trash" aria-hidden="true"></i></button></form></td>
                    </tr>
                    <tr>

                        <td>Trabajo P1</td>
                        <td>P1 - Bucles y Arrays </td>
                        <td>12/12/2020</td>
                        <td>{$calendar->time_end}}</td>
                        <td>{$calendar->time_end}}</td>
                        <td><form name="borra" action="/calendario/borra" method="get">@csrf<button type="submit" name="erasethis" value="{$calendar->id_schedule}}"><i class="fa fa-trash" aria-hidden="true"></i></button></form></td>
                    </tr>


                    </tbody>
                </table>
            </div>

        </div>



        <br>
        <hr>
        <br>
    </div>
<script>document.getElementById('asignaturas').addEventListener('change', function() {
        $idclase=this.value;
       window.location = '/calificables?ider='+$idclase;
    });
</script>

@endsection