<?php 

/* si no hemos dado a next o prev cargamos año y mes por defecto que son los en curso*/
  if(!isset($_GET['mes'])){
            $_SESSION['month']=date("m");   /* el mes de inicio que es el actual */
            $_SESSION['year'] = date("Y"); /*  el año de inicio que es el actual */           
        }

include MOD.'_graphCalendarModel.php';
include CONT.'_graphCalendarController.php';


?>
<style>
 
    td{
       width: 14.28vw;
       height: 13.28vw;
       border: 1px solid #9a74741f;
       position: relative;
    }
    td.blur, td.blaur{
        visibility: hidden;
    }
    span.dayname, a.date {
        position: absolute;
        top: 0;
        font-size: 15px;
       
    }
    .asign{
     color:white;
    font-size: 1.1vw;
    }
    tr.days td{
        height: 30px;
        margin-left: 10%;
       
       
    }
    
</style>
<br><br>
<div class="container">
    
<?php 
    if ($size>1){  

?>    
    
    
<section>	
    <h3><?php 
    
    
    echo date("d"). '/'.$month.'/'.$year;
    
    ?></h3>
    <a class="btn btn-primary btn-sm" href="?pag=_graphCalendarView.php&mes=prev">Previo</a> <a class="btn btn-primary btn-sm" href="?pag=_graphCalendarView.php&mes=next">Siguiente</a>

    <table class="month mt-4">
	<tr class="days">
            <td><span class='dayname'>Lun</span></td>
            <td><span class='dayname'>Mar</td>
            <td><span class='dayname'>Mie</td>
            <td><span class='dayname'>Jue</td>
            <td><span class='dayname'>Vie</td>
            <td><span class='dayname'>Sab</td>
            <td><span class='dayname'>Dom</td>
	</tr>
        <?php 
	$today = date(" d "); // Current day
	//$month = date("$m"); // Current month
	//$year = date("Y"); // Current year
        
	$days = cal_days_in_month(CAL_GREGORIAN,$month,$year); // Days in current month
	$lastmonth = date("t", mktime(0,0,0,$month-1,1,$year)); // Days in previous month
	
	$start = date("N", mktime(0,0,0,$month,1,$year)); // Starting day of current month
	$finish = date("N", mktime(0,0,0,$month,$days,$year)); // Finishing day of  current month
	$laststart = $start - 1; // Days of previous month in calander
	
	$counter = 1;
	$nextMonthCounter = 1;

        
	if($start > 5){	$rows = 6; }else {$rows = 5; }

	for($i = 1; $i <= $rows; $i++){
		echo '<tr class="week">';
		for($x = 1; $x <= 7; $x++){				
			
			if(($counter - $start) < 0){
				$date = (($lastmonth - $laststart) + $counter);
				$class = 'class="blur"';
			}else if(($counter - $start) >= $days){
				$date = ($nextMonthCounter);
				$nextMonthCounter++;
				
				$class = 'class="blaur"';
					
			}else {
				$date = ($counter - $start + 1);
				if($today == $counter - $start + 1){
					$class = 'class="today"';
				}
			}
				
			
			echo '<td '.$class.'><a class="date">'. $date . '</a>';
                        
                        for ($a=1;$a<sizeof($horario);$a++){
                            $display='block;';
                            if (($horario[$a]->day) == ($year.'-'.$month.'-'.$date)){
                                for ($w=1;$w<$totalAsignaturasCurso;$w++){
                                     if (($arrayAsignaturasCurso[$w]->id_class)==($horario[$a]->id_class)){
                                     print_r('<div class="asign" style="display:'.$display.'background-color:'.cargamosAsignaturas($horario[$a]->id_class)[1]->color.'">'. cargamosAsignaturas($horario[$a]->id_class)[1]->name.'<br>'.$horario[$a]->time_start.'-'.$horario[$a]->time_end).'</div>';
                                    }
                                } 
                            }
                        } 
                        
                        echo '</td>';
		
			$counter++;
			$class = '';
		}
		echo '</tr>';
	}
	
?>
</table>
</section>	
    <?php }?>
</div>






