@extends('layouts.templateEmple')

@section('title', 'Detalles de la Factura')

@section('content')

<div class="container my-5 ">
    <h2>Detalles de la Factura #{{ $invoice->id }}</h2>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="card shadow p-4">
        <div class="mb-3">
            <label for="client" class="form-label">Cliente:</label>
            <input type="text" class="form-control" id="client" value="{{ $invoice->client->name }}" disabled>
        </div>

        <div class="mb-3">
            <label for="diagnosis" class="form-label">Diagnostico:</label>
            <input type="text" class="form-control" id="diagnosis" value="{{ $invoice->diagnosis->description }}" disabled>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Fecha:</label>
            <input type="text" class="form-control" id="date" value="{{ $invoice->date }}" disabled>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Estado:</label>
            <input type="text" class="form-control" id="status" value="{{ ucfirst($invoice->status) }}" disabled>
        </div>

        <a href="{{ route('vendor.editInvoice', $invoice->id) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('vendor.viewsInvoice') }}" class="btn btn-secondary mt-3">Volver</a>
    </div>
</div>

@endsection