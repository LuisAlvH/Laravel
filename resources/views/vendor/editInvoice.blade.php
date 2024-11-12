@extends('layouts.templateEmple')

@section('title', 'Editar Factura')

@section('content')

<div class="container my-5">
    <h2>Editar Factura</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow p-4">
        <form action="{{ route('vendor.updateInvoice', $invoice->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="client_id" class="form-label">Cliente:</label>
                <input type="text" class="form-control" id="client_id" value="{{ $invoice->client->name }}" disabled>
            </div>

            <div class="mb-3">
                <label for="diagnosis_id" class="form-label">Diagnostico:</label>
                <select name="diagnosis_id" id="diagnosis_id" class="form-control" required>
                    <option value="">Selecciona un diagnostico</option>
                    @foreach ($diagnostics as $diagnosis)
                        <option value="{{ $diagnosis->id }}" 
                            {{ old('diagnosis_id', $invoice->diagnosis_id) == $diagnosis->id ? 'selected' : '' }}>
                            {{ $diagnosis->description }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Fecha:</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $invoice->date) }}" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Estado de la Factura:</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="impaga" {{ old('status', $invoice->status) == 'impaga' ? 'selected' : '' }}>Impaga</option>
                    <option value="pagada" {{ old('status', $invoice->status) == 'pagada' ? 'selected' : '' }}>Pagada</option>
                    <option value="cancelada" {{ old('status', $invoice->status) == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Factura</button>
        </form>
    </div>
</div>

@endsection
