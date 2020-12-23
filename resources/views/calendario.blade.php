@extends('layout')
@section('content')

<?php
    use App\Models\Calendario;

    $asignaturas = App\Models\Asigxcurso::get();
  //  $profesores = App\Models\Profesor::get();
  //  $asignaturaAsigned = App\Models\Course::find(Request::get('idcourse'));
    $calendario = App\Models\Calendario::get();
    echo '<pre>';
     //print_r($calendario);
    echo '</pre>';
    $calenda = DB::select('select * from schedule where id_class=?', [Request::get('ider')]);



print_r($calenda);
?>



@foreach ($calendario as $calendario)
    @if (($calendario->id_class)==(Request::get('ider')))
        {{$calendario->id_class}}
    @endif
@endforeach

    <br><br>
    <div class="container">
        <h3>Horario</h3>
        <hr>
        <br>
        <form class="asignatio" action="" method="get">
            @csrf
            <div class="row asignatio">
                <div class="col-md-7">

                    <div class="form-group  editasign">
                        <label for="">Asignatura</label>

                        <input type='hidden' name='idclass' value='asignamos'>
                        <select  name='id_class' class="form-control mb-4" id="select" >

                            @foreach ($asignaturas as $asignatura)
                                <option @if (Request::get('ider')==$asignatura->id_class) selected @endif value="{{$asignatura->id_class}}">{{$asignatura->name}}</option>
                            @endforeach


                        </select>

                    </div>

                </div>
                <div class="col-md-5 ">
                    <div class="editasign">
                        <div class=" mb-4 ">

                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <label for="entrada">Dia</label>
                                    <input required name="day" id="entrada" class="form-control" type="date"  >
                                </div>
                            </div>

                            <div class="form-group row">
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



                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button formaction="/calendario/crea" type="submit" class="btn btn-primary mb-2 botonasignar">Asignar</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div><!/--row-->
        </form>
        <br>
        <hr>
        <br>

        <?php
          if (($calendario->count())>0){
          ?>

                <h4 class="mb-2"><?php  //  echo $nombre ?></h4>
                <hr>
                <table class="table table-bordered table-dark table-sm">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Días</th>
                        <th scope="col">Inicio</th>
                        <th scope="col">Finalizacion</th>
                        <th scope="col">Borrar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($calenda as $calendar)
                    <tr>
                        <th scope="row">{{$loop->index}}</th>
                        <td>{{$calendar->day}}</td>
                        <td>{{$calendar->time_start}}</td>
                        <td>{{$calendar->time_end}}</td>
                        <td><form name="borra" action="/calendario/borra" method="get">@csrf<button type="submit" name="erasethis" value="{{$calendar->id_schedule}}"><i class="fa fa-trash" aria-hidden="true"></i></button></form></td>
                    </tr>


                    @endforeach



                    </tbody>
                </table>
            <?php } ?>

    </div>
    <script>
        document.getElementById('select').addEventListener('change', function() {
            $idclase=this.value;
            window.location = "/calendario?ider="+$idclase;
        });
    </script>
    <script>
        if (window.history.replaceState) { // verificamos disponibilidad
            window.history.replaceState(null, null, window.location.href);
        }
    </script>


@endsection
