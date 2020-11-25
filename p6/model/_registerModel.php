<?php
$usuario = $_SESSION;

function compruebaUsuario($user){
        $conn =  conectar();
        $out[]='';
        $sql = 'SELECT * FROM users_admin WHERE username="'.$user.'"';
       	$result = mysqli_query($conn, $sql);
        while($resultado=mysqli_fetch_object($result)){
            $out[]=$resultado;
        }
        desconectar($conn);
        return $out;
}

/* Crea un alumno desde el formulario*/
function generaAdmin($name,$email,$user,$pass){
    $conn = conectar();
    $sql = "INSERT INTO users_admin (username, name, email, password) VALUES ('$user','$name','$email','$pass')";
    $result = mysqli_query($conn, $sql);
    desconectar($conn);

}
