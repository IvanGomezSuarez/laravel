@extends('layout')

@section('content')

<?php
$asignaturas = App\Models\Asignatura::get();

$asignaturaId = App\Models\Asignatura::find(Request::get('borra-id-asigns'));

echo '<pre>';
    print_r($asignaturas);
echo '</pre>';

?>


<br><br>
<div id="adminasign" class="container">
    <h3>Edición de asignaturas</h3>

    <hr>
    <br>
    <div class="row">
        <div class="col-md-4">
            <form  class="asignatio" action="crea" method="post">
                @csrf
                <div class="form-group editasign">
                    <label for="">@if (Request::get('edita')) Editar Asignatura @else Crear Asignatura @endif</label>

                        <div class="input-group mb-3">
                            @if (Request::get('edita'))<input type="hidden" name="id" value="{{$asignaturaId->id_class}}"> @endif

                            <input autofocus="true" required type="text" class="form-control fullwidth"
                                   name="name" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1"
                                   value="@if (Request::get('edita')){{$asignaturaId->name}}@endif">
                            <br>
                            <label for="favcolor">Elegir color :  </label>
                            <input  class="form-control asign color" type="color" id="favcolor" name="color" value="@if (Request::get('edita')){{$asignaturaId->color}}@endif">
                        </div>




                    @if (Request::get('edita'))
                            <input type="submit" name="accion" value="Edita" class="btn btn-primary mb-2">
                    @else
                            <button type="submit" class="btn btn-primary mb-2">Crear Asignatura</button>
                    @endif
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <form class="asignatio" action="" method="">

                <div class="form-group editasign">
                    <label for="exampleFormControlSelect1">Lista de Asignaturas</label>
                    <select name="borra-id-asigns" size="10" class="form-control" id="">
                      @foreach ($asignaturas as $asignatura)
                                <option style="color:{{$asignatura->color}}; font-weight:900;" value="{{$asignatura->id_class}}">{{$asignatura->name}}</span></option>
                      @endforeach


                    </select>
                    <br>
                    <input type="submit" name="edita" value="Edita" class="btn btn-primary mb-2">
                    <input type="submit" name="borra" value="Borra" class="btn btn-primary mb-2">

                </div>
            </form>

        </div>
    </div>
    <br>
    <hr>
 </div>
<script>
    if (window.history.replaceState) { // verificamos disponibilidad
        window.history.replaceState(null, null, window.location.href);
    }


</script>
<?php /*
if($reload){
    echo '<script>location.reload();</script>';
}*/
?>

@endsection