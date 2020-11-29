<?php


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