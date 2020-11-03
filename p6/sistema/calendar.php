<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="js/jquery.min.js"></script>
    <?php include "includes/scripts.php"; ?>
    <?php include "includes/header.php"; ?>	
    <script src="js/moment.min.js"></script>
    <link rel="stylesheet" href="css/fullcalendar.min.css">
	<title>Calendario</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-7"> <div id="calendario"></div></div>
            <div class="col"></div>
            </div>
    </div>

    <script>
        $(document).ready(function(){
            $('calendario').fullCalendar();
        });
    </script>
</body>
</html>