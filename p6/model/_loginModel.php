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


function loguea_estudiante($user,$pass){
        $conn =  conectar();
        $out[]='';
        $sql = 'SELECT * FROM students WHERE username="'.$user.'" AND pass="'.$pass.'"';
       	$result = mysqli_query($conn, $sql);
        while($resultado=mysqli_fetch_object($result)){
            $out[]=$resultado;
        }
        desconectar($conn);
        return $out;
}


function loguea_admin($user,$pass){
        $conn =  conectar();
        $out[]='';
        $sql = 'SELECT * FROM users_admin WHERE username="'.$user.'" AND password="'.$pass.'"';
       	$result = mysqli_query($conn, $sql);
        while($resultado=mysqli_fetch_object($result)){
            $out[]=$resultado;
        }
        desconectar($conn);
        return $out;
}
/*

function estoy(){
    return true;
}*/