@extends('layout')
@section('content')


    <br><br>
    <div class="container">

        <h3>Edición de Alumnos</h3>
        <hr>
        <br>
        <div class="row">
            <div class="col-md-4">
                <form class="asignatio" action="?pag=_adminAlumnView.php" method="post">
                    <div class="form-group editasign">
                        <label class=" mb-3" for="exampleFormControlSelect1"><?php // if($editamos){ ?>Editar Alumno<?php  // } else { ?>Crear Alumno<?php //  } ?></label>
                        <?php //  if ($editamos){ ?>
                            <input type="hidden" name="id" value="<?php //  echo $editoAlumno[1]->id; ?>">
                        <?php  //  } ?>

                        <div class=" mb-2">
                            <label>Nombre</label>
                            <input required type="text" class="form-control" name="name" placeholder="Nombre" value="<?php //  if ($editamos){echo $editoAlumno[1]->name; }?>">
                        </div>
                        <div class=" mb-2">
                            <label>Apellidos</label>
                            <input required type="text" class="form-control" name ="surname" placeholder="Apellidos" value="<?php  // if ($editamos){echo $editoAlumno[1]->surname; }?>">
                        </div>
                        <div class=" mb-2">
                            <label>Teléfono</label>
                            <input required type="text" class="form-control" name="telephone" placeholder="Telefono" value="<?php //  if ($editamos){echo $editoAlumno[1]->telephone; }?>">
                        </div>
                        <div class=" mb-2">
                            <label>Nif</label>
                            <input required type="text" class="form-control" name="nif" placeholder="NIF" value="<?php //  if ($editamos){echo $editoAlumno[1]->nif; }?>"></div>
                        <div class=" mb-3">
                            <label>Email</label>
                            <input required type="text" class="form-control" name="email" placeholder="Email" value="<?php //  if ($editamos){echo $editoAlumno[1]->email; }?>">
                        </div>
                        <div class=" mb-2">
                            <label>Usuario</label>
                            <input required type="text" class="form-control" name="user" placeholder="Usuario"  value="<?php //  if ($editamos){echo $editoAlumno[1]->username; }?>"></div>
                        <div class=" mb-3">
                            <label>Password</label>
                            <input id="password" data-toggle="password" required type="password" class="form-control" name="pass" placeholder="Password" value="<?php //  if ($editamos){echo $editoAlumno[1]->pass; }?>">



                        </div>
                        <div class=" mb-3">
                            <label>Desde</label>
                            <input required type="date"  class="form-control" name="alfaday"
                                   value="<?php
                                       //     if ($editamos) {
                                       //      $fechaold = $editoAlumno[1]->date_registered;
                                       //      $fechanew = substr($fechaold, 0 ,10);
                                       //      echo $fechanew;
                                       //  } else {
                                       //       echo date('Y-m-d'); }?>">
                        </div>






                        <?php //  if($editamos){ ?>
                            <input type="submit" name="accion" value="Edita" class="btn btn-primary mb-2">
                        <?php //  }else{ ?>
                            <button type="submit" class="btn btn-primary mb-2">Crear Alumno</button>
                        <?php //  } ?>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <form class="asignatio" action="?pag=_adminAlumnView.php" method="post">
                    <div class="form-group editasign">
                        <label for="exampleFormControlSelect1">Alumnos</label>
                        <select size="10" name="id-alumns"  class="form-control" id="exampleFormControlSelect1" multiple>
                            <?php
                                //    for ( $a = 1; $a<$totalAlumnos; $a++){?>
                                    <option value="<?php //  echo $arrayAlumnos[$a]->id ?>"><span><?php //  echo $arrayAlumnos[$a]->name.'</span> '.$arrayAlumnos[$a]->surname.' / Nif: '.$arrayAlumnos[$a]->nif.' / @: '.$arrayAlumnos[$a]->email ?></option>
                                <?php
                                    //     }
                            ?>
                        </select>
                        <br>
                        <input type="submit" name="edita" value="Edita" class="btn btn-primary mb-2">
                        <input type="submit" name="borra" value="Borra" class="btn btn-primary mb-2">
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
<?php
    //   if($reload){
    //     echo '<script>location.reload();</script>';
    //   }
?>


@endsection
