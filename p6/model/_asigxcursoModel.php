<?php

function nombreCursoID($id){
    $conn = conectar();
    $out[]='';
    $sql = "SELECT * FROM  courses WHERE id_course = '$id'  ";
    $result = mysqli_query($conn, $sql);
    while($resultado=mysqli_fetch_object($result)){
        $out[]=$resultado;
    }

    desconectar($conn);
return $out;         
}



/* carga todas las asignaturas*/
function cargamosAsignaturas(){
    $conn = conectar();
    $out[]='';
    $sql = 'SELECT * FROM  class';
    $result = mysqli_query($conn, $sql);
    while($resultado=mysqli_fetch_object($result)){
        $out[]=$resultado;
    }

    desconectar($conn);
return $out;       
}


/* carga todas las cursos */
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



/* muestra asignaturas con curso asignado */
function muestraAsignaciones(){
     $conn = conectar();
     $out[]='';
     $sql = "SELECT * FROM  class WHERE id_course!='0'";
     $result = mysqli_query($conn, $sql);
      while($resultado=mysqli_fetch_object($result)){
        $out[]=$resultado;
    }

    desconectar($conn);
return $out;       
}

/* muestra asignaturas SIN curso asignado */

function muestraSinAsignar(){
     $conn = conectar();
     $out[]='';
     $sql = "SELECT * FROM  class WHERE id_course='0'";
     $result = mysqli_query($conn, $sql);
      while($resultado=mysqli_fetch_object($result)){
        $out[]=$resultado;
    }

    desconectar($conn);
return $out;       
}


/* Desahce asignacion PROFESOR - ASIGNATURA */


function desasignaClase($idcurso,$idclase){
    
      $conn = conectar();
      $sql = "UPDATE class SET id_course='0' WHERE id_class='$idclase'";
   //   $sql2 = "UPDATE teachers SET asignado=NULL WHERE id_teacher='$idteacher'";
      $result = mysqli_query($conn, $sql);
      desconectar($conn);
//      $conn = conectar();
  //    $result2 = mysqli_query($conn, $sql2);
     // desconectar($conn);
}



/* Hace emparejamiento PROFESOR - ASIGMATURA */
function empareja($clase, $curso){
     $conn = conectar();
     $sql = "UPDATE class SET id_course='$curso' WHERE id_class='$clase'";
     //$sql2 = 'UPDATE teachers SET asignado=1 WHERE id_teacher="'.$profesor.'"';
     $result = mysqli_query($conn, $sql);
     desconectar($conn);
     //$conn = conectar();
     //$result2 = mysqli_query($conn, $sql2);
     //desconectar($conn);
     
}



$totalAsignaciones = sizeof(muestraAsignaciones());
$arrayAsignaciones = muestraAsignaciones();



$arraySinAsignar = muestraSinAsignar();
$totalSinAsignar = sizeof(muestraSinAsignar());



$arrayCursos = cargamosCursos();
$totalCursos = sizeof(cargamosCursos());

$arrayAsignaturas = cargamosAsignaturas();
$totalAsignaturas = sizeof(cargamosAsignaturas());