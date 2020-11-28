<?php
include MOD.'_asignaturasModel.php';
include CONT.'_asignaturasController.php';
?>
<br><br>
<div id="adminasign" class="container">
    <h3>Edición de asignaturas</h3>
    
    <hr>
    <br>
    <div class="row">
        <div class="col-md-4">
            <form  class="asignatio" action="?pag=_asignaturasView.php" method="post">
                <div class="form-group editasign">
                    <label for="exampleFormControlSelect1"><?php if ($editamos) { ?>Editar Asignatura<?php }else { ?> Crear Asignatura<?php } ?></label>

                        <div class="input-group mb-3">
                            <?php if ($editamos){  ?>
                            <input type="hidden" name="id" value="<?php echo $editoAsignatura[1]->id_class; ?>">
                            <?php  }?>
                            <input autofocus="true" required type="text" class="form-control fullwidth" name="name" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1" value="<?php if ($editamos){echo $editoAsignatura[1]->name; }?>">
                            <br>
                            <label for="favcolor">Elegir color :  </label>
                            <input  class="form-control asign color" type="color" id="favcolor" name="color" value="<?php if ($editamos){echo $editoAsignatura[1]->color; }?>">
                        </div>
                    
                        
               
                    
                    
                        <?php
                        if ($editamos){
                        ?>
                        <input type="submit" name="accion" value="Edita" class="btn btn-primary mb-2">        

                        <?php }else{ ?>
                        <button type="submit" class="btn btn-primary mb-2">Crear Asignatura</button>
                        <?php } ?>
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <form class="asignatio" action="?pag=_asignaturasView.php" method="post">

                <div class="form-group editasign">
                    <label for="exampleFormControlSelect1">Lista de Asignaturas</label>
                    <select name="borra-id-asigns" size="10" class="form-control" id="exampleFormControlSelect1">
                        <?php
                        for ( $a = 1; $a<$totalAsignaturas; $a++){?>
                           
                            <option style="color:<?php echo $arrayAsignaturas[$a]->color; ?>; font-weight:900;" value="<?php echo $arrayAsignaturas[$a]->id_class; ?>"><?php echo $arrayAsignaturas[$a]->name; ?></span></option>    
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
    <br>
    <hr>
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