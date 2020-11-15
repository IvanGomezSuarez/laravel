<?php 
session_start();

if(!isset($_SESSION['role'])){
		header('location: ../index.php');
}elseif($_SESSION['role'] == "admin"){
    header('location: index.php');
}

include "../conexion.php";
$query = mysqli_query($conection, "SELECT sc.id_schedule, cl.name, cl.color, c.description, sc.day, sc.time_start, sc.time_end  FROM students s
                                    INNER JOIN enrollment e ON s.id = e.id_student
                                    INNER JOIN courses c ON e.id_course = c.id_course
                                    INNER JOIN class cl ON c.id_course = cl.id_course
                                    INNER JOIN schedule sc ON cl.id_schedule = sc.id_schedule
                                    WHERE s.id = 7"
                                );

// require_once 'base/eventoCalendario.php';
// $calendario = new eventoCalendario();
            

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
                events: [
                    <?php                    
                    while ($events = mysqli_fetch_assoc($query)) {
                    //while ($events = $eventoCalendario->getCalendariobyId(7)) {
                    ?>
                    {
                        title: '<?php echo $events["name"]?>',
                        start: '<?php echo $events["day"]."T".$events["time_start"]?>',
                        end: '<?php echo $events["day"]."T".$events["time_end"]?>',
                        //display: 'background',
                        //COLOR: You can use any of the CSS color formats such #f00, #ff0000, rgb(255,0,0), or red.
                        color: '<?php echo $events["color"]; ?>'
                    },
                    <?php
                    }
                    ?>          
                ],
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