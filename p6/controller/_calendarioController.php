<?php
$reload=false;
if (!isset($mantiene)){
$mantiene='';
}
$trash='<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg>';

/*borra horaro clase del final tabla*/
if (isset($_POST['erasethis'])){
  
    $id = $_POST['erasethis'];
    borraHorarioID($id);
    $reload=true;
}  


/* guarda horaio*/
if (isset($_POST['clase'])){
  
    $mantiene = $_POST['clase']; /* si hemos hecho una primera asignacion, mnatiene guarda la id de la clase para recargar el select con la misma asignatura*/
    
    guardaHorario($_POST['clase'],$_POST['dia'], $_POST['horaini'], $_POST['horafin']);/* hacemos el guardado propiamente dicho*/
    
}




if (isset($_GET['ider'])){
    $mantiene=$_GET['ider'];
    
}
/**/


/*
<form class="asignatio" action="?pag=_calendarioView.php" method="post">
 
                    <input type='hidden' name='idclass' value='asignamos'>
                    <select  name='clase' class="form-control mb-4" id="select" >
                        <?php 
                        if ($totalAsignaturas>0){
                                for ($a=1;$a<$totalAsignaturas;$a++){  
                                    if ($a==1){$elprimero=$arrayAsignaturas[$a]->id_class;}?>
                                    <option <?php  
                                    if (($mantiene==$arrayAsignaturas[$a]->id_class)){ 
                                        echo 'selected';
                                       
                                            $elprimero=$arrayAsignaturas[$a]->id_class;
                                                    
                                           
                                        
                                        }  ?> value="<?php  $arrayAsignaturas[$a]->id_class ?>"><?php echo $arrayAsignaturas[$a]->name. ' '.$arrayAsignaturas[$a]->id_class ?></option>
                   
                        <?php   }
                         }  else { ?>
                                     <option>nada</option>
                        <?php
                        }
                        ?>

                    </select>

                            <label for="entrada">Dia</label>
                            <input required name="dia" id="entrada" class="form-control" type="date"  >   
                   
                            <label for="entrada">Hora Inicio</label>
                            <input required name="horaini" id="entrada" class="form-control" type="time"  >   
                      
                            <label for="entrada">Hora Fin</label>
                             <input required name="horafin" class="form-control" type="time" >
                  
                    
               
           
                           <button type="submit" class="btn btn-primary mb-2 botonasignar">Asignar</button>
                      
     </form>
 * 
 * 
 */