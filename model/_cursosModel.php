<?php


/* visulaizacion de todos los cursos */
function cargamosCursos(){
    $conn = conectar();
    $out[]='';
    $sql = 'SELECT * FROM  courses';
    $result = mysqli_query($conn, $sql);
 while($resultado=mysqli_fetch_object($result)){
        $out[]=$resultado;
    }

    desconectar($conn);
return $out;       
    
}

/* carga un curso pasando su Id*/
function cargaCursoxID ($id){
     $conn = conectar();
    $out[]='';
      $sql = 'SELECT * FROM  courses WHERE id_course="'.$id.'"';
    $result = mysqli_query($conn, $sql);
    while($resultado=mysqli_fetch_object($result)){
        $out[]=$resultado;
    }

    desconectar($conn);
return $out;       
    
}


/* borra un curso pasando su id */
function borraCurso($id){
    $conn = conectar();
    $sql = 'DELETE FROM courses  WHERE id_course="'.$id.'"';
    $result = mysqli_query($conn, $sql);
    desconectar($conn);
    $conn = conectar();
    $sql2 = 'UPDATE class SET id_course="0" WHERE id_course="'.$id.'"';
    $result = mysqli_query($conn, $sql2);
    desconectar($conn);
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





/* crea un curso nuevo */
function generaCurso($nombre,$descripcion,$alfadate,$omegadate,$active){

    $conn = conectar();
    $sql = "INSERT INTO courses (name, description, date_start, date_end, active) VALUES ('$nombre','$descripcion','$alfadate','$omegadate','$active')";
    $result = mysqli_query($conn, $sql);
    desconectar($conn);

}

/* actualiza un curso existente */
function actualizaCurso($nombre,$descripcion,$alfadate,$omegadate,$active,$id){
     $conn = conectar();
    $sql = "UPDATE courses SET name='$nombre', description='$descripcion', date_start='$alfadate', date_end='$omegadate', active='$active' WHERE id_course='$id'";
    $result = mysqli_query($conn, $sql);
    desconectar($conn);
    
}



$totalCursos = (sizeof(cargamosCursos()));

$arrayCursos = cargamosCursos();