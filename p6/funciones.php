<?php

function conectar() {
	$out =  mysqli_connect(HOST_DB, USER_DB, PASS_DB, NAME_DB);
        
        if ($out->connect_error){
            die("Conexion fallida:".$out->connect_error);
        }
return $out;
}

function desconectar($conexion) {
	mysqli_close($conexion);
}




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


function pre($var){
$out='<pre>'.$var.'</pre>';
return $out;

}