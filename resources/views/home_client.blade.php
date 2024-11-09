@extends('layouts.templateEmple')

@section('content')
    <div class="row my-5">
        <div class="col-lg-12 col-sm-12 col-xs-12">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('storage/1.jpg') }}" class="d-block w-100 img-fluid shadow p-3 mb-5 bg-body-tertiary rounded"
                             alt="Perros y gatos cachorros mirando hacia adelante">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('storage/2.jpg') }}" class="d-block w-100 img-fluid shadow p-3 mb-5 bg-body-tertiary rounded"
                             alt="Perros y gatos adultos posando para una foto grupal">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('storage/3.jpg') }}" class="d-block w-100 img-fluid shadow p-3 mb-5 bg-body-tertiary rounded"
                             alt="Distintas razas de perros y gatos posando en hilera">
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
