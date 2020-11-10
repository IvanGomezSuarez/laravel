
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<link rel="stylesheet" type = "text/css" href="css/styleDashboard.css">

	<title>Administracion</title>
</head>
<body>
	<?php include "includes/header.php"; ?>	
	
	<section id="container">
		<div>
			<h1 class="titlePanelControl">Panel de control</h1>
		</div>
		<div class="dashboard">
			<a href="listado_usuarios.php">
				<i class="fas fa-users"></i>
				<p>
					<strong>Administradores</strong><br>
					<span>40</span>
				</p>
			</a>
			<div class="dashboard">
			<a href="listado_profesores.php">
				<i class="fas fa-users"></i>
				<p>
					<strong>Profesores</strong><br>
					<span>40</span>
				</p>
			</a>
			<div class="dashboard">
			<a href="listado_cursos.php">
				<i class="fas fa-users"></i>
				<p>
					<strong>Cursos</strong><br>
					<span>40</span>
				</p>
			</a>
			<div class="dashboard">
			<a href="listado_asign.php">
				<i class="fas fa-users"></i>
				<p>
					<strong>Asignaturas</strong><br>
					<span>40</span>
				</p>
			</a>
			<div class="dashboard">
			<a href="listado_alumnos.php">
				<i class="fas fa-users"></i>
				<p>
					<strong>Alumnos</strong><br>
					<span>40</span>
				</p>
			</a>
		
		</div>
	</section>	
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

.dashboard{
 
    display: flex;
    justify-content: space-around ;
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

</style>