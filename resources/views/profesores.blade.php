@extends('layout')
@section('content')
<?php

$profesores = App\Models\Profesor::get();

$profesorId = App\Models\Profesor::find(Request::get('borra-id-profs'));

echo '<pre>';
    print_r($profesorId);



   echo '</pre>';
?>

<br><br>
    <div class="container">
        <h3>Edición de Profesores</h3>
        <hr>
        <br>
        <div class="row">
            <div class="col-lg-4">
                <form class="asignatio" action="" method="post">
                    @csrf

                    <div class="form-group editasign">
                        <label class=" mb-3" for="">
                          @if (Request::get('edita')) Editar Profesor @else Crear Profesor @endif



                          @if (Request::get('edita')) <input type="hidden" name="id" value="{{$profesorId['id_teacher']}}">@endif


                        <div class=" mb-2">
                            <label>Nombre</label>
                            <input required type="text" class="form-control" name="name" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1" value="@if (Request::post('edita')) {{$profesorId['name']}} @endif">
                        </div>
                        <div class=" mb-2">
                            <label>Apellidos</label>
                            <input required type="text" class="form-control" name ="surname" placeholder="Apellidos" aria-label="Apellidos" aria-describedby="basic-addon1" value="@if (Request::post('edita')) {{$profesorId['surname']}} @endif">
                        </div>
                        <div class=" mb-2">
                            <label>Teléfono</label>
                            <input required type="text" class="form-control" name="telephone" placeholder="Telefono" aria-label="Telefono" aria-describedby="basic-addon1" value="@if (Request::post('edita')) {{$profesorId['telephone']}} @endif">
                        </div>
                        <div class=" mb-2">
                            <label>Nif</label>
                            <input required type="text" class="form-control" name="nif" placeholder="NIF" aria-label="NIF" aria-describedby="basic-addon1" value="@if (Request::post('edita')) {{$profesorId['nif']}} @endif"></div>
                        <div class=" mb-3">
                            <label>Email</label>
                            <input required type="text" class="form-control" name="email" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" value="@if (Request::post('edita')) {{$profesorId['email']}} @endif">
                        </div>

                        @if (Request::get('edita'))
                            <input type="submit" formaction="profesores/update" name="accion" value="Edita" class="btn btn-primary mb-2">
                        @else
                            <button type="submit" formaction='profesores/crea'class="btn btn-primary mb-2">Crear Profesor</button>
                        @endif


                    </div>
                </form>
            </div>
            <div class="col-lg-8">
                <form class="asignatio" action="" method="get">
                @csrf
                    <div class="form-group editasign">
                            <label for="exampleFormControlSelect1">Listado de Profesores</label>
                            <select size="10" name="borra-id-profs"  class="form-control" id="exampleFormControlSelect1" multiple>
                               @foreach ($profesores as $profesor)
                                <option value="{{$profesor->id_teacher}}"><span>{{$profesor->name}} {{$profesor->surname}} / tel:{{$profesor->telephone}} / NIF:{{$profesor->nif}} /@: {{$profesor->email}}</option>

                               @endforeach

                            </select>
                            <br>
                            <input type="submit" name="edita" value="Edita" class="btn btn-primary mb-2">
                            <input type="submit" formaction='profesores/borra' name="borra" value="Borra" class="btn btn-primary mb-2">


                    </div>
                </form>
            </div>
        </div>
        <br>
        <hr>
        <br>
    </div>

@endsection
