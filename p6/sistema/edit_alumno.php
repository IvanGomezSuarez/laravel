<?php 
// se ha de adaptar pero no hasta que no se haga el listado_asign
include "../conexion.php";
    if(!empty($_POST))
    {
        $alert='';
        if(empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['dni']) || empty($_POST['email'])
        || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['telefono']) || empty($_POST['start']))
        {
            $alert='<p class="msg_error">Todos los campos son obligatorios</p>';// funciona bien
        }else{
            //include "../conexion.php";
            $iduser = $_POST['id'];
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellido'];
            $dni = $_POST['dni'];
            $correo = $_POST['email'];
            $nomusuario = $_POST['username'];
            $pass = md5($_POST['password']);
            $tel = $_POST['telefono'];
            $dregister = $_POST['start'];

//comprobamos que los campos son distintos 
            $query = mysqli_query($conection,"SELECT * FROM students
                                                        WHERE (dni = '$dni' AND  id != $iduser)
                                                        OR (email ='$correo' AND id != $iduser) ");
            $result = mysqli_fetch_array($query);
            
            if($result > 0){
                $alert= '<p class="msg_error">El alumno ya existe.</p>';//no me funciona ya que duplica las entradas
            }else{

                if(empty($_POST['password']))
                {
                    $sql_update = mysqli_query($conection, "UPDATE students
                                                            SET id='$iduser', name='$nombre',surname = '$apellidos',dni='$dni',email='$correo',username='$nomusuario',password='$pass',telephone='$tel',date_registered='$dregister'
                                                            WHERE id =$iduser ");

                }else{
                    $sql_update = mysqli_query($conection, "UPDATE students
                                                            SET id='$iduser', name='$nombre',surname = '$apellidos',dni='$dni',email='$correo',username='$nomusuario',password='$pass',telephone='$tel',date_registered='$dregister'
                                                            WHERE id =$iduser ");
                }

                if($sql_update){
                    $alert='<p class="msg_save">Alumno actualiado correctamente</p>';
                }else{
                    $alert='<p class="msg_error">Error al actualiar al alumno</p>';
                }
            }
        }
    }
    // mostrar datos
    if(empty($_GET['id']))
    {
        header('Location: listado_alumnos.php');
    }

    $iduser = $_GET['id'];
    $sql= mysqli_query($conection,"SELECT * FROM students WHERE id = $iduser ");
    $result_sql = mysqli_num_rows($sql);

    if($result_sql == 0){
        header('Location: listado_alumnos.php');
    }else{
      while($data = mysqli_fetch_array($sql)){
          $dni        = $data['nif'];
          $nombre     = $data['name'];
          $apellidos  = $data['surname'];
          $nomusuario = $data['username'];
          $correo = $data['email'];
          $tel = $data['telephone'];
          $dregister = $data['date_registered'];
      }  
    }
    //echo $dregister;exit; para mostrar la fecha de registro


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <?php include "includes/scripts.php"; ?>
	<title>Editar alumno</title>
</head>
<body>
	<?php include "includes/header.php"; ?>	
	<section id="container">
		<div class="form_register">
            <h1>Editar alumno</h1>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert :''; ?></div>

            <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $iduser; ?>">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $nombre;?>">
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" id="apellido" placeholder="Apellido" value="<?php echo $apellidos;?>">
            <label for="dni">DNI</label>
            <input type="text" name="dni" id="dni" placeholder="dni" value="<?php echo $dni;?>">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="email" value="<?php echo $correo;?>">
            <label for="dni">Telefono</label>
            <input type="text" name="telefono" id="telefono" placeholder="telefono" value="<?php echo $tel;?>">
            <label for="username">Nombre de usuario</label>
            <input type="text" name="username" id="username" placeholder="Nombre de usuario" value="<?php echo $nomusuario;?>">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" placeholder="password">
            <label for="start">Fecha de registro:</label>
            <input type="date" id="start" name="start"  value="<?php echo $dregister;?>">
            <input type="submit" value="Guardar cambios" class="btn_save">
            </form>
        </div>
	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>