<?php
session_start();

if(!isset($_SESSION['role'])){
    header('location: ../index.php');
    }elseif($_SESSION['role'] == "student"){
        header('location: calendar.php');
    }elseif($_SESSION['role'] == "admin"){
        header('location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="js/jquery.min.js"></script>
    <?php include "includes/scripts.php"; ?>

    <link rel='stylesheet' type='text/css' href='css/fullcalendar.min.css' />
    <script type='text/javascript' src='js/jquery.js'></script>
    <script type='text/javascript' src='js/fullcalendar.js'></script>
	<title>Calendario</title>
</head>
<body>
<header>
		<div class="header">
			
			<h1>Área del profesor</h1>
			<div class="optionsBar">
				<p>España, <?php echo fechaC(); ?></p>
				<span>|</span>
                <span class="user"><?php echo $_SESSION['nombreusuario'];?></span> 
				<img class="photouser" src="img/user.png" alt="Usuario">
				<a href="salir.php"><img class="close" src="img/salir.png" alt="Salir del sistema" title="Salir"></a>
			</div>
		</div>

</header>
<!-- <div id="calendar"></div> -->

</body>
</html>