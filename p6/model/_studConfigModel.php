<?php 
$usuario = $_SESSION;

function compruebaUsuario($user){
        $conn =  conectar();
        $out[]='';
        $sql = 'SELECT * FROM students WHERE username="'.$user.'"';
       	$result = mysqli_query($conn, $sql);
        while($resultado=mysqli_fetch_object($result)){
            $out[]=$resultado;
        }
        desconectar($conn);
        return $out;
}



/* Atualiza los datos de alumno */
function actualizaAlumno($id,$username,$pass,$email,$name,$surname,$telephone,$nif){
    $conn = conectar();
    $sql = "UPDATE students SET id='$id', username='$username', pass='$pass', email='$email', name='$name', surname='$surname', telephone='$telephone', nif='$nif'  WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    desconectar($conn);

}


