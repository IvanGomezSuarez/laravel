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
                <th>Curso </th>
                <th>Horario</th>
                <th>Color asociado</th>
                <th>Acciones</th>
            </tr>
            <?php
            
            $query = mysqli_query($conection, "SELECT c.id_class, c.name,c.color, co.id_course, s.id_schedule, t.id_teacher FROM class c 
                                                                                                                        INNER JOIN courses co ON c.id_course= co.id_course 
                                                                                                                        INNER JOIN schedule s ON c.id_schedule = s.id_schedule 
                                                                                                                        INNER JOIN teachers t ON c.id_teacher = t.id_teacher 
                                                                                                                        ORDER BY c.id_class ASC");
            $result = mysqli_num_rows($query);
            if($result > 0){
                while ($data = mysqli_fetch_array($query)){
            ?>
                <tr>
                    <td><?php echo $data["id_class"]; ?></td>
                    <td><?php echo $data["id_teacher"]; ?></td>
                    <td><?php echo $data["name"]; ?></td>
                    <td><?php echo $data["id_course"]; ?></td>
                    <td><?php echo $data["id_schedule"]; ?></td>
                    <td><?php echo $data["color"]; ?></td>
                    <td>
                        <a class="link_edit" href="edit_asign.php?id=<?php echo $data["id_class"];?>">Editar</a>
                        |
                        <a class="link_delete" href="delete_asign.php?id=<?php echo $data["id_class"];?>">Eliminar</a>
                        
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