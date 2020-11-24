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

function actualizaDatos($id,$nombre,$user,$email,$password){
        $conn =  conectar();
        $sql = "UPDATE users_admin SET username='$user', name='$nombre', email='$email', password='$password' WHERE id_user_admin='$id'";
        $result = mysqli_query($conn, $sql);
        desconectar($conn);
}