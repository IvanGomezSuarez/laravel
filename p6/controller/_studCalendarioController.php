<?php

if($_SESSION['rol']=='student'){
    $eventos = cargamosHorarios($_SESSION['id']);
    $totalEventos = sizeof($eventos);
}