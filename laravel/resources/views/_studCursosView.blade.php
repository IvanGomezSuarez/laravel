<?php
include MOD.'_studCursosModel.php'; 
include CONT.'_studCursosController.php';
?>
<br>
<div class="container-fluid">

Esta es la pagina de cursos
    
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