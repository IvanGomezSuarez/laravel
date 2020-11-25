<?php

$nombreadmin= ucfirst($_SESSION['name']);



function alumnoEnrolled($idstud){
    $conn = conectar();
    $out[]='';
    $sql = "SELECT id_student FROM  enrollment WHERE id_student='.$idstud.'";
     $result = mysqli_query($conn, $sql);
    while($resultado=mysqli_fetch_object($result)){
        $out[]=$resultado;
    }

    desconectar($conn);
return $out;       
}



/* devuelve la id del curso del estudiante */
function idcursoxidstud($idstd){
    $conn = conectar();
    $out[]='';
    $sql = "SELECT id_course FROM  enrollment WHERE id_student='.$idstd.'";
     $result = mysqli_query($conn, $sql);
    while($resultado=mysqli_fetch_object($result)){
        $out[]=$resultado;
    }

    desconectar($conn);
return $out;       
}

function  fichaCursoxId($id){
    
    $conn = conectar();
    $out[]='';
    $sql = "SELECT name, description, date_start, date_end, active FROM  courses WHERE id_course='$id'";
     $result = mysqli_query($conn, $sql);
    while($resultado=mysqli_fetch_object($result)){
        $out[]=$resultado;
    }

    desconectar($conn);
return $out;       
    
}


/* devuelve nombre, color e idprofesor de las clases de un curso */

function devuelveClasexIdCurso($idcurso){
    $conn = conectar();
    $out[]='';
    $sql = "SELECT name,color,id_teacher FROM  class WHERE id_course='$idcurso'";
     $result = mysqli_query($conn, $sql);
    while($resultado=mysqli_fetch_object($result)){
        $out[]=$resultado;
    }

    desconectar($conn);
return $out;       
}



function cargamosProfesor($idprof){
    $conn = conectar();
    $out[] = '';
    $sql = "SELECT name, surname,email FROM  teachers WHERE id_teacher='$idprof'";
    $result = mysqli_query($conn, $sql);
   while($resultado=mysqli_fetch_object($result)){
        $out[]=$resultado;
    }

    desconectar($conn);
return $out;       
    
}


$idAlumno = $_SESSION['id'];

$simatriculado = alumnoEnrolled($idAlumno);
$size= sizeof($simatriculado);



if ($size>1){
     $idcurso= idcursoxidstud($_SESSION['id']);
  $idcurso = $idcurso[1]->id_course;
  $fichacurso = fichaCursoxId($idcurso);
  
  $totalAsignaturas = sizeof(devuelveClasexIdCurso($idcurso));
  $arrayAsignaturas = devuelveClasexIdCurso($idcurso);
          
  

$activo=$fichacurso[1]->active;

}
 