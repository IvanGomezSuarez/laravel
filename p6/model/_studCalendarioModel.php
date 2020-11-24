<?php
$reload=false;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function cargamosHorarios($idStudent){
       
    $conn = conectar();
    $out[]='';
    $sql = 'SELECT sc.id_schedule, cl.name, cl.color, sc.day, sc.time_start, sc.time_end  FROM students s
    INNER JOIN enrollment e ON s.id = e.id_student
    INNER JOIN courses c ON e.id_course = c.id_course
    INNER JOIN class cl ON c.id_course = cl.id_course
    INNER JOIN schedule sc ON cl.id_class = sc.id_class
    WHERE s.id ="'.$idStudent.'"';
    $result = mysqli_query($conn, $sql);
    while($resultado=mysqli_fetch_object($result)){
        $out[]=$resultado;
    }

    desconectar($conn);
    return $out;       
    
}

