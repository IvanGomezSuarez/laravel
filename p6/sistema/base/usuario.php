<?php

require_once 'sistema/config/conectar.php';


class usuario extends conectar{
    private $nombre;
    private $clave;
    
    function __construct() {
        parent::__construct();        
    }
    
    function existeUsuario($nombre,$clave) {
        $sqlAdmin = "SELECT * FROM users_admin WHERE username='$nombre' and password='$clave'";
        $sqlStud = "SELECT * FROM students WHERE username='$nombre' and pass='$clave'";
        $buscaAdmin = $this->_db->query($sqlAdmin);
        $buscaStud = $this->_db->query($sqlStud);
        
        if(mysqli_num_rows($buscaAdmin)==1){
            //session_start();
            $_SESSION['nombreusuario'] = $nombre;
            $_SESSION['role'] = "admin";
            return 1;
            $buscaAdmin->close();
            $this->_db->close();           
        } elseif (mysqli_num_rows($buscaStud)==1){
            $_SESSION['nombreusuario'] = $nombre;
            $_SESSION['role'] = "student";
            return 2;
            $buscaStud->close();
            $this->_db->close();           
        } else {
            return 0;
    }    
}}