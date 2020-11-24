<?php
include MOD.'_cursosModel.php';
include CONT.'_cursosController.php';
?>
<br><br>
<div id='' class="container">
    <h3>Edición de cursos</h3>
    <hr>
    <br>
    <div class="row">
        <div class='col-md-5'>
             <form  class="asignatio" action="?pag=_cursosView.php" method="post">
                <div class="form-group editasign">
                    <label for="exampleFormControlSelect1"><?php if ($editamos) { ?>Editar Curso<?php }else { ?> Crear Curso<?php } ?></label>

                        <div class="input-group mb-3">
                            <?php if ($editamos){?>
                            <input type="hidden" name="id" value="<?php echo $cursoxID[1]->id_course; ?>">
                            <?php  }?>
                            <input autofocus="true" required type="text" class="form-control fullwidth" name="name" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1" value="<?php if ($editamos){echo $cursoxID[1]->name; }?>">
                            <br>
                            <div class="fdorm-group mb-3">
                                <label for="exampleFormControlTextarea1">Descripcion</label>
                                <textarea required class="form-control" id="exampleFormControlTextarea1" cols="60" rows="5" name="description"><?php if($editamos){echo $cursoxID[1]->description;} ?></textarea>
                            </div>
                            <div class="fdorm-group row mb-3">
                                <div class="col-sm-6">
                                    <label for="exampleFormControlTextarea1">Inicio</label>
                                    <input required type="date" class="form-control fullwidth" id="exampleFormControlTextarea1" name="alfaday" placeholder="Dia inicio" value="<?php if($editamos){echo $cursoxID[1]->date_start;}?>" >
                                </div>
                                <div class="col-sm-6">
                                    <label for="exampleFormControlTextarea1">Finaliza</label>
                                    <input  required type="date" class="form-control fullwidth" id="exampleFormControlTextarea1" name="omegaday" placeholder="Dia final" value="<?php if($editamos){echo $cursoxID[1]->date_end;}?>">
                                </div>    
                             </div>
                             <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <label class="input-group-text" for="inputGroupSelect01">Activo</label>
                                </div>
                                <select class="custom-select" name="active" id="inputGroupSelect01">
                                  
                                  <?php if ($editamos){ ?>  
                                    <option >Elegir...</option>
                                        <?php if ($cursoxID[1]->active==1){ ?>
                                        <option selected  value="1">Si</option>
                                        <option value="0">No</option>
                                  <?php }else{ ?>
                                        <option  value="1">Si</option>
                                        <option selected value="0">No</option>
                                  
                                  <?php  } 
                                  }else{ ?>
                                         <option >Elegir...</option>
                                          <option  value="1">Si</option>
                                           <option value="0">No</option>
                                  <?php    
                                  }
                                  ?>
                                </select>
                            </div>
                        </div>
                        <?php
                        if ($editamos){
                        ?>
                        <input type="submit" name="accion" value="Edita" class="btn btn-primary mb-2">        

                        <?php }else{ ?>
                        <button type="submit" class="btn btn-primary mb-2">Crear Curso</button>
                        <?php } ?>
                </div>
            </form>
        </div>
        <div class="col-md-7">
             <form class="asignatio" action="?pag=_cursosView.php" method="post">

                <div class="form-group editasign">
                    <label for="exampleFormControlSelect1">Lista de Cursos</label>
                    <select name="idcourse" size="10" class="form-control" id="exampleFormControlSelect1">
                        <?php
                        for ( $a = 1; $a<$totalCursos; $a++){?>
                            <option value="<?php echo $arrayCursos[$a]->id_course; ?>"><?php echo $arrayCursos[$a]->name; ?> <?php if(($arrayCursos[$a]->active)=='1'){echo '- Activo';}else{ echo '- No Activo';} ?></span></option>    
                        <?php
                        }
                        ?>


                    </select>
                    <br>
                    <input type="submit" name="edita" value="Edita" class="btn btn-primary mb-2">          
                    <input type="submit" name="borra" value="Borra" class="btn btn-primary mb-2">                        

                </div>
            </form>
            
            
        </div>     
    </div>
    
    
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
?>