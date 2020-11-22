<?php
include MOD.'_profesoresModel.php';
include CONT.'_profesoresController.php';
?>
<br><br>
<div class="container">
    <h3>Edición de Profesores</h3>
    <hr>
    <br>
    <div class="row">
        <div class="col-md-4">
             <form class="asignatio" action="?pag=_profesoresView.php" method="post">
                <div class="form-group editasign">
                    <label class=" mb-3" for="exampleFormControlSelect1"><?php if($editamos){ ?>Editar Profesor<?php } else { ?>Crear Profesor<?php } ?></label>
                        <?php if ($editamos){ ?>
                            <input type="hidden" name="id" value="<?php echo $editoProfesor[1]->id_teacher; ?>">
                        <?php  } ?>
                        
                            <div class=" mb-2">
                                <label>Nombre</label>
                                <input required type="text" class="form-control" name="name" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1" value="<?php if ($editamos){echo $editoProfesor[1]->name; }?>">                
                            </div>
                            <div class=" mb-2">
                                 <label>Apellidos</label>
                                <input required type="text" class="form-control" name ="surname" placeholder="Apellidos" aria-label="Apellidos" aria-describedby="basic-addon1" value="<?php if ($editamos){echo $editoProfesor[1]->surname; }?>">
                            </div>
                            <div class=" mb-2">
                                 <label>Teléfono</label>
                                <input required type="text" class="form-control" name="telephone" placeholder="Telefono" aria-label="Telefono" aria-describedby="basic-addon1" value="<?php if ($editamos){echo $editoProfesor[1]->telephone; }?>">
                            </div>
                            <div class=" mb-2">
                                <label>Nif</label>
                                <input required type="text" class="form-control" name="nif" placeholder="NIF" aria-label="NIF" aria-describedby="basic-addon1" value="<?php if ($editamos){echo $editoProfesor[1]->nif; }?>"></div>
                            <div class=" mb-3">
                                <label>Email</label>
                                <input required type="text" class="form-control" name="email" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" value="<?php if ($editamos){echo $editoProfesor[1]->email; }?>">
                            </div>
                            
                           
                           
                       
                       
                       
                       
                        <?php if($editamos){ ?>
                            <input type="submit" name="accion" value="Edita" class="btn btn-primary mb-2">
                        <?php }else{ ?>  
                            <button type="submit" class="btn btn-primary mb-2">Crear Profesor</button>
                        <?php } ?>
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <form class="asignatio" action="?pag=_profesoresView.php" method="post">
                <div class="form-group editasign">
                    <label for="exampleFormControlSelect1">Listado de Profesores Ivan</label>
                    <select size="10" name="borra-id-profs"  class="form-control" id="exampleFormControlSelect1" multiple>
                        <?php
                        for ( $a = 1; $a<$totalProfesores; $a++){?>
                            <option value="<?php echo $arrayProfes[$a]->id_teacher ?>"><span><?php echo $arrayProfes[$a]->name.'</span> '.$arrayProfes[$a]->surname.' / tel: '.$arrayProfes[$a]->telephone.' / Nif: '.$arrayProfes[$a]->nif.' / @: '.$arrayProfes[$a]->email ?></option>    
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
?>