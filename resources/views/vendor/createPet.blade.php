@extends('layouts.templateEmple')


@section('title','Mascotas')

@section('content')

{{-- CREAR MASCOTA --}}

<main class="row my-5">
    <div class="col-12 d-flex justify-content-center my-5 rounded-5 p-5 ">
        <form method="POST" action="{{ route('vendor.savePet') }}" class="for_registro_mascota">
            @csrf

            <div>
                <h2>REGISTRAR MASCOTA</h2>
                <input type="hidden" name="userId" value="{{ $userId }}">
                <label for="nombre" class="form-label my-1 ">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="Nombre" placeholder="Nombre...">
                @error('nombre')
                <span class="text-danger small ">{{ $message }}</span>

                @enderror
                <br>
                <label for="especie" class="form-label my-1 pt-3">Especie</label>
                <input type="text" name="especie" class="form-control" id="Especie" placeholder="Especie...">
                @error('especie')
                <span class="text-danger small ">{{ $message }}</span>
                @enderror
                <br>

                <label for="raza" class="form-label my-1 pt-3">Raza</label>
                <input type="text" name="raza" class="form-control" id="Raza" placeholder="Raza...">
                @error('raza')
                <span class="text-danger small mb-4">{{ $message }}</span>
                @enderror
                <br>
                <label for="nacimiento" class="form-label my-1 pt-3">Nacimiento</label>
                <input type="date" name="nacimiento" class="form-control" id="Nacimiento" placeholder="Nacimiento...">

                @error('nacimiento')
                <span class="text-danger small ">{{ $message }}</span>
                @enderror
                <br>
            </div>

            <div class="d-grid gap-2 col-6 mx-auto my-3">
                <button class="btn btn-limit botones_emple rounded-4 mt-4" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</main>





















@endsection