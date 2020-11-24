<?php

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

function idteacherfromidclass($id){
    
    $conn= conectar();
    $out[]='';
    $sql = 'SELECT id_teacher FROM class WHERE id_class="'.$id.'"';
    $result = mysqli_query($conn, $sql);
    while($resultado=mysqli_fetch_object($result)){
           $out[]=$resultado;
    }

    desconectar($conn);
    
    return $out;       
}

function unasignateacher($id){
    $conn = conectar();
    $sql = 'UPDATE teachers SET asignado=NULL WHERE id_teacher="'.$id.'"';
    $result = mysqli_query($conn, $sql);

    desconectar($conn);
}


function borraAsignatura($id){
    
    $conn = conectar();
    $sql = 'DELETE FROM  class WHERE id_class="'.$id.'"';
    $result = mysqli_query($conn, $sql);

    desconectar($conn);
    
    
    $conn = conectar();
    $sql2 = 'DELETE FROM  schedule WHERE id_class="'.$id.'"';
    $result = mysqli_query($conn, $sql2);

    desconectar($conn);
    

}



function generaAsignatura($nombre,$color){
    
    $conn = conectar();
    $sql = "INSERT INTO class (name, color) VALUES ('$nombre','$color')";
    $result = mysqli_query($conn, $sql);
    
    desconectar($conn);

}

function actualizAsignatura($nombre,$color,$id){
    
    $conn = conectar();
    $sql = "UPDATE class SET name='$nombre', color='$color' WHERE id_class='$id'";
    $result = mysqli_query($conn, $sql);
    
    desconectar($conn);

}


function editamosAsignatura($id){

    $conn = conectar();
     $out[]='';
     $sql = 'SELECT * FROM  class WHERE id_class="'.$id.'"';
     $result = mysqli_query($conn, $sql);
    while($resultado=mysqli_fetch_object($result)){
        $out[]=$resultado;
    }

    desconectar($conn);
    return $out;       

}


$totalAsignaturas = sizeof(cargamosAsignaturas());
$arrayAsignaturas = cargamosAsignaturas();
