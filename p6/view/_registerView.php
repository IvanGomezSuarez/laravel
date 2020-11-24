<?php 
include MOD.'_registerModel.php';
include CONT.'_registerController.php';echo $regok;
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo CSS; ?>">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
        <meta charset="UTF-8">
        <title>Registro Colegio</title>
    </head>
    <body id="login" style="<?php /* ?>background-image: url(<?php echo IMG.'fondo.jpg'?>);background-size:cover; <?php */ ?>">
       <?php if ($regok==true){
           echo '<script>alert("Usuario Guardado"); window.location.href = "index.php";</script>';
         
       } ?>
    <div id="" class="container-md" >
        <form class="col-sm-8 col-lg-6 col-md-6 offset-sm-2 offset-md-3 offset-lg-3 border login" action="?pag=registerView.php" method="post">
            Regístrate:<hr>
             <div class="form-group">
                  <label>Nombre</label>
                  <input type="text" class="form-control" name="name" id="name" required>
                </div>
             
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
                <div class="form-group <?php echo $classAlertUser; ?>">
                  <label>Usuario</label>
                  <input type="text" class="form-control <?php echo $classAlertUser; ?>" name="user" id="usuario"  required>
                </div>
                <div class="form-group mb-4 <?php echo $classAlertPass; ?>">
                  <label >Password</label>
                  <input  data-toggle="password" type="password" class="form-control" id="pass" name="pass" required>
                </div>
                <div class="form-group mb-4 <?php echo $classAlertPass; ?>">
                  <label>Repetir Password</label>
                  <input data-toggle="password" type="password" class="form-control" id="pass2" name="pass2" required>
                </div>    

                <button type="submit" class="btn btn-primary text-center">Registrar</button>
                <a type="button" href="?pag=back" class="btn btn-primary">Volver </a>      
        </form>
    </div>
        
        
<script>
if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
}
</script>
<?php
if($reload){
echo '<script>location.reload();</script>';
}
?>
    </body>
</html>