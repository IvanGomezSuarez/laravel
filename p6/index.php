<?php

include ('config.php'); 
include ('funciones.php');

if (isset($_POST['exit']) && ($_POST['exit']=='Salir')){
    salir();
}

/* definimos tipo de usuario por defecto*/
if(!isset($_SESSION['rol'])){
    $_SESSION['rol']='visitor';
}


/* detecta si hemos logeado como admin*/
if (($_SESSION['rol']=='admin')){
    include VIEW.'_indexView.php'; 
}

/* detecta si hemos logeado como estudiante*/

if (($_SESSION['rol']=='student')){
    include VIEW.'_studentAdminView.php'; 
}

/* indica si hemos de ir a pagina registro */

if (    (isset($_GET['pag'])&&($_GET['pag']=='registrar'))||($_SESSION['rol']=='registrar')){
    include VIEW.'_registerView.php'; 

}


/* si no, somos usuario de entrada, visitors */
if ($_SESSION['rol']=='visitor'){
       include VIEW.'_loginView.php'; 

}

    

