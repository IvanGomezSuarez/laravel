<?php
$reload = false;
/*if (isset($_POST['asignacion'])){
        $arr = explode('|', $_POST['asignacion']);

    if( count($arr) == 2 ) {
       $idteacher = $arr[0];
       $idclass = $arr[1];
   }
    
    
    //desasignaProfe($idteacher,$idclass);
//     header("Location: ?pag=_profeAsignaView.php");
         $reload=true;

}
*/

if ( isset($_POST['alumno']) && isset($_POST['curso']) ){
    
    uneAlumnoCurso($_POST['alumno'], $_POST['curso']);
 
    $reload=true;
}



if (isset($_POST['asignacion'])){
    borraMatricula($_POST['asignacion']);
        $reload=true;

    
}