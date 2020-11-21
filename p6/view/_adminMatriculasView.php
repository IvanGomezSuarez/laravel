<?php
include MOD.'_adminMatriculasModel.php';
include CONT.'_adminMatriculasController.php';
?>
<br><br>
<div class="container">
    <h3>Matriculación de Alumnos en Cursos</h3>
    <hr>
    <br>
    <div class="row">
        <div class="col-md-12">
            <form class="asignatio" action="?pag=_adminMatriculasView.php" method="post">
                <div class="form-group  editasign">
                    <label for="exampleFormControlSelect1">Matriculaciones</label>
                    
                    <select size="10" name='asignacion'  class="form-control" id="exampleFormControlSelect1">
                        <?php 
                        if ($totalMatriculas>0){
                            for ($a=1;$a<$totalMatriculas;$a++){ ?>

                             <?php /* ?>   <option value="<?php echo $arrayMatriculas[$a]->id_student.'|'.$arrayMatriculas[$a]->id_course; ?>"><?php echo $arrayAsignaciones[$a]->name.'--'.nombreProfID($arrayAsignaciones[$a]->id_teacher)[1]->name.' '.nombreProfID($arrayAsignaciones[$a]->id_teacher)[1]->surname ?></option><?php */ ?>
                            <option value="<?php echo $arrayMatriculas[$a]->id_enrollment; ?>"><?php echo alumnoxID($arrayMatriculas[$a]->id_student)[1]->name.' '.alumnoxID($arrayMatriculas[$a]->id_student)[1]->surname.' '.alumnoxID($arrayMatriculas[$a]->id_student)[1]->nif.'<--->'. cursoxID($arrayMatriculas[$a]->id_course)[1]->name ?></option>

                            <?php
                            }
                            }  else {
                        ?>
                                <option>nada</option>
                        <?php
                        } ?>

                    </select>
                    <br>
                    <button type="submit" class="btn btn-primary mb-2">Borrar Matrícula</button>
                </div>
            </form>
        </div>
       
    </div><!--/row -->
    <div class="row">
         <div class="col-md-12 ">
            <form class="asignatio editasign" action="?pag=_adminMatriculasView.php" method="post">
                <div class="row">
                     
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="exampleFormControlSelect1">Alumnos sin matricular</label>
                            <select name='alumno' class="form-control" id="exampleFormControlSelect1">
                              <?php
                                      if($totalAlumnosSinCurso>1){
                                      for ( $a = 1; $a<$totalAlumnosSinCurso; $a++){ ?>
                                          <option value="<?php echo $arrayAlumnosSinCurso[$a]->id ?>"><?php echo $arrayAlumnosSinCurso[$a]->name.' '.$arrayAlumnosSinCurso[$a]->surname.' '.$arrayAlumnosSinCurso[$a]->nif ?></option>    
                                      <?php }
                                      }else{?>
                                          <option value="">No...</option>
                                        
                                          <?php 
                                      }
                                      ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Curso</label>
                            <select name="curso" class="form-control" id="exampleFormControlSelect1">
                                 <?php 
                                    if($totalCursos>1){
                                    for ( $a = 1; $a<$totalCursos; $a++){?>
                                        <option value="<?php echo $arrayCursos[$a]->id_course ?>"><?php echo $arrayCursos[$a]->name;?></option>    
                                    <?php
                                    }
                                    }else{ ?>
                                          <option value="">No hay asignaturas, hay que crearlas</option>

                                          <?php
                                          }
                                    ?>
                            </select>
                        </div>
                    </div>
               
                </div>
                 <div class="row">
                     <div class="col-md-12">
                            <div class="form-group">
                           <button type="submit" class="btn btn-primary mb-2 botonasignar">Matricular</button>
                        </div>
                     </div>
                     
                </div>
            </form>
        </div>
    </div><!--/row-->
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
if($reload){
echo '<script>location.reload();</script>';
}