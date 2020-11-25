<?php
$reload = false;


/* comprobar si se ha mandado formulario con opcion edita de lista de cursos*/
if ( (isset($_POST['idcourse'])) && (isset($_POST['edita'])) && ($_POST['edita']=='Edita' )){
   
        
        $cursoxID = cargaCursoxID($_POST['idcourse']);
     
        $editamos=true;
        
        // print_r($cursoxID);
        

}else{
    $editamos=false;

    
}


/* comprobar si se ha mandado formulario con opcion borra de lista de cursos*/
if ( (isset($_POST['idcourse'])) && (isset($_POST['borra'])) && ($_POST['borra']=='Borra' )) {
    
    borraCurso($_POST['idcourse']);
    /*borrarCursoenClass()*/
    
    $reload=true;
}


/* comprobar si he mandado formulario con opcion crear de curso */
if (  (isset($_POST['name'])) && (isset($_POST['description'])) && (isset($_POST['alfaday'])) && (isset($_POST['omegaday'])) && (!isset($_POST['accion']))      ){
    generaCurso($_POST['name'], $_POST['description'], $_POST['alfaday'], $_POST['omegaday'], $_POST['active']);
  
 $reload=true;
}

/* comprobar si actualizamos curso */
if (  (isset($_POST['accion']))  && ($_POST['accion']=='Edita') ){
    
    
    actualizaCurso($_POST['name'], $_POST['description'], $_POST['alfaday'], $_POST['omegaday'], $_POST['active'], $_POST['id']);
    
    $reload=true;
}