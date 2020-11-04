<?php 
include "../conexion.php";
    if(!empty($_POST))
    {
        $alert='';
        if(empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['dni']) || empty($_POST['email'])
        || empty($_POST['username']))
        {
            $alert='<p class="msg_error">Todos los campos son obligatorios</p>';// funciona bien
        }else{
            //include "../conexion.php";
            $iduser = $_POST['idusuario'];
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellido'];
            $dni = $_POST['dni'];
            $correo = $_POST['email'];
            $nomusuario = $_POST['username'];
            $pass = md5($_POST['password']);

            //echo "SELECT * FROM users_admin WHERE dni = '$dni' ";

            $query = mysqli_query($conection,"SELECT * FROM users_admin 
                                                        WHERE (username = '$nomusuario' AND  id_user_admin != $iduser)
                                                        OR (name ='$nombre' AND id_user_admin != $iduser) ");
            $result = mysqli_fetch_array($query);
            
            if($result > 0){
                $alert= '<p class="msg_error">El usuario ya existe.</p>';//no me funciona ya que duplica las entradas
            }else{

                if(empty($_POST['password']))
                {
                    $sql_update = mysqli_query($conection, "UPDATE users_admin 
                                                            SET id_user_admin='$iduser', name='$nombre',surname = '$apellidos',dni='$dni',email='$correo',username='$nomusuario'
                                                            WHERE id_user_admin=$iduser ");

                }else{
                    $sql_update = mysqli_query($conection, "UPDATE users_admin 
                    SET id_user_admin='$uduser', name='$nombre',surname = '$apellidos',dni='$dni',email='$correo',username='$nomusuario',password='$pass'
                    WHERE id_user_admin=$iduser ");
                }

                /*$query_insert = mysqli_query($conection, "INSERT INTO users_admin(username,name,surname,dni,email,pass) 
                VALUES('$nomusuario','$nombre','$apellidos','$dni','$correo','$pass')");*/

                if($sql_update){
                    $alert='<p class="msg_save">Usuario actualiado correctamente</p>';
                }else{
                    $alert='<p class="msg_error">Error al actualiar el usuario</p>';
                }
            }
        }
    }
    // mostrar datos
    if(empty($_GET['id']))
    {
        header('Location: listado_usuarios.php');
    }

    $iduser = $_GET['id'];
    $sql= mysqli_query($conection,"SELECT u.email,u.dni,u.name,u.surname,u.username FROM users_admin u WHERE id_user_admin = $iduser ");
    $result_sql = mysqli_num_rows($sql);

    if($result_sql == 0){
        header('Location: listado_usuarios.php');
    }else{
      while($data = mysqli_fetch_array($sql)){
          $dni        = $data['dni'];
          $nombre     = $data['name'];
          $apellidos  = $data['surname'];
          $nomusuario = $data['username'];
          $correo = $data['email'];
      }  
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <?php include "includes/scripts.php"; ?>
	<title>Editar Usuario</title>
</head>
<body>
	<?php include "includes/header.php"; ?>	
	<section id="container">
		<div class="form_register">
            <h1>Editar Usuario Administrador</h1>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert :''; ?></div>

            <form action="" method="post">
            <input type="hidden" name="idusuario" value="<?php echo $iduser; ?>">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $nombre;?>">
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" id="apellido" placeholder="Apellido" value="<?php echo $apellidos;?>">
            <label for="dni">DNI</label>
            <input type="text" name="dni" id="dni" placeholder="dni" value="<?php echo $dni;?>">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="email" value="<?php echo $correo;?>">
            <label for="username">Nombre de usuario</label>
            <input type="text" name="username" id="username" placeholder="Nombre de usuario" value="<?php echo $nomusuario;?>">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" placeholder="password">
            <input type="submit" value="Guardar cambios" class="btn_save">
            </form>
        </div>
	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>