<?php
include MOD.'_asigxcursoModel.php';
include CONT.'_asigxcursoController.php';
?>
<br><br>
<div class="container">
    <h3>Asignaturas por Cursos</h3>
    <hr>
    <br>
    <div class="row">
        <div class="col-md-6">
            <form class="asignatio" action="?pag=_asigxcursoView.php" method="post">
                <div class="form-group  editasign">
                    <label for="exampleFormControlSelect1">Asginaciones</label>
                    <input type='hidden' name='idclass' value=''>
                    <select name='asignacion' size="10" class="form-control" id="exampleFormControlSelect1">
                        <?php 
                        if ($totalAsignaciones>0){
                            for ($a=1;$a<$totalAsignaciones;$a++){ ?>

                        <option value="<?php echo $arrayAsignaciones[$a]->id_course.'|'.$arrayAsignaciones[$a]->id_class; ?>"><?php echo $arrayAsignaciones[$a]->name.'--'. nombreCursoID($arrayAsignaciones[$a]->id_course)[1]->name   ?></option>
                            <?php
                            }
                            }  else {
                        ?>
                                <option>nada</option>
                        <?php
                        } ?>

                    </select>
                    <br>
                    <button type="submit" class="btn btn-primary mb-2">Borrar Asignación</button>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <form class="asignatio editasign" action="?pag=_asigxcursoView.php" method="post">
                <div class="row">
                     
                   
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Asignatura</label>
                            <select name="clase" class="form-control" id="exampleFormControlSelect1">
                                 <?php 
                                   if  ($totalSinAsignar>1){
                                    for ( $a = 1; $a<$totalSinAsignar; $a++){?>
                                        <option value="<?php echo $arraySinAsignar[$a]->id_class ?>"><?php echo $arraySinAsignar[$a]->name;?></option>    
                                    <?php
                                        }
                                    
                                    }else{?>
                                          <option value="">No quedan asignaturas...</option>
                                        
                                          <?php 
                                      }
                                      ?>
                            </select>
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group ">
                            <label for="exampleFormControlSelect1">Curso</label>
                            <select name='curso' class="form-control" id="exampleFormControlSelect1">
                              <?php
                                      if($totalCursos>1){
                                      for ( $a = 1; $a<$totalCursos; $a++){ ?>
                                          <option value="<?php echo $arrayCursos[$a]->id_course ?>"><?php echo $arrayCursos[$a]->name ?></option>    
                                      <?php }
                                      }else{?>
                                          <option value="">No quedan cursos...</option>
                                        
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
<?php
if($reload){
echo '<script>location.reload();</script>';
}