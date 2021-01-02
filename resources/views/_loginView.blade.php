<?php
use App\Models\_loginModel;
use App\Http\Controllers\_loginController;
use App\config;
?>
    <!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>Login Colegio</title>
</head>
<br><br><br><br>
<body id="login" style="<?php /* ?>background-image: url(<?php echo IMG.'fondo.jpg'?>);background-size:cover; <?php */ ?>">

<div id="" class="container-md mb-4" >
    <form class="col-sm-8 col-lg-6 col-md-6 offset-sm-2 offset-md-3 offset-lg-3 border login" action="" method="post">

        <div class="form-group">
            <label for="exampleInputEmail1">Usuario</label>
            <input autofocus="true" type="text" class="form-control" name="user" id="usuario" aria-describedby="emailHelp" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="pass" name="pass" required>
        </div>

        <button type="submit" class="btn btn-primary text-center">Enviar</button>

    </form>

</div>

<script>
    if (window.history.replaceState) { // verificamos disponibilidad
        window.history.replaceState(null, null, window.location.href);
    }
</script>
<?php
$reload =false;
if($reload){
    echo '<script>location.reload();</script>';
}
?>
</body>
</html>
