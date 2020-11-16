<?php

//no funciona el require!!!
//echo  dirname(__FILE__);
//echo $_SERVER['DOCUMENT_ROOT'];
//require_once "../config/conectar.php";
//require_once 'sistema/config/conectar.php';
require_once $_SERVER['DOCUMENT_ROOT']."/laravel/p6/sistema/config/conectar.php";


class eventoCalendario extends conectar{
    private $idStudent;
    
    function __construct() {
        parent::__construct();        
    }
    
    function getCalendariobyId($idStudent) {
        
        $sql = "SELECT sc.id_schedule, cl.name, cl.color, sc.day, sc.time_start, sc.time_end  FROM students s
        INNER JOIN enrollment e ON s.id = e.id_student
        INNER JOIN courses c ON e.id_course = c.id_course
        INNER JOIN class cl ON c.id_course = cl.id_course
        INNER JOIN schedule sc ON cl.id_schedule = sc.id_schedule
        WHERE s.id = $idStudent";
        //echo var_dump($sql);

        $busca = $this->_db->query($sql);
        // $buscaStud = $this->_db->query($sqlStud);
        $events = mysqli_fetch_assoc($busca);
        echo var_dump($events);

        
        if($events){
            echo("estoy aqui");
            //session_start();
//            $events = mysqli_fetch_assoc($busca);
            return $events;
            $busca->close();
            $this->_db->close();                     
        } else {
            echo("no encuentro el calendario");
            return 0;
            
        }    
}}