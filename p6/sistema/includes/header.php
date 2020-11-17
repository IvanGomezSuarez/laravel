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

