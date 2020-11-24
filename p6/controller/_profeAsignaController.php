<?php
$reload = false;
if (isset($_POST['asignacion'])){
        $arr = explode('|', $_POST['asignacion']);

    if( count($arr) == 2 ) {
       $idteacher = $arr[0];
       $idclass = $arr[1];
   }
    
    desasignaProfe($idteacher,$idclass);
    $reload=true;
}


if (isset($_POST['profesor']) && isset($_POST['clase'])){
    empareja($_POST['profesor'], $_POST['clase']);
    $reload=true;
}