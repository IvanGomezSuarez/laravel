@extends('layout')
@section('content')

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




@endsection
