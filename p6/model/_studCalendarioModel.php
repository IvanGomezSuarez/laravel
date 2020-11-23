<?php
//$reload=false;

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

function cargamosHorarios($idStudent){
       
    $conn = conectar();
    $out[]='';
    $sql = 'SELECT sc.id_schedule, cl.name, cl.color, sc.day, sc.time_start, sc.time_end  FROM students s
    INNER JOIN enrollment e ON s.id = e.id_student
    INNER JOIN courses c ON e.id_course = c.id_course
    INNER JOIN class cl ON c.id_course = cl.id_course
    INNER JOIN schedule sc ON cl.id_schedule = sc.id_schedule
    WHERE s.id ="'.$idStudent.'"';
    $result = mysqli_query($conn, $sql);
    while($resultado=mysqli_fetch_object($result)){
        $out[]=$resultado;
    }

    desconectar($conn);
    return $out;       
    
}
