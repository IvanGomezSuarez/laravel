<?php 
session_start();
if(!isset($_SESSION['role'])){
		header('location: ../index.php');
}elseif($_SESSION['role'] == "student"){
        header('location: calendar.php');
}elseif($_SESSION['role'] == "teacher"){
	header('location: espacioProfesor.php');
}
?>
<header>
		<div class="header">
			
			<h1>Centro educativo</h1>
			<div class="optionsBar">
				<p>España, <?php echo fechaC(); ?></p>
				<span>|</span>
				<span class="user"><?php echo $_SESSION['nombreusuario'];?></span> 
				<img class="photouser" src="img/user.png" alt="Usuario">
				<a href="salir.php"><img class="close" src="img/salir.png" alt="Salir del sistema" title="Salir"></a>
			</div>
		</div>
		<?php include "nav.php"; ?>
		<?php include "js/functions.js"; ?>
	</header>

	<div class="modal">
		<div class="bodymodal">
			<form action="" method="post" name="form_add_enrollment" id="form_add_enrollment" onsubmit="
			event.preventDefault(); sendDataMatricula();">
				<h1><i class="fas fa-save" style="font-size:45pt;"></i><br> Guardar matrícula</h1></br>
				<h2 class="nombre_alumno">alejandro</h2></br>
				<h2 class="nombre_curso">Matematicas</h2></br>
				<input type="hidden" name="action" value="addMatricula" required>
				<div class="alert alertAddMatricula"></div>
				<button type="submit" class="btn_new"><i class="fas fa-save"></i> Guardar</button>
				<a ref="#" class="btn_ok closeModal" onclick="closeModal();"><i class="fas fa-ban"></i> Cerrar</a>
				
			</form>
		</div>

	</div>