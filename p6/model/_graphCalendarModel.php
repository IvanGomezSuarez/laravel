<?php

$idstud=$_SESSION['id'];


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


/* devuelve todas las ids de las clases de un curso */

function devuelveClasexIdCurso($idcurso){
    $conn = conectar();
    $out[]='';
    $sql = "SELECT id_class FROM  class WHERE id_course='$idcurso'";
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



/* importamos los nombres de las asignaturas */

function cargamosAsignaturas($id){
    $conn = conectar();
    $out[]='';
    $sql = "SELECT name,color FROM  class WHERE id_class='$id'";
   // $sql = "SELECT name,color FROM class INNER JOIN schedule ON class.id_class = schedule.id_class = '$id'";
    $result = mysqli_query($conn, $sql);
 while($resultado=mysqli_fetch_object($result)){
        $out[]=$resultado;
    }

    desconectar($conn);
return $out;       
    
}
/* importamos los nombres de las asignaturas */

function cargamosAsignaturasxIdCurso($id){
    $conn = conectar();
    $out[]='';
    $sql = "SELECT name,color FROM  class WHERE id_course='$id'";
   // $sql = "SELECT name,color FROM class INNER JOIN schedule ON class.id_class = schedule.id_class = '$id'";
    $result = mysqli_query($conn, $sql);
 while($resultado=mysqli_fetch_object($result)){
        $out[]=$resultado;
    }

    desconectar($conn);
return $out;       
    
}


/* proporciona estrings de meses */
function datemonthfin($mes){
   
    switch ($mes){
        case 1:
             $mesito='01/31';
            break;
         case 2:
             $mesito='02/28';
            break;
         case 3:
             $mesito='03/31';
            break;
         case 4:
             $mesito='04/30';
            break;
         case 5:
             $mesito='05/31';
            break;
         case 6:
             $mesito='06/30';
            break;
         case 7:
             $mesito='07/31';
            break;
         case 8:
             $mesito='08/31';
            break;
         case 9:
             $mesito='09/30';
            break;
         case 10:
             $mesito='10/31';
            break;
         case 11:
             $mesito='11/30';
            break;
         case 12:
             $mesito='12/31';
            break;
    }
    return $mesito;
    
}


function cargamosHorarioMes($datein,$dateout){
       
    $conn = conectar();
    $out[]='';
    $sql = "SELECT * FROM  schedule WHERE day > '$datein' AND day<= '$dateout' ORDER BY time_start ASC ";
    $result = mysqli_query($conn, $sql);
 while($resultado=mysqli_fetch_object($result)){
        $out[]=$resultado;
    }

    desconectar($conn);
return $out;       
    
}


$simatriculado = alumnoEnrolled($idstud);
$size= sizeof($simatriculado);