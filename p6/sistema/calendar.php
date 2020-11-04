<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="js/jquery.min.js"></script>
    <?php include "includes/scripts.php"; ?>
    <?php include "includes/header.php"; ?>	
    <link rel='stylesheet' type='text/css' href='css/fullcalendar.css' />
    <script type='text/javascript' src='/js/jquery.js'></script>
    <script type='text/javascript' src='js/fullcalendar.js'></script>
	<title>Calendario</title>
    <div id='calendar'></div>
    <script>
        $(document.ready(function() {

        // page is now ready, initialize the calendar...

        $('#calendar').fullCalendar({
        // put your options and callbacks here
        })

        });
    </script>
</head>
<body>
    <div id="calendar"></div>

</body>
</html>