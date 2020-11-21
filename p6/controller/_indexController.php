<?php
if (isset($_GET['pag'])){
    $pagina = $_GET['pag'];
     
    $id=$pagina;
    switch ($id){
        case "_asignaturasView.php":
            $id='admin';
        break;
    case "_cursosView.php":
            $id='admin';
        break;
    case "_profesoresView.php":
            $id='admin';
        break;
    case "_profeAsignaView.php":
            $id='admin';
        break;
      case "_calendarioView.php":
            $id='admin';
        break;
      case "_userConfigView.php":
            $id='admin';
        break;
     case "_adminAlumnView.php":
            $id='admin';
        break;
     case "_adminMatriculasView.php":
            $id='admin';
        break;
     case "_asigxcursoView.php":
            $id='admin';
        break;
        default:
            $id='white';
        
    }
    
}else{
    $pagina='_welcome.php';  

}
