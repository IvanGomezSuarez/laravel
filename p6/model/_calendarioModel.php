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
    $sql = "INSERT INTO schedule (id_class, time_start, time_end, day) VALUES ('$idclass','$horaini','$horafin','$dia')";
    $result = mysqli_query($conn, $sql);
    desconectar($conn);
}