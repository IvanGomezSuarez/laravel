<?php
include "../conexion.php";
//este post se ejecuta al pulsar aceptar
if(!empty($_POST)){

    //eliminamos la vulnerabilidad que permitiria eliminar el usuario master cambiando el id a 1 en el inspector hmtl
    if($_POST['idusuario'] ==1){
        header('Location: listado_usuarios.php');
        exit;
    }

    $idusuario= $_POST['idusuario'];
    //$query_delete = mysqli_query($conection, "DELETE FROM users_admin WHERE id_user_admin =$idusuario ");
    $query_delete = mysqli_query($conection, "UPDATE users_admin SET status = 0 WHERE id_user_admin = $idusuario ");

    if($query_delete){
        header('Location: listado_usuarios.php');
    }else{
        echo "Error al eliminar";
    }
}

//si el id en el request no existe nos redirije siempre al listado_usuarios
    if (empty($_REQUEST['id']) || $_REQUEST['id'] ==1 )
    {
        header('Location: listado_usuarios.php');
    }else{
    
        $idusuario = $_REQUEST['id'];

        $query = mysqli_query($conection,"SELECT u.name, u.username, u.dni FROM users_admin u WHERE u.id_user_admin = $idusuario ");
        $result = mysqli_num_rows($query);

        if($result >0){
            while($data = mysqli_fetch_array($query)){
                $name = $data['name'];
                $username = $data['username'];
                $dni = $data['dni'];
            }
        }else{
            header('Location: listado_usuarios.php');
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <?php include "includes/scripts.php"; ?>
    <link rel="stylesheet" type = "text/css" href="../sistema/css/styleDeleteAdmin.css">
	<title>Eliminar usuario</title>
</head>
<body>
	<?php include "includes/header.php"; ?>	
	<section id="container">
		<div class="data_delete">
            <h2>¿Está seguro de eliminar el siguiente resgistro?</h2>
            <p>Nombre: <span><?php echo $name; ?></span></p>
            <p>Nombre de usuario: <span><?php echo $username; ?></span></p>
            <p>DNI: <span><?php echo $dni; ?></span></p>

            <form method="post" action="">
            <input type="hidden" name="idusuario" value="<?php echo $idusuario; ?>">
                <a href="listado_usuarios.php" class="btn_cancel">Cancelar</a>
                <input type="submit" value="Aceptar" class="btn_ok">
            </form>
        </div>
	</section>



	
	<?php include "includes/footer.php"; ?>
</body>
</html>