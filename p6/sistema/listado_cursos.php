<<<<<<< HEAD
<?php
include "../conexion.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include "includes/scripts.php"; ?>
	<title>Administracion</title>
</head>
<body>
	<?php include "includes/header.php"; ?>	
	<section id="container">
        <h1>Listado de cursos en activo</h1>
        <a href="registro_cursos.php" class="btn_new">Crear curso</a>
        <table>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Username</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
            <?php
            
            $query = mysqli_query($conection, "SELECT id_user_admin,name,surname,dni,username,email FROM users_admin WHERE status = 1 ORDER BY id_user_admin ASC");
            $result = mysqli_num_rows($query);
            if($result > 0){
                while ($data = mysqli_fetch_array($query)){
            ?>
                <tr>
                    <td><?php echo $data["id_user_admin"]; ?></td>
                    <td><?php echo $data["name"]; ?></td>
                    <td><?php echo $data["surname"]; ?></td>
                    <td><?php echo $data["dni"]; ?></td>
                    <td><?php echo $data["username"]; ?></td>
                    <td><?php echo $data["email"] ?></td>
                    <td>
                        <a class="link_edit" href="edit_admin.php?id=<?php echo $data["id_user_admin"];?>">Editar</a>

                        <?php if($data["id_user_admin"] !=1){ ?>
                        |
                        <a class="link_delete" href="delete_admin.php?id=<?php echo $data["id_user_admin"];?>">Eliminar</a>
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
=======
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
>>>>>>> ebf08ea0e90797e9fda3ec34011df406bbe19b22
</html>