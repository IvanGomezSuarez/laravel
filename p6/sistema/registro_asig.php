<?php 
    // aun no esta hecho, falta ver como guardar en la tabla class no los id de las tablas foraneas sino el nombre de los campos
    if(!empty($_POST))
    {
        $alert='';//que se pone en los post??
        if(empty($_POST['nombreasig']) || empty($_POST['profesor']) || empty($_POST['curso'])
        || empty($_POST['start']) || empty($_POST['horaini']) || empty($_POST['horafin']))
        {
            //echo $_POST['favcolor'];exit;
            $alert='<p class="msg_error">Todos los campos son obligatorios</p>';// funciona bien
        }else{
            include "../conexion.php";
            $nombre = $_POST['nombreasig'];
            $color = $_POST['favcolor'];
            $profesor = $_POST['profesor'];
            $curso = $_POST['curso'];
            $inicio = $_POST['start'];
            $inihora = $_POST['horaini'];
            $finhora = $_POST['horafin'];

            //echo "SELECT * FROM users_admin WHERE dni = '$dni' ";
            $query = mysqli_query($conection,"SELECT * FROM class WHERE name = '$nombre' ");
            $result = mysqli_fetch_array($query);
            if($result > 0){
                $alert= '<p class="msg_error">La asignatura ya existe.</p>';//no me funciona ya que duplica las entradas
            }else{
                $query_insert = mysqli_query($conection, "INSERT INTO class (name,color,id_teacher,id_course) 
                VALUES('$nombre','$color','$profesor','$curso')");
                //echo $query_insert;exit;
                if($query_insert){
                    $alert='<p class="msg_save">Asignatura creada</p>';
                }else{
                    $alert='<p class="msg_error">Error al crear la asignatura</p>';
                }
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <?php include "includes/scripts.php"; ?>
	<title>Registro asignaturas</title>
</head>
<body>
	<?php include "includes/header.php"; ?>	
	<section id="container">
		<div class="form_register">
            <h1><i class="fas fa-graduation-cap"></i> Registro de Asignaturas</h1>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert :''; ?></div>

            <form action="" method="post">
            <label for="nombreasig">Nombre de la asignatura</label>
            <input type="text" name="nombreasig" id="nombreasig" placeholder="Nombre de la asignatura">
            <label for="favcolor">Select el color de la asignatura</label>
            <input type="color" id="favcolor" name="favcolor" value="#ff0000"><br><br>
            <label for="profesor">Profesor</label>
            <select>
                <option name="profesor" value="0">Seleccione:</option>
            <?php
            include '../conexion.php';
            // Realizamos la consulta para extraer los datos
                $query = mysqli_query($conection, " SELECT * FROM teachers");
                while ($valores = mysqli_fetch_array($query)) {
            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                    echo '<option value="'.$valores['id_teacher'].'">'.$valores['name'].'</option>';
                }
                ?>
            </select>

            <label for="Curso">Curso</label>
            <select>
                <option name="curso" value="0">Seleccione:</option>
            <?php
            include '../conexion.php';
            // Realizamos la consulta para extraer los datos
                $query = mysqli_query($conection, " SELECT * FROM courses");
                while ($valores = mysqli_fetch_array($query)) {
            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                    echo '<option value="'.$valores['id_course'].'">'.$valores['name'].'</option>';
                }
                ?>
            </select>
    
            <label for="start">Fecha de inicio:</label>
            <input type="date" id="start" name="start" value="2020-01-01" min="2020-01-01" max="2020-12-31">
            <label for="horaini">Hora de inicio:</label>
            <input type="time" id="horaini" name="horaini"
            min="09:00" max="18:00" required>
            <label for="horafin">Hora de Fin:</label>
            <input type="time" id="horafin" name="horafin"
            min="09:00" max="18:00" required>
            <input type="submit" value="Crear nueva asignatura" class="btn_save">

            
            </form>
        </div>
	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>