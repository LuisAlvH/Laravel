@extends('layouts.templateEmple')


@section('title','Mascotas')

@section('content')

{{-- ver mascota --}}


@if(count($allUsser) > 0)

<main class="row my-5">
    <div class="col d-flex justify-content-center my-5 rounded-5  p-5 ">
        <form method="POST" action="{{ route('vendor.viewsPet') }}" class="form_mascota">
            @csrf
            <div class="mb-3 w-70">
                <h2 class="text-center mb-4">Cliente</h2>
                <div class="d-flex justify-content-center">

                    <select name="userSelec" id="userSelec" class="w-100"><br>
                        <option value="" selected disabled>Seleccione un cliente...</option>
                        @foreach($allUsser as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option><br>
                        @endforeach

                    </select>
                </div>
            </div>
            <div>

                <input type="submit" value="Selecciona el cliente" class="btn btn-limit botones_emple my-3 rounded-4 mt-4" role="button">
            </div>



        </form>

    </div>
</main>
@else
<br>
<h2>NO HAY CLIENTES</h2>

@endif

<div class="container">
    <div class="card">
        <div class="card header text-center">
            MASCOTAS REGISTRADAS

        </div>
        <div class="card-body">
            <table class="table table-sm table-striped table-bordered">
                <thead>
                    <th>Nombre</th>
                    <th>Especie</th>
                    <th>Raza</th>
                    <th>Fecha Nacimiento</th>
                </thead>

                @foreach($Mascotas as $mascota)

                <tbody>
                    <th>{{$mascota->name}}</th>
                    <th>{{$mascota->species}}</th>
                    <th>{{$mascota->race}}</th>
                    <th>{{$mascota->date_of_birth}}</th>
                    <th> <a href="{{ route('vendor.editPet', ['id_registro' => $mascota->id]) }}" style="display:inline-block"><button type=" submit" class="btn btn-danger btn-sm">Editar</button></a>

                    </th>
                    <th>
                        <form action="{{ route('vendor.deletePet', ['id_registro' => $mascota->id]) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>


                    </th>

                </tbody>
                @endforeach
            </table>

        </div>
    </div>

</div>


@endsection