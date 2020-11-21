<?php


function salir(){
    foreach($_SESSION as $key => $value){
        $_SESSION[$key] = NULL;
    }
      foreach($_POST as $key => $value){
        $_POST[$key] = NULL;
    }
      foreach($_GET as $key => $value){
        $_GET[$key] = NULL;
    }
    session_destroy();
    
    header("Location: index.php");
    
}