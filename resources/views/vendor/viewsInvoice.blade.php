@extends('layouts.templateEmple')

@section('title', 'Ver Facturas')

@section('content')

<h2>Ver Facturas</h2>

<div class="container my-5">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <form action="{{ route('vendor.getInvoices') }}" method="GET">
        <label for="client_id">Seleccionar Cliente:</label>
        <select name="client_id" id="client_id" required class="form-control mb-3">
            <option value="">Selecciona un cliente</option>
            @foreach ($users as $user)
            <option value="{{ $user->id }}" {{ request('client_id') == $user->id ? 'selected' : '' }}>
                {{ $user->name }}
            </option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-limit botones_emple">Buscar Facturas</button>
    </form>

    @if (isset($invoices) && count($invoices) > 0)
    <table class="table table-bordered table-striped table-hover mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
            <tr>
                <td>{{ $invoice->id }}</td>
                <td>{{ $invoice->date }}</td>
                <td>{{ $invoice->status }}</td>
                <td>
                    <a href="{{ route('vendor.viewInvoice', $invoice->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('vendor.editInvoice', $invoice->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('vendor.deleteInvoice', $invoice->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-limit botones_emple btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>No se encontraron facturas para este cliente.</p>
    @endif
</div>

@endsection