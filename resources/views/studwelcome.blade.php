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
    @extends('layout')
    @section('content')


<?php
/**
 * Created by PhpStorm.
 * User: espileto
 * Date: 15/12/20
 * Time: 13:11
 */

?>
<div class="container">
    <br><br>
    <h3>Aplicativo del alumno</h3>
    <hr>

    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Hola, {{}}<?php// echo $nombreadmin; ?></h4>
        <p>Esta es tu área de estudiante, donde podrás ver los horarios de clase de las asignaturas pertenecientes a tu curso.</p>
        <hr>
        <?php
         /*   if ($size>1){

                if ($activo=='0'){ */?>
                    <p class="mb-0">Matriculado en <h4 ><?php // print_r($fichacurso[1]->name) ?>,</h4> pero este curso está desactivado por el momento..</p>
                <?php /**/ /* }else{ */ ?>
                    <p class="mb-0">Matriculado en <h4 ><?php // print_r($fichacurso[1]->name) ?></h4><h7><?php // print_r($fichacurso[1]->date_start.' al '.$fichacurso[1]->date_end); ?></h7></p>
                    <p class="mb-0"><?php // print_r($fichacurso[1]->description) ?> </p>

                    <br><br><hr>
                    <label>Asignaturas:</label>

                    <ul>
                        <?php
                            //   for ($a=1;$a<$totalAsignaturas;$a++){?>

                                <li style=' font-weight:500;'>
                                    <?php  // if (($arrayAsignaturas[$a]->id_teacher)!=NULL){ ?>
                                        <?php //  echo $arrayAsignaturas[$a]->name ?> -- Profesor: <?php //   print_r(cargamosProfesor($arrayAsignaturas[$a]->id_teacher)[1]->name); ?> <?php //  print_r(cargamosProfesor($arrayAsignaturas[$a]->id_teacher)[1]->surname);?> - <a href="mailto:<?php  // print_r(cargamosProfesor($arrayAsignaturas[$a]->id_teacher)[1]->email);?>"> <?php  // print_r(cargamosProfesor($arrayAsignaturas[$a]->id_teacher)[1]->email);?> </a>


                                    <?php //  } else { ?><?php //  echo $arrayAsignaturas[$a]->name ?> - Profesor no asignado <?php //  } ?>
                                </li>

                            <?php
                                //     }//for
                                //    ?>
                    </ul>

                <?php  // }
                    //  }else{ ?>
                <p class="mb-0">Estás dado de alta, pero aún no estás matriculado en ningún curso por el momento..</p>
            <?php
                //  }
        ?>
    </div>
</div>
@endsection


