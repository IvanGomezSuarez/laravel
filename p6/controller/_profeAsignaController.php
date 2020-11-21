<?php
$reload = false;
if (isset($_POST['asignacion'])){
        $arr = explode('|', $_POST['asignacion']);

    if( count($arr) == 2 ) {
       $idteacher = $arr[0];
       $idclass = $arr[1];
   }
    
    
    desasignaProfe($idteacher,$idclass);
//     header("Location: ?pag=_profeAsignaView.php");
         $reload=true;

}


if (isset($_POST['profesor']) && isset($_POST['clase'])){
    
    
    empareja($_POST['profesor'], $_POST['clase']);
  //   header("Location: ?pag=_profeAsignaView.php");
        $reload=true;

}