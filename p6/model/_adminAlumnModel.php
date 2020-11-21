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


/* devuelve TODOS los alumnos esixtentes */
function cargamosAlumnos(){
    $conn = conectar();
    $out[] = '';
    $sql = 'SELECT * FROM  students';
    $result = mysqli_query($conn, $sql);
   while($resultado=mysqli_fetch_object($result)){
        $out[]=$resultado;
    }

    desconectar($conn);
return $out;       
    
}


/* borra un alumno pasando su id*/

function borraAlumno($id){
    $conn = conectar();
    $sql = 'DELETE FROM  students WHERE id="'.$id.'"';
    $result = mysqli_query($conn, $sql);
    desconectar($conn);
}


/* devuelve un alumno seleccionado para poder editarlo */
function editoAlumno($id){
    $conn = conectar();
    $out[]='';
   $sql = "SELECT * FROM  students WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
     while($resultado=mysqli_fetch_object($result)){
        $out[]=$resultado;
    }
    desconectar($conn);
    return $out;       
 
}

/* Crea un alumno desde el formulario*/
function generaAlumno($nombre,$apellidos,$telefono,$nif,$email,$alfaday,$user,$pass){
    $conn = conectar();
    $sql = "INSERT INTO students (name, surname, telephone, nif, email, date_registered, username, pass) VALUES ('$nombre','$apellidos','$telefono','$nif','$email','$alfaday','$user','$pass')";
    $result = mysqli_query($conn, $sql);
    desconectar($conn);

}




function actualizaAlumno($id,$username,$pass,$email,$name,$surname,$telephone,$nif,$date_reistered){
    $conn = conectar();
    $sql = "UPDATE students SET id='$id', username='$username', pass='$pass', email='$email', name='$name', surname='$surname', telephone='$telephone', nif='$nif', date_registered='$date_reistered'  WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    desconectar($conn);

}






$arrayAlumnos = cargamosAlumnos();
$totalAlumnos = sizeof(cargamosAlumnos());