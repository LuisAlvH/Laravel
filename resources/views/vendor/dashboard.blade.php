@extends('layouts.templateEmple')
@section('title','Home')

@section('content')
    
{{-- HOME --}}


<div class="row my-5">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('storage/img/vet1.jpg') }}"
                        class="d-block w-100 img-fluid shadow p-3 mb-5 bg-body-tertiary rounded"
                        alt="Dos colegas veterinarios atendiendo mascota" width="1000" height="600">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/img/vet2.jpg') }}"
                        class="d-block w-100 img-fluid shadow p-3 mb-5 bg-body-tertiary rounded"
                        alt="Dos veterinarios luego de operar mascota" width="1000" height="600">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/img/vet3.jpg') }}"
                        class="d-block w-100 img-fluid shadow p-3 mb-5 bg-body-tertiary rounded"
                        alt="Un veterinario realizando control médico a un perro" width="1000" height="600">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>


@endsection