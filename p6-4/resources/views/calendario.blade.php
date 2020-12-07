@extends('layout')
@section('content')

    <br><br>
    <div class="container">
        <h3>Horario</h3>
        <hr>
        <br>
        <form class="asignatio" action="?pag=_calendarioView.php" method="post">
            <div class="row asignatio">
                <div class="col-md-7">

                    <div class="form-group  editasign">
                        <label for="">Asignatura</label>

                        <input type='hidden' name='idclass' value='asignamos'>
                        <select  name='clase' class="form-control mb-4" id="select" >
                            <?php

                             //   if ($totalAsignaturas>1){
                                //     for ($a=1;$a<$totalAsignaturas;$a++){  ?>

                                        <?php
                                            //   if (($mantiene=='')&&($a==1)){
                                            //     $elprimero=$arrayAsignaturas[$a]->id_class;
                                            //    $nombre=$arrayAsignaturas[$a]->name;

                                            //   }
                                            //   if (   ($mantiene!='') && (($arrayAsignaturas[$a]->id_class)==($mantiene)))  { ?>
                                            <option selected value="<?php  //   echo $arrayAsignaturas[$a]->id_class ?>"><?php  //  echo $arrayAsignaturas[$a]->name. ' '.$arrayAsignaturas[$a]->id_class ?></option>
                                            <?php

                                                //   $elprimero=$arrayAsignaturas[$a]->id_class;
                                                //   $nombre=$arrayAsignaturas[$a]->name;
                                                //   } else {
                                            ?>

                                            <option value="<?php   //  echo $arrayAsignaturas[$a]->id_class ?>"><?php  //  echo $arrayAsignaturas[$a]->name. ' '.$arrayAsignaturas[$a]->id_class ?></option>

                                        <?php      //    }
                                            //  }                         }  else { ?>
                                    <option>No hay asignaturas...</option>
                                    <?php
                                        //  $elprimero =0;

                                        //  }
                            ?>

                        </select>

                    </div>

                </div>
                <div class="col-md-5 ">
                    <div class="editasign">
                        <div class=" mb-4 ">

                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <label for="entrada">Dia</label>
                                    <input required name="dia" id="entrada" class="form-control" type="date"  >
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="entrada">Hora Inicio</label>
                                    <input required name="horaini" id="entrada" class="form-control" type="time" min="08:00" max="20:00" step="1800" list="limiteini" >
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
                                    <input required name="horafin" class="form-control" type="time" min="09:00" max="21:00" step="1800" list="limitefin">
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
                                    <button type="submit" class="btn btn-primary mb-2 botonasignar">Asignar</button>
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

        <?php   //  $dias = sizeof(horarioAsign($elprimero));
            //  if ($dias>1){

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

                    <?php

                        //    for ($a=1;$a<$dias; $a++){
                            ?>
                            <tr>
                                <th scope="row"><?php  //  echo $a; ?></th>
                                <td><?php  //  echo horarioAsign($elprimero)[$a]->day ?></td>
                                <td><?php  //  echo horarioAsign($elprimero)[$a]->time_start ?></td>
                                <td><?php  //  echo horarioAsign($elprimero)[$a]->time_end ?></td>
                                <td><form name="borra" action="?pag=_calendarioView.php" method="post"><button type="submit" name="erasethis" value="<?php  //  echo horarioAsign($elprimero)[$a]->id_schedule?>"> <?php  //  echo $trash; ?> </button></form></td>
                            </tr>

                        <?php  //  } ?>


                    </tbody>
                </table>
            <?php // } ?>

    </div>
    <script>
        document.getElementById('select').addEventListener('change', function() {
            $idclase=this.value;
            window.location = "?pag=_calendarioView.php&ider="+$idclase;
        });
    </script>
    <script>
        if (window.history.replaceState) { // verificamos disponibilidad
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
<?php
 //   if($reload){
   //     echo '<script>location.reload();</script>';
  //  }
?>

@endsection
