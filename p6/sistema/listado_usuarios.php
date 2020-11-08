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
        <h1><i class="fas fa-users"></i> Listado de usuarios administradores</h1>
        <a href="registro_admin.php" class="btn_new"><i class="fas fa-users"></i> Crear usuario</a>
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
                        <a class="link_edit" href="edit_admin.php?id=<?php echo $data["id_user_admin"];?>"><i class="fas fa-edit"></i></a>

                        <?php if($data["id_user_admin"] !=1){ ?>
                        |
                        <a class="link_delete" href="delete_admin.php?id=<?php echo $data["id_user_admin"];?>"><i class="fas fa-trash-alt"></i></a>
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