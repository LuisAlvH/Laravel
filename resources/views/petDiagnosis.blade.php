@extends('layouts.templeClient')

@section('content')
    <div class="container my-5">
        <h2 class="text-center mb-4">Diagnósticos de {{ $pet->name }}</h2>
        <div class="accordion" id="diagnosisAccordion">
            @foreach($diagnoses as $index => $diagnosis)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{ $index }}">
                        <button class="accordion-button @if($index !== 0) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="@if($index === 0) true @else false @endif" aria-controls="collapse{{ $index }}">
                            Diagnóstico {{ \Carbon\Carbon::parse($diagnosis->date)->format('d/m/Y') }}
                        </button>
                    </h2>
                    <div id="collapse{{ $index }}" class="accordion-collapse collapse @if($index === 0) show @endif" aria-labelledby="heading{{ $index }}" data-bs-parent="#diagnosisAccordion">
                        <div class="accordion-body">
                            {{ $diagnosis->description }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
