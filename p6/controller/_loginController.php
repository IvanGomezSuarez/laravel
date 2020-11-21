<?php
$reload=false;

/* nada hemos logueado*/
if (!isset($_POST['user']) && (!isset($_POST['pass'])) ){
    $_SESSION['rol']='visitor';
 
}else{


 /* hemos logueado algo, correcto o no, via post*/  
/* cmprobamos si lo logueado se encuentra en trabla estdiantes */    
$resultado = loguea_estudiante($_POST['user'],$_POST['pass']);

if (sizeof($resultado)==2){
   
    $_SESSION['student']=true;
    $_SESSION['admin']=false;
    $_SESSION['rol']='student';

    $_SESSION['id']= $resultado[1]->id;
    $_SESSION['username']= $resultado[1]->username;
    $_SESSION['pass']= $resultado[1]->pass;
    $_SESSION['email']= $resultado[1]->email;
    $_SESSION['name']= $resultado[1]->name;
    $_SESSION['surname']= $resultado[1]->surname;
    
    $reload=true;

}

/* cmprobamos si lo logueado se encuentra en trabla administradores */    
$resultadoAdmin = loguea_admin($_POST['user'],$_POST['pass']);

if (sizeof($resultadoAdmin)==2){
   
    $_SESSION['student']=false;
    $_SESSION['admin']=true;
    $_SESSION['rol']='admin';
 
    $_SESSION['id_user_admin'] = $resultadoAdmin[1]->id_user_admin;
    $_SESSION['username'] = $resultadoAdmin[1]->username;
    $_SESSION['name'] = $resultadoAdmin[1]->name;
    $_SESSION['email'] = $resultadoAdmin[1]->email;
    $_SESSION['password'] = $resultadoAdmin[1]->password;
    
    $reload=true;

}

}

if (!isset($_SESSION['rol'])){
    $_SESSION['rol']='visitor';
     $reload=true;
}

/* hemos logeado pero no existe en bs*/
if (isset($_POST['user']) && isset($_POST['pass']) && (sizeof($resultado)==1) && (sizeof($resultadoAdmin))==1){
    $_SESSION['rol']='registrar';
    $reload=true;

}

