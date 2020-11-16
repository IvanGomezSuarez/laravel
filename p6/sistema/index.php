<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>


	<title>Administracion</title>
</head>

<body>
	<?php
	include "includes/header.php";
	include "../conexion.php";

	$query_dash = mysqli_query($conection, "CALL dataDashboard();");
	$result_dash = mysqli_num_rows($query_dash);
	if ($result_dash > 0) {
		$data_dash = mysqli_fetch_assoc($query_dash);
		mysqli_close($conection);
	}
	print_r($data_dash);
	?>

	<section id="container">
		<div class="divContainer">
			<div>
				<h1 class="titlePanelControl">Panel de control</h1>
			</div>
			<div class="dashboard">
				<a href="listado_usuarios.php">
					<i class="fas fa-users "></i>
					<p>
						<strong>Administradores</strong><br>
						<span>
							<?php echo $data_dash['admins']; ?></span>
					</p>
				</a>
				<div class="dashboard">
					<a href="listado_profesores.php">
						<i class="fas fa-school"></i>
						<p>
							<strong>Profesores</strong><br>
							<span>
								<?php echo $data_dash['profesores']; ?></span>
						</p>
					</a>
					<div class="dashboard">
						<a href="listado_cursos.php">
							<i class="fab fa-discourse"></i>
							<p>
								<strong>Cursos</strong><br>
								<span>
									<?php echo $data_dash['cursos']; ?></span>
							</p>
						</a>
						<div class="dashboard">
							<a href="listado_asign.php">
								<i class="fas fa-graduation-cap"></i>
								<p>
									<strong>Asignaturas</strong><br>
									<span>
										<?php echo $data_dash['asignaturas']; ?></span>
								</p>
							</a>
							<div class="dashboard">
								<a href="listado_alumnos.php">
									<i class="fas fa-user"></i>
									<p>
										<strong>Alumnos</strong><br>
										<span><?php echo $data_dash['alumnos'];//muestra el numero de registros en esta tabla de la BD ?> </span>
									</p>
								</a>

							</div>


						</div>
	</section>
	<section id="gestion">
	<div class="divInfoSistema">
		<div>
			<h1 class="titlePanelControl">Configuracion</h1>
		</div>
		<div class="ContainerPerfil">
			<div class="ContainerDataUser">
				<img class="photouser" src="img/user_dash.png">
			</div>
			<div class="divDataUser">
				<h4>Información personal"</h4>
				<div>
					<label>Nombre:</label> <span>Ivan</span>
				</div>
				<div>
					<label>Correo:</label> <span>ejemplo@gmail.com</span>
				</div>
				<h4>Datos de usuario</h4> <span>
					<?echo $data_dash['nombreusuario']; ?></span>
				<h4>Cambiar contraseña</h4>
				<form-action="" method="post" name="frmChangePass" id="frmChangePass">
					<div>
						<input type="password" name="txtPassUser" id="txtPassUser" placeholder="Contraseña actual" required>
					</div>
					<div>
						<input type="password" name="txtNewPassUser" id="txtNewPassUser" placeholder="Nueva contraseña" required>
					</div>
					<div>
						<input type="password" name="txtPassConfirm" id="txtPassConfirm" placeholder="Confirmar contraseña" required>
					</div>
					<div>
						<button type="password" class="btn_save btnChangePass"><i class="fas fa-key"></i>Cambiar contraseña</button>
					</div>
					</form>

			</div>
		</div>
	</div>
	</div>

	<div class="tablaGestion">
		<h1>Informacion de los horarios existen</h1>
		<table>
			<tr>
				<th>Id</th>
				<th>Alumno</th>
				<th>Curso</th>
				<th>Asignatura</th>
				<th>Color</th>
				<th>Profesor</th>
				<th>Dia de inicio</th>
				<th>Hora inicio</th>
				<th>Hora fin</th>
				<th>Acciones</th>
			</tr>
			<?php
			include "../conexion.php";

			$query = mysqli_query($conection, "SELECT sc.id_schedule, cl.name, cl.color FROM students s
			INNER JOIN enrollment e ON s.id = e.id_student
			INNER JOIN courses c ON e.id_course = c.id_course
			INNER JOIN class cl ON c.id_course = cl.id_course
			INNER JOIN schedule sc ON cl.id_schedule = sc.id_schedule
			WHERE s.id = 7"
		);

			$result = mysqli_num_rows($query);
			if ($result > 0) {
				while ($data = mysqli_fetch_array($query)) {
			?>
					<tr>
						<td><?php echo $data["id_schedule"]; ?></td>
						<td><?php echo $data["name"]; ?></td>
						<td><?php echo $data["color"]; ?></td>
						<td><?php echo $data["color"]; ?></td>
						<td><?php echo $data["color"]; ?></td>
						<td><?php echo $data["color"]; ?></td>
						<td><?php echo $data["color"]; ?></td>
						<td><?php echo $data["color"]; ?></td>
						<td><?php echo $data["color"]; ?></td>

						<td>
							<a class="link_edit" href="edit_alumno.php?id=<?php echo $data["id"]; ?>">Editar</a>
							|
							<a class="link_delete" href="delete_alumno.php?id=<?php echo $data["id"]; ?>">Eliminar</a>

						</td>
					</tr>

			<?php
				}
			}
			?>
		</table>
		
	</div>
	
		</section>
<div class="selectores">
		
			<select class="select-css">
                <option name="alumno" value="0">Seleccione al alumno:</option>
            <?php
            include '../conexion.php';
            // Realizamos la consulta para extraer los datos, en este select se deben mostrar los horarios solo de la asignatura seleccionada
                $query = mysqli_query($conection, " SELECT * FROM students");
                while ($valores = mysqli_fetch_array($query)) {
            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                    echo '<option value="'.$valores['id'].'">'.$valores['name'].'</option>';
                }
                ?>
			</select>

			<select class="select-css">
                <option name="curso" value="0">Seleccione el curso:</option>
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
			
			<select class="select-css">
                <option name="asignatura" value="0">Seleccione la asignatura:</option>
            <?php
            include '../conexion.php';
            // Realizamos la consulta para extraer los datos, en este select se deben mostrar los horarios solo de la asignatura seleccionada
                $query = mysqli_query($conection, " SELECT * FROM class");
                while ($valores = mysqli_fetch_array($query)) {
            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                    echo '<option value="'.$valores['id_class'].'">'.$valores['name'].'</option>';
                }
                ?>
			</select>


			<label for="favcolor">Seleccione el color de la asignatura</label>
			<input type="color" id="favcolor" name="favcolor" value="#ff0000"><br><br>
			
			<select class="select-css">
                <option name="profesor" value="0">Seleccione el profesor:</option>
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

			<select class="select-css">
                <option name="horario" value="0">Seleccione el horario:</option>
            <?php
            include '../conexion.php';
            // Realizamos la consulta para extraer los datos, en este select se deben mostrar los horarios solo de la asignatura seleccionada
                $query = mysqli_query($conection, " SELECT * FROM schedule");
                while ($valores = mysqli_fetch_array($query)) {
            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                    echo '<option value="'.$valores['id_schedule'].'">'.$valores['day'].' '.$valores['time_start'].'</option>';
                }
                ?>
            </select>
			<button type="button" onclick="alert('Hello world!')">Guardar asignación</button>
			</div>
	<?php include "includes/footer.php"; ?>
</body>

</html>

<style>
	.titlePanelControl {
		width: 100%;
		background: #fff;
		padding: 5px 15px;
		margin-bottom: 10px;
		font-size: 18px !important;
		color: #0A4661;
	}

	.divContainer {
		margin-bottom: 100px;
		display: inline;
	}


	.dashboard {

		display: flex;
		justify-content: space-around;
		width: 100%;
		margin: auto;
	}

	.dashboard a {
		color: #898989;
		width: calc(100% / 2);
		padding: 20px;
		background-color: #fff;
		font-size: 25pt;
		text-align: center;
		width: 100%;

	}

	.dashboard p {
		color: #3279a7;
	}

	.dashboard a span {
		font-weight: bold;
		font-size: 20pt;
		color: green;
	}

	.containerPerfil {
		display: flex;
		display: -webkit-flex;
		justify-content: space-around;
		align-items: flex-start;
		flex-wrap: wrap;
	}

	.ContainerDataUser {
		width: 400px;
		background-color: #fff;
		padding: 20px;
		margin: 10px;
		border-radius: 5%;
	}

	.divDataUser {
		padding: 10px;
		margin: auto;
	}


	.divDataUser>div {
		display: -webkit-flex;
		display: flex;
		display: -ms-flexbox;

	}

	.divDataUser h4 {
		text-align: left;

	}

	.divDataUser label {
		width: 150px;
		margin: 5px;
		margin-bottom: 0px;
		margin-top: 0px;
		text-align: left;
	}

	.divDataUser span {
		padding: 5px;
		text-align: left;

	}

	.user_dash {
		display: flex;
		display: -webkit-flex;
		justify-content: center;
		align-items: center;
		width: 20px;
		height: 2px;
		border-radius: 100%;
		margin: 10px auto;
		padding: 25px;
		background: #E9E9E9;
	}

	.divInfoSistema {
		background: #898989;
		width: 430px;
		padding: 5px 10px;
		color: #fff;
		float: left;
		text-align: center;
		margin-bottom: 10px;
	}

	.divInfoSistema form {
		padding: 20px;
	}

	.divInfoSistema h1 {
		border-radius: 5px;
	}


	.divInfoSistema input {
		margin-bottom: 0px;
		padding: 10px;
		margin: 10px;
		width: 300px;

		margin-top: 10px;
	}

	.divInfoSistema button {
		width: 50%;
		margin: 25px;
	}
/********estilos de la seccion de gestion, profile y tabla de asignaciones*************/
	.tablaGestion {
		float: right;
	}
	 * gestion{
		 margin: 0;
		 box-sizing: border-box;
	 }

	 #gestion{
padding: 90px 15px 15px;
	 }

.selectores{
	float:left;
	padding: 0px 200px 0px;
	margin-top: 0px;
}
.select-css {
 display: block;
 font-size: 16px;
 font-family: 'Arial', sans-serif;
 font-weight: 400;
 color: #444;
 line-height: 1.3;
 padding: .4em 1.4em .3em .8em;
 width: 400px;
 max-width: 100%; 
 box-sizing: border-box;
 margin: 5;
 margin-top: 15px;
 border: 1px solid #aaa;
 box-shadow: 0 1px 0 1px rgba(0,0,0,.03);
 border-radius: .3em;
 -moz-appearance: none;
 -webkit-appearance: none;
 appearance: none;
 background-color: #fff;
 background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007CB2%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'),
   linear-gradient(to bottom, #ffffff 0%,#f7f7f7 100%);
 background-repeat: no-repeat, repeat;
 background-position: right .7em top 50%, 0 0;
 background-size: .65em auto, 100%;
}
.select-css::-ms-expand {
 display: none;
}
.select-css:hover {
 border-color: #888;
}
.select-css:focus {
 border-color: #aaa;
 box-shadow: 0 0 1px 3px rgba(59, 153, 252, .7);
 box-shadow: 0 0 0 3px -moz-mac-focusring;
 color: #222; 
 outline: none;
}
.select-css option {
 font-weight:normal;
}

.selectores button {
		width: 50%;
		margin: 25px;
		margin-bottom: 0px;
		padding: 10px;
		margin: 10px;
		width: 300px;
		background: #12a4c6;
		margin-top: 10px;
}
</style>