<?php

/* Carga las asignaturas*/
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

$arrayAsignaturas = cargamosAsignaturas();
$totalAsignaturas = sizeof($arrayAsignaturas);


/* Muestra el horario de una clase*/
function horarioAsign($idclass){
    $conn = conectar();
    $out[]='';
    $sql = "SELECT * FROM  schedule WHERE id_class='$idclass'";
    $result = mysqli_query($conn, $sql);
 while($resultado=mysqli_fetch_object($result)){
        $out[]=$resultado;
    }

    desconectar($conn);
return $out;       
    
}



/* Borra el horario de una clase*/
function borraHorarioID($id){
    $conn = conectar();
    $sql = 'DELETE FROM  schedule WHERE id_schedule="'.$id.'"';
    $result = mysqli_query($conn, $sql);
    desconectar($conn);
}



/* Guarda horario*/

function guardaHorario($idclass,$dia,$horaini,$horafin){
    $conn = conectar();
    $sql = "INSERT INTO schedule (id_class, time_start, time_end, day) VALUES ('$idclass','$horaini','$horafin','$dia');";
    $result = mysqli_query($conn, $sql);
    
   // $idschedule=mysqli_insert_id($conn);
    desconectar($conn);

    //$conn = conectar();
    
   // $sql2 = "UPDATE class SET id_schedule='$idschedule' WHERE id_class='$idclass'";
   // $result = mysqli_query($conn, $sql2);
    
    //desconectar($conn);
}


function actualizAsignatura($nombre,$color,$id){
    
    $conn = conectar();
    $sql = "UPDATE class SET name='$nombre', color='$color' WHERE id_class='$id'";
    $result = mysqli_query($conn, $sql);
    
    desconectar($conn);

}





/*
function obtieneultimoIdschedule(){
     $conn = conectar();
     $sql="SELECT LAST_INSERT_ID()";
     $result = mysqli_query($conn, $sql);
    desconectar($conn);
    return $result;
}

 */