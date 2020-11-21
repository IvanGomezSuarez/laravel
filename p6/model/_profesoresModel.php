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

function cargamosProfesores(){
    $conn = conectar();
    $out[] = '';
    $sql = 'SELECT * FROM  teachers';
    $result = mysqli_query($conn, $sql);
   while($resultado=mysqli_fetch_object($result)){
        $out[]=$resultado;
    }

    desconectar($conn);
return $out;       
    
}

function borraProfesor($id){
    $conn = conectar();
    $sql = 'DELETE FROM  teachers WHERE id_teacher="'.$id.'"';
    $sql2 = 'UPDATE class SET id_teacher=NULL WHERE id_teacher="'.$id.'"';
    
    $result = mysqli_query($conn, $sql);
    desconectar($conn);
    $conn = conectar();
    $result2 =  mysqli_query($conn, $sql2);
    desconectar($conn);

    
}

function editoProfesor($id){
    $conn = conectar();
    $out[]='';
    $sql = "SELECT * FROM  teachers WHERE id_teacher='$id'";
    $result = mysqli_query($conn, $sql);
     while($resultado=mysqli_fetch_object($result)){
        $out[]=$resultado;
    }

    desconectar($conn);
return $out;       
    
    
   
  
    
    
}


function generaProfesor($nombre,$apellidos,$telefono,$nif,$email){
    $conn = conectar();
    $sql = "INSERT INTO teachers (name, surname, telephone, nif, email) VALUES ('$nombre','$apellidos','$telefono','$nif','$email')";
    $result = mysqli_query($conn, $sql);
    desconectar($conn);

}




function actualizaProfesor($nombre,$apellidos,$telefono,$nif,$email,$id){
    $conn = conectar();
    $sql = "UPDATE teachers SET name='$nombre', surname='$apellidos', telephone='$telefono', nif='$nif', email='$email' WHERE id_teacher='$id'";
    $result = mysqli_query($conn, $sql);
    desconectar($conn);

}






$arrayProfes = cargamosProfesores();
$totalProfesores = sizeof(cargamosProfesores());