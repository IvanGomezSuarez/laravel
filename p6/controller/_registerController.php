<?php
 $classAlertPass='';
$classAlertUser='';
$regok=false;
$reload=false;
if ( (isset($_GET['pag']) && ( $_GET['pag']=='back'))  ){
    salir();
}

    




if (isset( $_POST['email']) &&isset($_POST['name']) && isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['pass2']) ){
    
    $user=$_POST['user'];
    $resultado=compruebaUsuario($user);
    $pas1=$_POST['pass'];
    $pas2=$_POST['pass2'];
    
    
    if (sizeof($resultado) >1){
       echo '<script>alert("Usuario ya registrado");</script>';
       $classAlertUser='alert alert-danger';
    }elseif($pas1!=$pas2){
       echo '<script>alert("Las contraseñas no coinciden");</script>';
       $classAlertPass='alert alert-danger';
   }else{
      
       $nombre=$_POST['name'];
       $user=$_POST['user'];
       $pass=$_POST['pass'];
       $email=$_POST['email'];
       generaAdmin($nombre, $email, $user, $pass);
       $regok=true;
       $reload=true;
    }
    
}