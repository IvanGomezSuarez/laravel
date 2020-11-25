<?php


    $idcurso = idcursoxidstud($idstud);
          
            
    if ($size>1){  
            
        /* hemos dado a click prev y pasamos $_GET['mes']=prev */
         if (isset($_GET['mes']) && ($_GET['mes']=='prev')){
             
            if (($_SESSION['month'])>1){
            $_SESSION['month']=$_SESSION['month']-1;
            }else{
                $_SESSION['month']=12;
                $_SESSION['year']=$_SESSION['year']-1;
            }
            
        }
        
        
        if (isset($_GET['mes']) && ($_GET['mes']=='next')){
            if ($_SESSION['month']<12){
            $_SESSION['month']=$_SESSION['month']+1;
            }else{
                $_SESSION['month']=1;
                $_SESSION['year']=$_SESSION['year']+1;
            }
            
        }
        
 
        
        $month=$_SESSION['month'];
        $year=$_SESSION['year']; 
        
        if ($month<'10'){
            $month='0'.$month;
        }
       
        
        $fechaini = $year.'/'.$month.'/1';
        $fechafin = $year.'/'.datemonthfin($month);
               
        $horario = cargamosHorarioMes($fechaini,$fechafin,$idcurso[1]->id_course);
     
        $arrayAsignaturasCurso = devuelveClasexIdCurso($idcurso[1]->id_course);
        $totalAsignaturasCurso = sizeof(devuelveClasexIdCurso($idcurso[1]->id_course));
    };