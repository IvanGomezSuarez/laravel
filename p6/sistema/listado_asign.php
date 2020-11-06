<?php
include "../conexion.php";
//no esta acabado, se hará cuando funcione el registro.

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include "includes/scripts.php"; ?>
	<title>Listado de asignaturas</title>
</head>
<body>
	<?php include "includes/header.php"; ?>	
	<section id="container">
        <h1>Listado de asiganturas</h1>
        <a href="registro_asig.php" class="btn_new">Crear asignatura</a>
        <table>
            <tr>
                <th>Id</th>
                <th>Profesor</th>
                <th>Nombre</th>
                <th>Curso aplicable</th>
                <th>Horario</th>
                <th>Color asociado</th>
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
                        <a class="link_edit" href="edit_course.php?id=<?php echo $data["id_course"];?>">Editar</a>
                        |
                        <a class="link_delete" href="delete_course.php?id=<?php echo $data["id_course"];?>">Eliminar</a>
                        
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