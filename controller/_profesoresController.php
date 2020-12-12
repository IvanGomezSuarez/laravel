<?php
$reload=false;
/* detecta si queremos borrar */
if ( (isset($_POST['borra-id-profs'])) && (!isset($_POST['edita'])) ){
    borraProfesor($_POST['borra-id-profs']);
    $reload=true;
}

/* dettecta si queremos editar */
if ( (isset($_POST['borra-id-profs'])) &&  (isset($_POST['edita']))){

    $editoProfesor = editoProfesor($_POST['borra-id-profs']);
    $editamos = true;
    
}else{
    $editamos=false;
}


/* Creamos profesor */
if ((isset($_POST['name'])) && (isset($_POST['surname'])) && (isset($_POST['telephone'])) && (isset($_POST['nif'])) && (isset($_POST['email'])) && (!isset($_POST['accion']))  ) {

    generaProfesor($_POST['name'],$_POST['surname'],$_POST['telephone'],$_POST['nif'],$_POST['email']);
    $reload=true;

}


if ( (isset($_POST['accion'])) && ($_POST['accion']=='Edita') ){
    
    actualizaProfesor($_POST['name'],$_POST['surname'],$_POST['telephone'],$_POST['nif'],$_POST['email'],$_POST['id']);
    $reload=true;

}
?>
