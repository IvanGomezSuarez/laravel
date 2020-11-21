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
    $sql = "SELECT * FROM  teachers WHERE asignado IS NULL";
    $result = mysqli_query($conn, $sql);
   while($resultado=mysqli_fetch_object($result)){
        $out[]=$resultado;
    }

    desconectar($conn);
return $out;       
    
}


function nombreProfID($id){
    $conn = conectar();
    $out[]='';
    $sql = "SELECT * FROM  teachers WHERE id_teacher = '$id'  ";
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

/* muestra asignaturas con profesor asignado */
function muestraAsignaciones(){
     $conn = conectar();
     $out[]='';
     $sql = "SELECT * FROM  class WHERE id_teacher IS NOT NULL";
     $result = mysqli_query($conn, $sql);
      while($resultado=mysqli_fetch_object($result)){
        $out[]=$resultado;
    }

    desconectar($conn);
return $out;       
}

/* muestra asignaturas SIN profesor asignado */
function muestraSinAsignar(){
     $conn = conectar();
     $out[]='';
     $sql = "SELECT * FROM  class WHERE id_teacher IS NULL";
     $result = mysqli_query($conn, $sql);
      while($resultado=mysqli_fetch_object($result)){
        $out[]=$resultado;
    }

    desconectar($conn);
return $out;       
}


/* Desahce asignacion PROFESOR - ASIGNATURA */
function desasignaProfe($idteacher,$idclass){
    
      $conn = conectar();
      $sql = "UPDATE class SET id_teacher=NULL WHERE id_teacher='$idteacher' AND id_class='$idclass'";
      $sql2 = "UPDATE teachers SET asignado=NULL WHERE id_teacher='$idteacher'";
      $result = mysqli_query($conn, $sql);
      desconectar($conn);
      $conn = conectar();
      $result2 = mysqli_query($conn, $sql2);
      desconectar($conn);
}

/* Hace emparejamiento PROFESOR - ASIGMATURA */
function empareja($profesor, $clase){
     $conn = conectar();
     $sql = "UPDATE class SET id_teacher='$profesor' WHERE id_class='$clase'";
     $sql2 = 'UPDATE teachers SET asignado=1 WHERE id_teacher="'.$profesor.'"';
     $result = mysqli_query($conn, $sql);
     desconectar($conn);
     $conn = conectar();
     $result2 = mysqli_query($conn, $sql2);
     desconectar($conn);
     
}



$totalAsignaciones = sizeof(muestraAsignaciones());
$arrayAsignaciones = muestraAsignaciones();

$arraySinAsignar = muestraSinAsignar();
$totalSinAsignar = sizeof(muestraSinAsignar());


$arrayProfes = cargamosProfesores();
$totalProfesores = sizeof(cargamosProfesores());

$arrayAsignaturas = cargamosAsignaturas();
$totalAsignaturas = sizeof(cargamosAsignaturas());