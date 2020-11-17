<?php //de momento no funciona

if (!empty($_POST)) {
    $alert = '';
    if (
        empty($_POST[$valores['id_course']]) || empty($_POST[$valores['id']])
    ) {
        $alert = '<p class="msg_error">Todos los campos son obligatorios</p>'; // funciona bien
    } else {
        include "../conexion.php";
        $course = $_POST[$valores['id_course']];
        $alum = $_POST[$valores['id']];


        //echo "SELECT * FROM users_admin WHERE dni = '$dni' ";
        $query = mysqli_query($conection, "SELECT * FROM enrollment WHERE  id_course = '$course AND id_student= '$alum'");
        $result = mysqli_fetch_array($query);
       // print_r($result);
        
        if ($result > 0) {
            $alert = '<p class="msg_error">La matrícula ya existe.</p>'; //no me funciona ya que duplica las entradas
        } else {
            $query_insert = mysqli_query($conection, "INSERT INTO enrollment(id_student,id_course) 
                VALUES('$alum','$course')");

            if ($query_insert) {
                $alert = '<p class="msg_save">Matrícula creada</p>';
            } else {
                $alert = '<p class="msg_error">Error al crear la matrícula</p>';
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
                        <option id="curso" name="curso" value="0">Seleccione el curso:</option>
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
                        <option id="alumno" name="alumno" value="0">Seleccione el alumno:</option>
                        <?php
                        include '../conexion.php';
                        // Realizamos la consulta para extraer los datos
                        $query = mysqli_query($conection, " SELECT * FROM students");
                        while ($valores = mysqli_fetch_array($query)) {
                            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                            echo '<option value="'.$valores['id'].'">'.$valores['name'].'</option>';
                        }
                        ?>
                    </select>

                    <input type="submit" value="Guardar matrícula" class="btn_save">
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