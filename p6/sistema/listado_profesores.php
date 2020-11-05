<?php
include "../conexion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include "includes/scripts.php"; ?>
	<title>Lista profesores</title>
</head>
<body>
	<?php include "includes/header.php"; ?>	
	<section id="container">
        <h1>Listado de profesores</h1>
        <a href="registro_profesor.php" class="btn_new">Dar de alta a profesor</a>
        <table>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Telefono</th>
                <th>DNI</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
            <?php
            
            $query = mysqli_query($conection, "SELECT id_teacher,name,surname,telephone,nif,email FROM teachers WHERE status = 1 ORDER BY id_teacher ASC");
            $result = mysqli_num_rows($query);
            if($result > 0){
                while ($data = mysqli_fetch_array($query)){
            ?>
                <tr>
                    <td><?php echo $data["id_teacher"]; ?></td>
                    <td><?php echo $data["name"]; ?></td>
                    <td><?php echo $data["surname"]; ?></td>
                    <td><?php echo $data["telephone"]; ?></td>
                    <td><?php echo $data["nif"]; ?></td>
                    <td><?php echo $data["email"] ?></td>
                    <td>
                        <a class="link_edit" href="edit_profesor.php?id=<?php echo $data["id_teacher"];?>">Editar</a>

                        <?php if($data["id_teacher"] !=1){ ?>
                        |
                        <a class="link_delete" href="delete_profesor.php?id=<?php echo $data["id_teacher"];?>">Eliminar</a>
                        <?php } ?>
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