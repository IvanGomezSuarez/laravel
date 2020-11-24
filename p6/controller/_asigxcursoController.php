<?php
$reload = false;
if (isset($_POST['asignacion'])){
        $arr = explode('|', $_POST['asignacion']);

    if( count($arr) == 2 ) {
       $idCourse = $arr[0];
       $idClase = $arr[1];
   }
    
    
    desasignaClase($idCourse,$idClase);
//     header("Location: ?pag=_profeAsignaView.php");
         $reload=true;

}

/*
if (isset($_POST['profesor']) && isset($_POST['clase'])){
    
   
        $reload=true;

}*/

if ( (isset($_POST['clase']) && (isset($_POST['curso'])) )    ){
    
    print_r($_POST);
    empareja($_POST['clase'], $_POST['curso']);
    $reload=true;
}