<?php

require_once 'config.php';

class conectar {
    protected $_db;

    function __construct() {
        $this->_db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->_db->connect_errno) {
            die("echo <script>alert('NO HAY CONEXION CON LA BBDD, CONSULTE CON EL ADMINSTRADOR');window.location='./index.html';</script>;");
            return;
        }
        $this->_db->set_charset(DB_CHARSET);
        
    }

}
?>
