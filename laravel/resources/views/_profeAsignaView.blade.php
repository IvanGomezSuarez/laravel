<?php
include MOD.'_profeAsignaModel.php';
include CONT.'_profeAsignaController.php';
?>
<br><br>
<div class="container">
    <h3>Asignación de Asignaturas</h3>
    <hr>
    <br>
    <div class="row">
        <div class="col-md-5">
            <form class="asignatio" action="?pag=_profeAsignaView.php" method="post">
                <div class="form-group  editasign">
                    <label for="exampleFormControlSelect1">Asginaciones</label>
                    <input type='hidden' name='idclass' value=''>
                    <select name='asignacion' size="10" class="form-control" id="exampleFormControlSelect1">
                        <?php 
                        if ($totalAsignaciones>0){
                            for ($a=1;$a<$totalAsignaciones;$a++){ ?>

                                <option value="<?php echo $arrayAsignaciones[$a]->id_teacher.'|'.$arrayAsignaciones[$a]->id_class; ?>"><?php echo $arrayAsignaciones[$a]->name.'--'.nombreProfID($arrayAsignaciones[$a]->id_teacher)[1]->name.' '.nombreProfID($arrayAsignaciones[$a]->id_teacher)[1]->surname ?></option>
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
        <div class="col-md-7">
            <form class="asignatio editasign" action="?pag=_profeAsignaView.php" method="post">
                <div class="row">
                     
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="exampleFormControlSelect1">Profesor</label>
                            <select name='profesor' class="form-control" id="exampleFormControlSelect1">
                              <?php
                                      if($totalProfesores>1){
                                      for ( $a = 1; $a<$totalProfesores; $a++){ ?>
                                          <option value="<?php echo $arrayProfes[$a]->id_teacher ?>"><?php echo $arrayProfes[$a]->name.' '.$arrayProfes[$a]->surname ?></option>    
                                      <?php }
                                      }else{?>
                                          <option value="">No quedan profesores docentes...</option>
                                        
                                          <?php 
                                      }
                                      ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Asignatura</label>
                            <select name="clase" class="form-control" id="exampleFormControlSelect1">
                                 <?php 
                                    if($totalSinAsignar>1){
                                    for ( $a = 1; $a<$totalSinAsignar; $a++){?>
                                        <option value="<?php echo $arraySinAsignar[$a]->id_class ?>"><?php echo $arraySinAsignar[$a]->name;?></option>    
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