<?php

$pass=true;
$userocupado=false;
if  (isset($_POST['accion'])&& ($_POST['accion']=='Edita') ) {
  
    if($_POST['password']!=$_POST['passwordcomp']){
        $pass=false;
         $dangerpassword='alert alert-danger';
    }
    
    
    
    $hayuser = sizeof(compruebaUsuario($_POST['username']));
   
    if ($hayuser>1){
        if ($_SESSION['username']==$_POST['username']){
            $userocupado=false;
        }else{
        $userocupado=true;
        $dangeruser='alert alert-danger';
    }
    }
    
    if (!$userocupado && $pass){
        actualizaDatos($_POST['id'], $_POST['name'], $_POST['username'], $_POST['email'], $_POST['password']);
        $_SESSION['name']=$_POST['name'];
        $_SESSION['username']=$_POST['username'];

    }
    
    
    
    
}
