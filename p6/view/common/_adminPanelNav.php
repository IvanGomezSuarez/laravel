<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <a class="navbar-brand" href="?"><i class="fa fa-home" aria-hidden="true"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
       
        <li class="nav-item">
          <a class="nav-link" href="?pag=_asignaturasView.php">Asignaturas</a>
        </li>
      
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Cursos</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="?pag=_cursosView.php">Edición Cursos</a>
              <a class="dropdown-item" href="?pag=_asigxcursoView.php">Asignaturas por Curso</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Profesorado</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="?pag=_profesoresView.php">Alta Profesor</a>
              <a class="dropdown-item" href="?pag=_profeAsignaView.php">Asignar Asignaturas</a>
            </div>
        </li>
       <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Alumnos</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="?pag=_adminAlumnView.php">Alta Alumno</a>
                <a class="dropdown-item" href="?pag=_adminMatriculasView.php">Matricular Alumno</a>
              </div>
        </li>
      
        
           <li class="nav-item">
          <a class="nav-link" href="?pag=_calendarioView.php">Horarios</a>
        </li>
        
      
        
        

        <li class="nav-item">
          <a class="nav-link" href="?pag=_userConfigView.php">Configuración</a>
        </li>
        <li class="nav-item pull-right">
            <form action="" method="post" class="">
                <input type="submit" class="nav-link salir" name="exit" value="Salir">
            </form>
          
        </li>
        </ul>
      </div>
  </nav>
<script>
   jQuery('.dropdown-toggle').dropdown();
</script>
