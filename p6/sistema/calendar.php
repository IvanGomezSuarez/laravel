<?php 
session_start();
if(!isset($_SESSION['role'])){
		header('location: ../index.php');
}elseif($_SESSION['role'] == "admin"){
    header('location: index.php');
}elseif($_SESSION['role'] == "teacher"){
    header('location: espacioProfesor.php');
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <!-- <script src="js/jquery.min.js"></script> -->
    <?php include "includes/scripts.php"; ?>

    <link href='fullcalendar/main.css' rel='stylesheet' />
    <script src='fullcalendar/main.js'></script>
    <script src='fullcalendar/es.js'></script>
	<title>Calendario</title>

    <script>


        document.addEventListener('DOMContentLoaded', function() {

            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'es',
                //initialView: 'dayGridMonth'
                //height: '100%', //Si no hay eventos no se ve
                headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                //initialDate: '2020-09-12',
                //editable: true,
                navLinks: true, // can click day/week names to navigate views
                dayMaxEvents: true, // allow "more" link when too many events
            });
            calendar.render();
        });


    </script>
<style>
    header {
    position: static;
    width: 100%;
    }

    #calendar {
    max-width: 1100px;
    margin: 40px auto;
    padding: 0 10px;
    }

    #calendar-container {
    position: absolute;
    top: 40px;
    left: 0;
    right: 0;
    bottom: 0;
    }
</style>

</head>
<body>
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
</header>
<div id="calendar-container">
<div id="calendar"></div>
</div>
</body>
</html>