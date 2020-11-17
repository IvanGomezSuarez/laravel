<?php


//echo  dirname(__FILE__);

require_once $_SERVER['DOCUMENT_ROOT']."/laravel/p6/sistema/config/conectar.php";


class usuario extends conectar{
    private $nombre;
    private $clave;
    
    function __construct() {
        parent::__construct();        
    }
    
    function existeUsuario($nombre,$clave) {
        $sqlAdmin = "SELECT * FROM users_admin WHERE username='$nombre' and password='$clave'";
        $sqlStud = "SELECT * FROM students WHERE username='$nombre' and pass='$clave'";
        $sqlTeacher = "SELECT * FROM teachers WHERE name='$nombre' and password='$clave'";
        $buscaAdmin = $this->_db->query($sqlAdmin);
        $buscaStud = $this->_db->query($sqlStud);
        $buscaTeacher = $this->_db->query($sqlTeacher);
        
        if(mysqli_num_rows($buscaAdmin)==1){
            $_SESSION['nombreusuario'] = $nombre;
            $_SESSION['role'] = "admin";
            $buscaAdmin->close();
            $this->_db->close();
            return 1;
        } elseif (mysqli_num_rows($buscaStud)==1){
            $_SESSION['nombreusuario'] = $nombre;
            $_SESSION['role'] = "student";
            $data = mysqli_fetch_array($buscaStud);
            $_SESSION['id'] = $data["id"];            
            $buscaStud->close();
            $this->_db->close();           
            return 2;
        } elseif (mysqli_num_rows($buscaTeacher)==1){
            $_SESSION['nombreusuario'] = $nombre;
            $_SESSION['role'] = "teacher";
            $buscaTeacher->close();
            $this->_db->close();  
            return 3;  
        }  else {     
            return 0;
   
        }    
}}