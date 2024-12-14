@extends('layouts.templateEmple')

@section('title', 'Editar Diagnostico')

@section('content')
<div class="container my-5">
    <h2 class="text-center">Editar Diagnostico</h2>

    <form action="{{ route('vendor.updateDiagnosis', $diagnosis->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="client">Cliente:</label>
            <input type="text" class="form-control" value="{{ $diagnosis->pet->client->name }}" disabled>
        </div>

        <div class="form-group mt-3">
            <label for="pet">Mascota:</label>
            <input type="text" class="form-control" value="{{ $diagnosis->pet->name }}" disabled>
        </div>

        <div class="form-group mt-3">
            <label for="description">Descripcion:</label>
            <textarea name="description" id="description" class="form-control" rows="4">{{ $diagnosis->description }}</textarea>
        </div>

        <div class="form-group mt-3">
            <label for="date">Fecha:</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $diagnosis->date) }}" max="{{ date('Y-m-d') }}">
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-limit botones_emple">Guardar</button>
            <a href="{{ route('vendor.viewsDiagnosis') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
