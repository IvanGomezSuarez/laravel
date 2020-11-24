<?php
$reload = false;

/* comprobamos si he activado el forumario de crear asignatura*/
if ( isset($_POST['name']) && isset($_POST['color']) && !isset($_POST['accion'])) {
    generaAsignatura($_POST['name'],$_POST['color']);
   // header("Location: ?pag=_asignaturasView.php");
    $reload=true;
}




if ( (isset($_POST['borra-id-asigns'])) &&  (isset($_POST['borra']))){
     borraAsignatura($_POST['borra-id-asigns']);
 
    $lista =idteacherfromidclass($_POST['borra-id-asigns']);
   
    $idprofesor=$lista[1]->id_teacher;
    print_r($idprofesor);
    unasignateacher($idprofesor);
   $reload=true;

}

if ( (isset($_POST['borra-id-asigns'])) &&  (isset($_POST['edita']))){

    $editoAsignatura = editamosAsignatura($_POST['borra-id-asigns']);
    $editamos = true;
    
}else{
    $editamos=false;
}

if ( (isset($_POST['accion'])) && ($_POST['accion']=='Edita') ){
    actualizAsignatura($_POST['name'], $_POST['color'], $_POST['id']);
       //  header("Location: ?pag=_asignaturasView.php");
        $reload=true;


}