<?php
include MOD.'_studCalendarioModel.php';
include CONT.'_studCalendarioController.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <link href='public/fullcalendar/main.css' rel='stylesheet' />
    <script src='public/fullcalendar/main.js'></script>
    <script src='public/fullcalendar/es.js'></script>

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
                    for ( $e = 1; $e<$totalEventos; $e++){
                    ?>
                    {
                        title: '<?php echo $eventos[$e]->name?>',
                        start: '<?php echo $eventos[$e]->day."T".$eventos[$e]->time_start?>',
                        end: '<?php echo $eventos[$e]->day."T".$eventos[$e]->time_end?>',
                        color: '<?php echo $eventos[$e]->color?>'
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
    #calendar {
    max-width: 1200px;
    margin: 40px auto;
    padding: 0 10px;
    }
</style>

</head>
<body>
<div class="container-fluid" id="calendar"></div>
</body>
</html>
 
<script>
if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
}

</script>
<?php
// if($reload){
// echo '<script>location.reload();</script>';
// }
?>