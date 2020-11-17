<?php
include "../conexion.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include "includes/scripts.php"; ?>
	<title>Listado de alumnos</title>
</head>
<body>
	<?php include "includes/header.php"; ?>	
	<section id="container">
        <h1>Listado de alumnos</h1>
        <a href="registro_alumno.php" class="btn_new">Crear alumno</a>
        <table>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Telefono</th>
                <th>Nombre de usuario</th>
                <th>Contraseña</th>
                <th>DNI</th>
                <th>email</th>
                <th>Fecha de registro</th>
                <th>Acciones</th>
            </tr>
            <?php
            
            $query = mysqli_query($conection, "SELECT id,name,surname,telephone,username,pass,nif,email,date_registered FROM students ORDER BY id");
            $result = mysqli_num_rows($query);
            if($result > 0){
                while ($data = mysqli_fetch_array($query)){
            ?>
                <tr>
                    <td><?php echo $data["id"]; ?></td>
                    <td><?php echo $data["name"]; ?></td>
                    <td><?php echo $data["surname"]; ?></td>
                    <td><?php echo $data["telephone"]; ?></td>
                    <td><?php echo $data["username"]; ?></td>
                    <td><?php echo $data["pass"]; ?></td>
                    <td><?php echo $data["nif"]; ?></td>
                    <td><?php echo $data["email"]; ?></td>
                    <td><?php echo $data["date_registered"]; ?></td>
                    <td>
                        <a class="link_edit" href="edit_alumno.php?id=<?php echo $data["id"];?>"><i class="fas fa-edit"></i></a>
                        |
                        <a class="link_delete" href="delete_alumno.php?id=<?php echo $data["id"];?>"><i class="fas fa-trash-alt"></i></a>
                        
                    </td>
                </tr>

            <?php
                }
            }
            ?>
        </table>
        </div>
	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>