
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<link rel="stylesheet" type = "text/css" href="css/styleDashboard.css">

	<title>Administracion</title>
</head>
<body>
	<?php include "includes/header.php"; 
	include "../conexion.php";
	$query_dash = mysqli_query($conection,"CALL dataDashboard();");
	//echo $sql;exit;
	$result_dash = mysqli_num_rows($query_dash);
	if(result_dash > 0){
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
					<span><? echo $data_dash['admins']; ?></span>
				</p>
			</a>
			<div class="dashboard">
			<a href="listado_profesores.php">
				<i class="fas fa-users"></i>
				<p>
					<strong>Profesores</strong><br>
					<span><? echo $data_dash['profesores']; ?></span>
				</p>
			</a>
			<div class="dashboard">
			<a href="listado_cursos.php">
				<i class="fas fa-users"></i>
				<p>
					<strong>Cursos</strong><br>
					<span><? echo $data_dash['cursos']; ?></span>
				</p>
			</a>
			<div class="dashboard">
			<a href="listado_asign.php">
				<i class="fas fa-users"></i>
				<p>
					<strong>Asignaturas</strong><br>
					<span><? echo $data_dash['asignaturas']; ?></span>
				</p>
			</a>
			<div class="dashboard">
			<a href="listado_alumnos.php">
				<i class="fas fa-users"></i>
				<p>
					<strong>Alumnos</strong><br>
					<span><?echo $data_dash['alumnos']; ?></span>
				</p>
			</a>
		
		</div>


</div>
	</section>
	<div class="divInfoSistema">
			<div>
				<h1 class="titlePanelControl">Configuracion</h1>
			</div>
				<div class="ContainerPerfil">
					<div class="ContainerDataUser">
					<i class="fas fa-users fa-7x "></i>
					</div>
						<div class="divDataUser">
							<h4>Información personal"</h4>
						<div>
						<label>Nombre:</label> <span>Ivan</span>
						</div>
						<div>
						<label>Nombre:</label> <span>Ivan</span>
						</div>
						<h4>Datos de usuario</h4> <span>Ivan2020</span>
						<h4>Cambiar contraseña</h4> 
						<form-action="" method="post" name="frmChangePass" id="frmChangePass">
							<div>
							<input type="password" name="txtPassUser" id="txtPassUser" 
							placeholder="Contreseña actual" required>
							</div>
							<div>
							<input type="password" name="txtNewPassUser" id="txtNewPassUser" 
							placeholder="Nueva contraseña" required>
							</div>
							<div>
							<input type="password" name="txtPassConfirm" id="txtPassConfirm" 
							placeholder="Confirmar contraseña" required>
							</div>
							<div>
							<button type="password" class="btn_save btnChangePass"><i class="fas fa-key"></i>Cambiar contraseña</button>
							</div>
						</form>

				</div>
				</div>
			</div>
		</div>	
	<?php include "includes/footer.php"; ?>
</body>
</html>

<style>
.titlePanelControl{
	width: 100%;
	background: #fff;
	padding: 5px 15px;
    margin-bottom: 10px;
    font-size: 18px !important;
    color: #0A4661;
}

.divContainer{
	margin-bottom: 100px;
	display: inline;
}


.dashboard{
 
    display: flex;
    justify-content: space-around;
    width: 100%;
    margin: auto;
}

.dashboard a{
    color: #898989;
    width: calc(100% / 2);
    padding: 20px;
    background-color: #fff;
    font-size: 25pt;
	text-align: center;
	width: 100%;

}

.dashboard p{
    color: #3279a7;
}

.dashboard a span{
    font-weight: bold;
    font-size: 20pt;
}

.containerPerfil{
	display: flex;
	display: -webkit-flex;
	justify-content: space-around;
	align-items: flex-start;
	flex-wrap: wrap;
}
.ContainerDataUser{
	width: 500px;
	background-color: #fff;
	padding: 20px;
}
.divDataUser{
	padding: 10px;
	margin: auto;
}

</style>