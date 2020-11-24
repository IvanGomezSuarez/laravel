<?php

$pass=true;
$userocupado=false;

/* comprueba si hemos mandado formulario de edicion de administrador */
if  (isset($_POST['accion'])&& ($_POST['accion']=='Edita') ) {
  
    
    /* comprueba que los paswords conicidan */
    if($_POST['password']!=$_POST['passwordcomp']){
        $pass=false;
         $dangerpassword='alert alert-danger';
    }
    
    
    /* Comprueba si ya existe ese usuario */
    $hayuser = sizeof(compruebaUsuario($_POST['username']));
   
    if ($hayuser>1){
        if ($_SESSION['username']==$_POST['username']){
            $userocupado=false;
        }else{
        $userocupado=true;
        $dangeruser='alert alert-danger';
    }
    }
    
    /* si no existe el usuario procedemos a actualizar al usuario*/
    if (!$userocupado && $pass){
        actualizaDatos($_POST['id'], $_POST['name'], $_POST['username'], $_POST['email'], $_POST['password']);
        $_SESSION['name']=$_POST['name'];
        $_SESSION['username']=$_POST['username'];

    }
    
    
    
    
}
