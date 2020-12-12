<?php

/* MUESTRA TODOS LOS ALUMNOS QUE QUEDAN POR ASIGNAR CURSO. seleccionamos todos los estudiantes cuyo id no aparece en idstudent de enrollment */ 
function alumnosSinCurso(){
    $conn = conectar();
    $out[] = '';
    $sql = "SELECT * FROM students WHERE id NOT IN(SELECT id_student FROM enrollment)";
    $result = mysqli_query($conn, $sql);
   while($resultado=mysqli_fetch_object($result)){
        $out[]=$resultado;
    }

    desconectar($conn);
return $out;       
    
}

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


function uneAlumnoCurso ($idalumn,$idcurso){
   
    $conn = conectar();
    $sql = "INSERT INTO enrollment (id_student, id_course) VALUES ('$idalumn','$idcurso')";
    $result = mysqli_query($conn, $sql);
    
    desconectar($conn);

}

function alumnoxID ($id){
    
    $conn = conectar();
    $out[]='';
    $sql="SELECT name,surname,nif FROM students WHERE id ='$id' ";
    $result = mysqli_query($conn, $sql);
    while($resultado=mysqli_fetch_object($result)){
        $out[]=$resultado;
    }

    desconectar($conn);

    return $out;       
    
}


function cursoxID ($id){

    $conn = conectar();
    $out[]='';
    $sql="SELECT name FROM courses WHERE id_course ='$id' ";
    $result = mysqli_query($conn, $sql);
    while($resultado=mysqli_fetch_object($result)){
    $out[]=$resultado;
    }
    desconectar($conn);

    return $out;       
    
    
}

function cargaMatriculas(){
    $conn = conectar();
    $out[]='';
    $sql="SELECT * FROM enrollment";
    $result = mysqli_query($conn, $sql);
    while($resultado=mysqli_fetch_object($result)){
    $out[]=$resultado;
    }

    desconectar($conn);
    return $out;       
}


/* borra un alumno pasando su id*/

function borraMatricula($id){
    $conn = conectar();
    $sql = "DELETE FROM enrollment WHERE id_enrollment='$id'";
    $result = mysqli_query($conn, $sql);
    
    desconectar($conn);
}



$arrayAlumnosSinCurso = alumnosSinCurso();
$totalAlumnosSinCurso = sizeof($arrayAlumnosSinCurso);


$arrayCursos = cargamosCursos();
$totalCursos = sizeof($arrayCursos);

$arrayMatriculas = cargaMatriculas();
$totalMatriculas = sizeof($arrayMatriculas);

