<?php
include "../conexion.php";
//este post se ejecuta al pulsar aceptar
if(!empty($_POST)){

    //eliminamos la vulnerabilidad que permitiria eliminar el usuario master cambiando el id a 1 en el inspector hmtl
    if($_POST['idteacher'] ==1){
        header('Location: listado_profesores.php');
        exit;
    }

    $idteacher= $_POST['idteacher'];

    $query_delete = mysqli_query($conection, "UPDATE teachers SET status = 0 WHERE id_teacher = $idteacher ");

    if($query_delete){
        header('Location: listado_profesores.php');
    }else{
        echo "Error al eliminar";
    }
}

//si el id en el request no existe nos redirije siempre al listado_usuarios
    if (empty($_REQUEST['id']) || $_REQUEST['id'] ==1 )
    {
        header('Location: listado_profesores.php');
    }else{
    
        $idusuario = $_REQUEST['id'];

        $query = mysqli_query($conection,"SELECT t.name, t.email, t.dni FROM teachers t WHERE t.id_teacher = $idteacher ");
        $result = mysqli_num_rows($query);

        if($result >0){
            while($data = mysqli_fetch_array($query)){
                $name = $data['name'];
                $correo = $data['email'];
                $dni = $data['nif'];
            }
        }else{
            header('Location: listado_profesores.php');
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    
    <link rel="stylesheet" type = "text/css" href="../sistema/css/styleDeleteAdmin.css">
	<title>Eliminar profesor</title>
</head>
<body>
	<?php include "includes/header.php"; ?>	
	<section id="container">
		<div class="data_delete">
            <h2>¿Está seguro de eliminar el siguiente registro?</h2>
            <p>Nombre: <span><?php echo $name; ?></span></p>
            <p>Email: <span><?php echo $correo; ?></span></p>
            <p>DNI: <span><?php echo $dni; ?></span></p>

            <form method="post" action="">
            <input type="hidden" name="idteacher" value="<?php echo $idteacher; ?>">
                <a href="listado_profesores.php" class="btn_cancel">Cancelar</a>
                <input type="submit" value="Aceptar" class="btn_ok">
            </form>
        </div>
	</section>



	
	<?php include "includes/footer.php"; ?>
</body>
</html>