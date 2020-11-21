<?php
include MOD.'_studCalendarioModel.php';
include CONT.'_studCalendarioController.php';
?>
<br>
<div class="container-fluid">

Esta es la pagina de calendario
    
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