<?php
include MOD.'_studAsignaturasModel.php';
include CONT.'_studAsignaturasController.php';
?>
<br>
<div class="container-fluid">

    Listado asignaturas con sus profesores pertenencientes al curso que se ha matriculado el alumno
    
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