@extends('layouts.templateEmple')


@section('title','Mascotas')

@section('content')

{{-- AÑADIR MASCOTA --}}

@if(count($allUsser) > 0)

<main class="row my-5">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="col d-flex justify-content-center my-5 rounded-5  p-5 ">


        <form method="get" action="{{ route('vendor.createPet') }}" class="form_mascota">
            @csrf
            <div class="mb-3 w-70">
                <h2 class="text-center mb-4">AÑADIR MASCOTAS</h2>
                <div class="d-flex justify-content-center">

                    <select name="userSelec" id="userSelec" class="w-100"><br>

                        @foreach($allUsser as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option><br>
                        @endforeach

                    </select>
                </div>
            </div>
            <div>

                <input type="submit" value="COMPLETAR INFORMACION DE LA MASCOTA" class="btn btn-limit botones_emple my-3 rounded-4 mt-4" role="button">
            </div>



        </form>

    </div>
</main>
@else
<br>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@endif





@endsection