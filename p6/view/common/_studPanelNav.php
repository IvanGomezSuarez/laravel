<?php
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <a class="navbar-brand" href="?"><i class="fa fa-home" aria-hidden="true"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
         <li class="nav-item">
          <a class="nav-link" href="?pag=_studCalendarioView.php">Calendario</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="?pag=_studConfigView.php">Configuración</a>
        </li>
        <form action="" method="post" class="">
            <input type="submit" class="nav-link salir" name="exit" value="Salir">
        </form>
      </ul>
    </div>
  </nav>
<script>
   jQuery('.dropdown-toggle').dropdown();
</script>
