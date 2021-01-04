@extends('layout')
@section('content')
<?php


    $idStudent=Session::get('id_user');

    $cargamosHorarios = DB::select('SELECT sc.id_schedule, cl.name, cl.color, sc.day, sc.time_start, sc.time_end, sc.id_t_work, sc.id_t_exam FROM students s
    INNER JOIN enrollment e ON s.id = e.id_student
    INNER JOIN courses c ON e.id_course = c.id_course
    INNER JOIN class cl ON c.id_course = cl.id_course
    INNER JOIN schedule sc ON cl.id_class = sc.id_class
    WHERE s.id ="'.$idStudent.'"');
    $eventos =$cargamosHorarios;

    $totalEventos = count($cargamosHorarios);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <link href='css/main.css' rel='stylesheet' />
    <script src='js/main.js'></script>
    <script src='js/es.js'></script>

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
                    for ( $e = 0; $e<$totalEventos; $e++){
                    ?>
                    {
                        title: '<?php
                                if (($eventos[$e]->id_t_exam)!=NULL){

                                echo 'Examen '.$eventos[$e]->name;
                                } else if (($eventos[$e]->id_t_work)!=NULL) {
                                echo 'Trabajo '.$eventos[$e]->name;

                                }else{
                                    echo $eventos[$e]->name;
                                }
                                 ?>',
                        start: '<?php echo $eventos[$e]->day."T".$eventos[$e]->time_start?>',
                        end: '<?php echo $eventos[$e]->day."T".$eventos[$e]->time_end?>',
                        color: '<?php echo $eventos[$e]->color?>',
                        extendedProps: {
                            Exam: '<?php echo $eventos[$e]->id_t_exam ?>'
                        }
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

@endsection