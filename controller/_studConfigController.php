<?php


$pass=true;
$userocupado=false;

/* comprueba si hemos mandado formulario de edicion de estudiante */
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
    
    /* si no existe el nombre de usuario procedemos a actualizar al usuario*/
    if (!$userocupado && $pass){
        actualizaAlumno($_POST['id'],$_POST['username'],$_POST['password'],$_POST['email'],$_POST['name'],$_POST['surname'],$_POST['telefono'],$_POST['nif']);
        $_SESSION['name']=$_POST['name'];
        $_SESSION['username']=$_POST['username'];
        $_SESSION['surname']=$_POST['surname'];
        $_SESSION['telefono']=$_POST['telefono'];
        $_SESSION['nif']=$_POST['nif'];
        $_SESSION['email']=$_POST['email'];
        $_SESSION['pass']=$_POST['password'];
        
    }
    
   
    
    
 
    


    
    
}
