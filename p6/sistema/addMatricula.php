<?php //de momento no funciona

if (!empty($_POST)) {
    $alert = '';
    if (
        empty($_POST['curso']) || empty($_POST['alumno'])
    ) {
        $alert = '<p class="msg_error">Todos los campos son obligatorios</p>'; // funciona bien
    } else {
        include "../conexion.php";
        $course = $_POST['curso'];
        $alum = $_POST['alumno'];


        //echo "SELECT * FROM users_admin WHERE dni = '$dni' ";
        $query = mysqli_query($conection, "SELECT * FROM enrollment WHERE  id_course = '$course AND id_student= '$alum'");
      //  echo $query;
        exit;
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
    <?php include "includes/header.php"; ?>

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
                    <label for="curso">Seleccione el curso</label>
                    <?php
                    include '../conexion.php';
                    $queryCurso = mysqli_query($conection, " SELECT * FROM courses");
                    $valorcurso = mysqli_num_rows($queryCurso);
                    ?>

                    <select name="curso" id="curso">
                        <?php
                        include '../conexion.php';
                        if ($valorcurso > 0) {
                        }
                        while ($valorcurso = mysqli_fetch_array($queryCurso)) {
                        ?>
                            <option value="<?php echo $valorcurso["id_course"] ?>"><?php echo $valorcurso["name"] ?></option>
                        <?php
                        }
                        ?>
                        

                    </select>
                    <label for="alumno">Seleccione el alumno</label>
                    <?php
                    $query = mysqli_query($conection, " SELECT * FROM students");
                    $valores = mysqli_num_rows($query);
                    ?>

                    <select name="alumno" id="alumno">
                        <?php
                        include '../conexion.php';
                        if ($valores > 0) {
                        }
                        while ($valores = mysqli_fetch_array($query)) {
                        ?>
                            <option value="<?php echo $valores["id"] ?>"><?php echo $valores["name"] ?></option>
                        <?php
                        }
                        ?>
                        

                    </select>

                    <input type="submit" value="Guardar matrícula" class="btn_save">
                </form>
            </div>
        </section>

    </header>

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