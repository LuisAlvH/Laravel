@extends('layouts.templeClient')

@section('content')
<div class="container my-5">
    <div class="row">
        <h2 class="text-center mb-4">Mis Mascotas</h2>

        @foreach($pets as $pet)
            <div class="col-md-6">
                <div class="pet-card shadow-sm p-4 mb-4 rounded text-center">
                    <h3 class="pet-title">{{ $pet->name }}</h3>
                    <p>Especie: {{ ucfirst($pet->species) }}</p>
                    <p>Raza: {{ $pet->race }}</p>
                    <p>Fecha de Nacimiento: {{ \Carbon\Carbon::parse($pet->date_of_birth)->format('d/m/Y') }}</p>
                    <a href="{{ route('petDiagnosis', ['pet_id' => $pet->id]) }}
                    " class="btn btn-info btn-lg color_inicioSesion_bton"> Ver Diagnóstico
                    </a>
                </div>
            </div>
        @endforeach

    </div>
</div>
@endsection