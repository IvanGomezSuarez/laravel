@extends('layout')
@section('content')
<?php
    $alumnos = App\Models\Adminalumn::get();
   $alumnId = App\Models\Adminalumn::find(Request::get('id-alumns'));
    //$qefaig = Request::get();
    echo '<pre>';
  //  print_r($alumnos);
  // print_r(Request::all());
   // print_r($alumnId::all());
    echo '</pre>';



?>

    <br><br>
    <div class="container">

        <h3>Edición de Alumnos</h3>
        <hr>
        <br>
        <div class="row">
            <div class="col-md-4">
                <form class="asignatio" action="" method="get">
                    @csrf

                    <div class="form-group editasign">
                        <label class=" mb-3" for="">
                         @if (Request::get('edita')&&(Request::get('id-alumns')))
                            Editar Alumno
                         @else
                            Crear Alumno
                          @endif
                       </label>
                        @if (Request::get('edita')&&(Request::get('id-alumns')))
                            <input type="hidden" name="id" value="{{$alumnId->id}}">
                       @endif

                        <div class=" mb-2">
                            <label>Nombre</label>
                            <input required type="text" class="form-control" name="name" placeholder="Nombre" value="@if (Request::get('edita')&&Request::get('id-alumns')){{$alumnId->name}}@endif">

                        </div>
                        <div class=" mb-2">
                            <label>Apellidos</label>
                            <input required type="text" class="form-control" name ="surname" placeholder="Apellidos" value="@if (Request::get('edita')&&Request::get('id-alumns')){{$alumnId->surname}}@endif">
                        </div>
                        <div class=" mb-2">
                            <label>Teléfono</label>
                            <input required type="text" class="form-control" name="telephone" placeholder="Telefono" value="@if (Request::get('edita')&&Request::get('id-alumns')){{$alumnId->telephone}}@endif">
                        </div>
                        <div class=" mb-2">
                            <label>Nif</label>
                            <input required type="text" class="form-control" name="nif" placeholder="NIF" value="@if (Request::get('edita')&&Request::get('id-alumns')){{$alumnId->nif}}@endif">
                        </div>
                        <div class=" mb-3">
                            <label>Email</label>
                            <input required type="text" class="form-control" name="email" placeholder="Email" value="@if (Request::get('edita')&&Request::get('id-alumns')){{$alumnId->email}}@endif">
                        </div>
                        <div class=" mb-2">
                            <label>Usuario</label>
                            <input required type="text" class="form-control" name="username" placeholder="Usuario"  value="@if (Request::get('edita')&&Request::get('id-alumns')){{$alumnId->username}}@endif">
                       </div>
                        <div class=" mb-3">
                            <label>Password</label>
                            <input id="password" data-toggle="password" required type="pass" class="form-control" name="pass" placeholder="Password" value="@if (Request::get('edita')&&Request::get('id-alumns')){{$alumnId->pass}}@endif">
                        </div>


                        <div class=" mb-3">
                            <label>Desde</label>
                            <input required type="date"  class="form-control" name="date_registered"
                                   value="<?php
                                            if (Request::get('edita')&&(Request::get('id-alumns'))) {
                                             $fechaold = $alumnId->date_registered;
                                             $fechanew = substr($fechaold, 0 ,10);
                                             echo $fechanew;
                                         } else {
                                              echo date('Y-m-d'); }?>">
                        </div>

                        @if (Request::get('edita')&&(Request::get('id-alumns')))
                            <input type="submit" formaction="/adminalumn/update" name="accion" value="Edita" class="btn btn-primary mb-2">
                        @else
                            <input type="submit" formaction="/adminalumn/crea" name="accion" value="Crear" class="btn btn-primary mb-2">
                        @endif

                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <form class="asignatio" action="" method="get">
                    @csrf

                    <div class="form-group editasign">
                        <label for="">Alumnos</label>
                        <select size="10" name="id-alumns"  class="form-control" id="" multiple>
                            @foreach ($alumnos as $alumno)
                                <option value="{{$alumno->id}}"><span>{{$alumno->name}} {{$alumno->surname}} -- {{$alumno->nif}} -- {{$alumno->email}}</span></option>
                            @endforeach

                        </select>
                        <br>
                        <input type="submit"  formaction="/adminalumn" name="edita" value="Edita" class="btn btn-primary mb-2">
                        <input type="submit" formaction="/adminalumn/borra" name="borra" value="Borra" class="btn btn-primary mb-2">
                    </div>
                </form>
            </div>
        </div>
        <br>
        <hr>
        <br>
    </div>


@endsection
