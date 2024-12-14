@extends('layouts.templeClient')

@section('content')

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if($invoices->isNotEmpty())
<div class="container my-5">
    <h2 class="text-center mb-4">Facturas de {{ Auth::user()->name }}</h2>
    <div class="accordion" id="invoiceAccordion">
        @foreach($invoices as $index => $invoice)
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading{{ $index }}">
                <button class="accordion-button @if($index !== 0) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="@if($index === 0) true @else false @endif" aria-controls="collapse{{ $index }}">
                    Factura N° {{ $invoice->id }} - {{ \Carbon\Carbon::parse($invoice->date)->format('d/m/Y') }}
                    @if($invoice->status === 'Pending')
                    <span class="text-danger ms-3">(Impaga)</span>
                    @elseif($invoice->status === 'Paid')
                    <span class="text-success ms-3">(Pagada)</span>
                    @else
                    <span class="text-warning ms-3">({{ ucfirst($invoice->status) }})</span>
                    @endif
                </button>
            </h2>
            <div id="collapse{{ $index }}" class="accordion-collapse collapse @if($index === 0) show @endif" aria-labelledby="heading{{ $index }}" data-bs-parent="#invoiceAccordion">
                <div class="accordion-body">
                    <p><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($invoice->date)->format('d/m/Y') }}</p>
                    <p><strong>Estado:</strong>
                        @if($invoice->status === 'Pending')
                        <span class="text-danger">Impaga</span>
                        @elseif($invoice->status === 'Paid')
                        <span class="text-success">Pagada</span>
                        @else
                        <span class="text-warning">{{ ucfirst($invoice->status) }}</span>
                        @endif
                    </p>
                    <p><strong>Empleado a cargo:</strong> {{ $invoice->employee->name ?? 'No asignado' }}</p>
                    <p><strong>Descripción del diagnóstico:</strong> {{ $invoice->diagnosis->description ?? 'No disponible' }}</p>
                    
                    @if ($invoice->status === 'impaga')
                    <form action="{{route('invoices.payInvoice', $invoice->id)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-success mt-3">Pagar Factura</button>
                    </form>    
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


@else

<div class="alert alert-warning d-flex justify-content-center align-items-center py-5 fs-5 ">
    {{ Auth::user()->name }} no presentas facturas cargadas...
</div>




@endif
@endsection