<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">




<?php
  /*  include MOD.'_userConfigModel.php';
    include CONT.'_userConfigController.php';

    if (!$pass){
        echo '<script>alert("Los passwords han de coincidir");</script>';
    }

    if ($userocupado){
        echo '<script>alert("Usuario ya existente, elegir otro");</script>';
    }
*/

?>
<?php
use Illuminate\support\Facades\Request;
    $usuario = App\Models\Configuracion_usuario::get();
    $cursoId = App\Models\Course::find(Request::get('idcourse'));

    $warning='false';
    $noticepass='false';

    if (isset($_GET['warning'])){
        $warning = $_GET['warning'];
    }
    if (isset($_GET['passdsnmatch'])){
        $noticepass = $_GET['passdsnmatch'];
    }



    if (($warning=='true')&&($noticepass=='true')){
        echo '<script>alert("Los passwords han de coincidir");</script>';
    }

  /*  if ($userocupado){
        echo '<script>alert("Usuario ya existente, elegir otro");</script>';
    }*/
    echo '<pre>';
 //   print_r($usuario[0]);
    echo '</pre>';


?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
<br><br>
<div class="container">
    <h3>Configuración de <?php// echo ucfirst($_SESSION['name']);  ?></h3>
    <hr>
    <br>
    <div class="row">
        <div class="col-lg-4">
            <form class="asignatio" action="" method="get">
                @csrf

                <div class="form-group editasign">

                    <input type="hidden" name="id" value="{{$usuario[0]->id_user_admin}}">
                    <div class=" mb-3">
                        <label for="nombre">Nombre</label>
                        <input  required type="text" class="form-control" name="name" placeholder="Nombre"
                                value="{{$usuario[0]->name}}">
                    </div>
                    <div class="mb-3">
                        <label class="" for="">Nombre Usuario</label>
                        <input required type="text" class="form-control <?php //  if ($userocupado){ echo $dangeruser; } ?> "
                               name="username"
                               placeholder="Nombre Usuario"
                               value="{{$usuario[0]->username}}">
                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input required type="text" class="form-control"
                               name="email"
                               placeholder="Email"
                               value="{{$usuario[0]->email}}">
                    </div>
                    <div class="mb-3">
                        <label for="">Nuevo Password</label>
                        <input data-toggle="password" required type="password" class="form-control <?php   if ($warning&&$noticepass) { echo 'bg-warning'; } ?>"
                               name="password"
                               placeholder="Password"
                               value="{{$usuario[0]->password}}">
                    </div>
                    <div class="mb-4">
                        <input  data-toggle="password" required type="password" class="form-control <?php  if ($warning&&$noticepass) { echo 'bg-warning'; }  ?>"
                                name="passwordcomp"
                                placeholder="Password"
                                value="{{$usuario[0]->password}}">
                    </div>
                    <input type="submit" formaction="/configuracion_usuario/update" name="accion" value="Edita" class="btn btn-primary mb-2">
                </div>
            </form>
        </div>
    </div>

</div>


<script>
    if (window.history.replaceState) { // verificamos disponibilidad
        window.history.replaceState(null, null, window.location.href);
    }


</script>





