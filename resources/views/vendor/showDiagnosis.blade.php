@extends('layouts.templateEmple')

@section('title', 'Ver Diagnostico')

@section('content')
<div class="container my-5">
    <h4>Detalles del Diagnostico</h4>

    <div class="card shadow p-4">
        <div class="mb-3">
            <label for="client">Cliente:</label>
            <input type="text" id="client" class="form-control" value="{{ $diagnosis->pet->client->name }}" disabled>
        </div>
        <div class="mb-3">
            <label for="pet">Mascota:</label>
            <input type="text" id="pet" class="form-control" value="{{ $diagnosis->pet->name }}" disabled>
        </div>

        <div class="mb-3">
            <label for="description">Descripcion:</label>
            <textarea id="description" class="form-control" rows="4" disabled>{{ $diagnosis->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="date">Fecha:</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ $diagnosis->date }}" max="{{ now()->toDateString() }}" disabled>
        </div>

        <a href="{{ route('vendor.editDiagnosis', $diagnosis->id) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('vendor.viewsDiagnosis') }}" class="btn btn-secondary mt-3">Volver</a>
    </div>
</div>
@endsection
