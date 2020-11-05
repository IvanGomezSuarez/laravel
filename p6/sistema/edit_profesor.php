<?php 
include "../conexion.php";
    if(!empty($_POST))
    {
        $alert='';
        if(empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['dni']) || empty($_POST['email'])
        || empty($_POST['telephone']) || empty($_POST['password']))
        {
            $alert='<p class="msg_error">Todos los campos son obligatorios</p>';// funciona bien
        }else{
            //include "../conexion.php";
            $idteacher = $_POST['idteacher'];
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellido'];
            $dni = $_POST['dni'];
            $correo = $_POST['email'];
            $tel = $_POST['telephone'];
            $pass = md5($_POST['password']);
//comprobamos que los campos son distintos 
            $query = mysqli_query($conection,"SELECT * FROM teachers 
                                                        WHERE (nif = '$dni' AND  id_teacher != $idteacher)
                                                        OR (email ='$correo' AND id_user_admin != $idteacher) ");
            $result = mysqli_fetch_array($query);
            
            if($result > 0){
                $alert= '<p class="msg_error">El usuario ya existe.</p>';
            }else{

                if(empty($_POST['password']))
                {
                    $sql_update = mysqli_query($conection, "UPDATE teachers
                                                            SET id_teacher='$idteacher', name='$nombre',surname = '$apellidos',nif='$dni',email='$correo',telephone='$tel'
                                                            WHERE id_teacher=$idteacher ");

                }else{
                    $sql_update = mysqli_query($conection, "UPDATE teachers 
                                                            SET id_teacher='$uduser', name='$nombre',surname = '$apellidos',nif='$dni',email='$correo',telephone='$tel',password='$pass'
                                                            WHERE id_teacher=$idteacher ");
                }

                if($sql_update){
                    $alert='<p class="msg_save">Profesor actualizado correctamente</p>';
                }else{
                    $alert='<p class="msg_error">Error al actualizar el profesor</p>';
                }
            }
        }
    }
    // mostrar datos
    if(empty($_GET['id']))
    {
        header('Location: listado_profesores.php');
    }

    $iduser = $_GET['id'];
    $sql= mysqli_query($conection,"SELECT t.email,t.nif,t.name,t.surname,t.telephone FROM teachers t WHERE id_teacher = $idteacher ");
    $result_sql = mysqli_num_rows($sql);

    if($result_sql == 0){
       // header('Location: listado_profesores.php');
    }else{
      while($data = mysqli_fetch_array($sql)){
          $dni        = $data['nif'];
          $nombre     = $data['name'];
          $apellidos  = $data['surname'];
          $tel = $data['telephone'];
          $correo = $data['email'];
      }  
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <?php include "includes/scripts.php"; ?>
	<title>Editar Profesor</title>
</head>
<body>
	<?php include "includes/header.php"; ?>	
	<section id="container">
		<div class="form_register">
            <h1>Editar Profesor</h1>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert :''; ?></div>

            <form action="" method="post">
            <input type="hidden" name="idteacher" value="<?php echo $idteacher; ?>">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $nombre;?>">
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" id="apellido" placeholder="Apellido" value="<?php echo $apellidos;?>">
            <label for="telefono">Telefono</label>
            <input type="text" name="telefono" id="telefono" placeholder="Telefono" value="<?php echo $tel;?>">"
            <label for="dni">DNI</label>
            <input type="text" name="dni" id="dni" placeholder="dni" value="<?php echo $dni;?>">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="email" value="<?php echo $correo;?>">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" placeholder="password">
            <input type="submit" value="Guardar cambios" class="btn_save">
            </form>
        </div>
	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>