<?php 
include MOD.'_studWelcomeModel.php';
include CONT.'_studWelcomeController.php';
?>
<div class="container">
    <br><br>
    <h3>Aplicativo del alumno</h3>
    <hr>
     
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Hola, <?php echo $nombreadmin; ?></h4>
        <p>Esta es tu área de estudiante, donde podrás ver los horarios de clase de las asignaturas pertenecientes a tu curso.</p>
        <hr>
        <?php 
        if ($size>1){

              if ($activo=='0'){ ?>
                  <p class="mb-0">Matriculado en <h4 ><?php print_r($fichacurso[1]->name) ?>,</h4> pero este curso está desactivado por el momento..</p>
              <?php }else{ ?>
                    <p class="mb-0">Matriculado en <h4 ><?php print_r($fichacurso[1]->name) ?></h4><h7><?php print_r($fichacurso[1]->date_start.' al '.$fichacurso[1]->date_end); ?></h7></p>
                    <p class="mb-0"><?php print_r($fichacurso[1]->description) ?> </p>  

                     <br><br><hr>
                     <label>Asignaturas:</label>

                     <ul>
                         <?php 
                         for ($a=1;$a<$totalAsignaturas;$a++){?>

                           <li style=' font-weight:500;'>
                                 <?php if (($arrayAsignaturas[$a]->id_teacher)!=NULL){ ?>
                                 <?php echo $arrayAsignaturas[$a]->name ?> -- Profesor: <?php  print_r(cargamosProfesor($arrayAsignaturas[$a]->id_teacher)[1]->name); ?> <?php print_r(cargamosProfesor($arrayAsignaturas[$a]->id_teacher)[1]->surname);?> - <a href="mailto:<?php print_r(cargamosProfesor($arrayAsignaturas[$a]->id_teacher)[1]->email);?>"> <?php print_r(cargamosProfesor($arrayAsignaturas[$a]->id_teacher)[1]->email);?> </a>       


                                 <?php } else { ?><?php echo $arrayAsignaturas[$a]->name ?> - Profesor no asignado <?php } ?>
                            </li>

                             <?php
                         }//for
                         ?>
                     </ul>

              <?php } 
        }else{ ?>
             <p class="mb-0">Estás dado de alta, pero aún no estás matriculado en ningún curso por el momento..</p>
        <?php   
        }
        ?>
     </div>
 </div>

