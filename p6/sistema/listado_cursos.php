<?php
include "../conexion.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include "includes/scripts.php"; ?>
	<title>Listado de cursos</title>
</head>
<body>
	<?php include "includes/header.php"; ?>	
	<section id="container">
        <h1>Listado de cursos</h1>
        <a href="registro_cursos.php" class="btn_new">Crear curso</a>
        <table>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Fecha de inicio</th>
                <th>Fecha de fin</th>
                <th>Acciones</th>
            </tr>
            <?php
            
            $query = mysqli_query($conection, "SELECT id_course,name,description,date_start,date_end FROM courses WHERE active = 1 ORDER BY id_course ASC");
            $result = mysqli_num_rows($query);
            if($result > 0){
                while ($data = mysqli_fetch_array($query)){
            ?>
                <tr>
                    <td><?php echo $data["id_course"]; ?></td>
                    <td><?php echo $data["name"]; ?></td>
                    <td><?php echo $data["description"]; ?></td>
                    <td><?php echo $data["date_start"]; ?></td>
                    <td><?php echo $data["date_end"]; ?></td>
                    <td>
                        <a class="link_edit" href="edit_curso.php?id=<?php echo $data["id_course"];?>">Editar</a>

                        <?php if($data["id_course"] !=1){ ?>
                        |
                        <a class="link_delete" href="delete_course.php?id=<?php echo $data["id_course"];?>">Eliminar</a>
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