<?php
$alert = '';
//OJO hay que hacer cambios para que se reconoca quien se loguea, si es profesor, alumno etc....
session_start();//inicialiamos la session

if(isset($_SESSION['role'])){
    if($_SESSION['role'] == "admin"){
        header('location: sistema/');
    } elseif($_SESSION['role'] == "student"){
        header('location: sistema/calendar.php');
    } elseif($_SESSION['role'] == "teacher"){
      header('location: sistema/espacioProfesor.php');
    }
}

if (isset($_POST["login"])) {
    //echo("esto esfadfadfa");
    if(empty($_POST['usuario']) || empty($_POST['clave'])) //comprueba que se haya escrito en los imputbox
        {
            $alert = "Ingrese su usuario y contraseña";
        }else{
            require_once 'sistema/base/usuario.php';
            $usuario = new usuario();
            $respuesta = $usuario->existeUsuario($_POST["usuario"],md5($_POST["clave"]));
            //echo $respuesta;exit;
            if ($respuesta==1) {
                $_SESSION['active'] = true;
                //$_SESSION['idusername'] = $data['id_user_admin'];
                //$_SESSION['nombreusuario'] = $data['username'];
                //$_SESSION['nombre'] = $data['name'];
                //$_SESSION['mail'] = $data['email'];
                //$_SESSION['passw'] = $data['password'];
                header('location: sistema/');
            }elseif($respuesta==2){
                $_SESSION['active'] = true;
                //$_SESSION['idusername'] = $data['id_user_admin'];
                //$_SESSION['nombreusuario'] = $data['username'];
                //$_SESSION['nombre'] = $data['name'];
                //$_SESSION['mail'] = $data['email'];
                //$_SESSION['passw'] = $data['password'];
                header('location: sistema/calendar.php');
            }elseif($respuesta==3){
                $_SESSION['active'] = true;
                //$_SESSION['idusername'] = $data['id_user_admin'];
                //$_SESSION['nombreusuario'] = $data['username'];
                //$_SESSION['nombre'] = $data['name'];
                //$_SESSION['mail'] = $data['email'];
                //$_SESSION['passw'] = $data['password'];
                header('location: sistema/espacioProfesor.php');{
                    
                }
                $alert = 'El usuario o la clave son incorrectos';
                session_destroy();
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type = "text/css" href="sistema/css/stylelogin.css">
</head>
<body>
    <section id="container">
        <form action ="" method="post">
            <h3>Iniciar sesion</h3>
         <img src="sistema/img/login.png" alt="login">
        <input type="text" name="usuario" placeholder="Usuario">
        <input type="password" name="clave" placeholder="Contraseña">
        <select style="visibility:hidden"> 
                <option name="curso" value="0">Seleccione:</option>
            <?php
            include 'conexion.php';
            // Realizamos la consulta para extraer los datos
                $query = mysqli_query($conection, " SELECT * FROM courses");
                while ($valores = mysqli_fetch_array($query)) {
            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                    echo '<option value="'.$valores[id_course].'">'.$valores[name].'</option>';
                }
                ?>
            </select>
        <div class="alert"><?php  echo isset($alert)? $alert : ''; ?></div>
        <input type="submit" name="login" value="INGRESAR">
        <p class="regtext">No estas registrado? <a href="sistema/registro.php" >Registrate Aquí</a>!</p>
        </form>
    </section>
</body>
</html>