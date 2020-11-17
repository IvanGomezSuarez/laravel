<?php

if (!empty($_POST)) {
    $alert = '';
    if (
        empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['telefono']) || empty($_POST['dni'])
        || empty($_POST['email']) || empty($_POST['password'])
    ) {
        $alert = '<p class="msg_error">Todos los campos son obligatorios</p>'; // funciona bien
    } else {
        include "../conexion.php";
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $tel = $_POST['telefono'];
        $dni = $_POST['dni'];
        $correo = $_POST['email'];
        $pass = md5($_POST['password']);

        //echo "SELECT * FROM users_admin WHERE dni = '$dni' ";
        $query = mysqli_query($conection, "SELECT * FROM teachers WHERE  telephone = '$tel' OR nif= '$dni' ");
        $result = mysqli_fetch_array($query);
        if ($result > 0) {
            $alert = '<p class="msg_error">El profesor ya existe.</p>'; //no me funciona ya que duplica las entradas
        } else {
            $query_insert = mysqli_query($conection, "INSERT INTO teachers(name,surname,telephone,nif,email,password) 
                VALUES('$nombre','$apellido','$tel','$dni','$correo','$pass')");

            if ($query_insert) {
                $alert = '<p class="msg_save">Profesor creado</p>';
            } else {
                $alert = '<p class="msg_error">Error al crear el profesor</p>';
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="js/jquery.min.js"></script>
    <?php include "includes/scripts.php"; ?>
    <title>Calendario</title>
</head>

<body>
    <header>
        <section id="container">
            <div class="form_register">
                <h1><i class="fas fa-graduation-cap"></i> Nueva matrícula</h1>
                <hr>
                <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
                <form action="" method="post">
                    <label for="Curso">Curso</label>
                    <select>
                        <option name="curso" value="0">Seleccione:</option>
                        <?php
                        include '../conexion.php';
                        // Realizamos la consulta para extraer los datos
                        $query = mysqli_query($conection, " SELECT * FROM courses");
                        while ($valores = mysqli_fetch_array($query)) {
                            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                            echo '<option value="' . $valores['id_course'] . '">' . $valores['name'] . '</option>';
                        }
                        ?>
                    </select>

                    <select>
                        <option name="curso" value="0">Seleccione:</option>
                        <?php
                        include '../conexion.php';
                        // Realizamos la consulta para extraer los datos
                        $query = mysqli_query($conection, " SELECT * FROM courses");
                        while ($valores = mysqli_fetch_array($query)) {
                            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                            echo '<option value="' . $valores['id_course'] . '">' . $valores['name'] . '</option>';
                        }
                        ?>
                    </select>

                    <input type="submit" value="Crear nueva asignatura" class="btn_save">
                </form>
            </div>
        </section>

    </header>
    <!-- <div id="calendar"></div> -->

</body>
</html>

<style>

#container h1 {
    font-size: 32px;
    display: inline-block;
    align-items: center;
    text-align: center;
}


</style>