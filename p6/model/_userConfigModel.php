<?php
//$usuario = $_SESSION;
$rol = $_SESSION['rol'];
//echo $rol;

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


function compruebaUsuario($user){
        $conn =  conectar();
        $out[]='';
        if($GLOBALS['rol']=='student'){
                $sql = 'SELECT * FROM students WHERE username="'.$user.'"';

        }elseif($GLOBALS['rol']=='admin'){
                $sql = 'SELECT * FROM users_admin WHERE username="'.$user.'"';
        }
        
       	$result = mysqli_query($conn, $sql);
        while($resultado=mysqli_fetch_object($result)){
            $out[]=$resultado;
        }
        desconectar($conn);
        return $out;
}

function actualizaDatos($id,$nombre,$user,$email,$password){
        $conn =  conectar();
        if($GLOBALS['rol']=='student'){
                //echo("soy estudiante");
                $sql = "UPDATE students SET username='$user', name='$nombre', email='$email', pass='$password' WHERE id='$id'";
                echo($id);

        }elseif($GLOBALS['rol']=='admin'){
                //echo("soy administrador");
                $sql = "UPDATE users_admin SET username='$user', name='$nombre', email='$email', password='$password' WHERE id_user_admin='$id'";
        }        
        $result = mysqli_query($conn, $sql);
        desconectar($conn);
}