@extends('layouts.templateEmple')

@section('title', 'Agregar Diagnostico')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4 shadow-sm">
                <h2 class="text-center">Agregar Diagnostico</h2>
                <form action="{{ route('vendor.saveDiagnosis') }}" method="POST">
                    @csrf
                    <div class="form-group mt-4">
                        <label for="client_id">Seleccionar Cliente:</label>
                        <select name="client_id" id="client_id" class="form-control" onchange="getPets()" required>
                            <option value="">Selecciona un cliente</option>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}" 
                                        {{ old('client_id', request()->client_id) == $client->id ? 'selected' : '' }}>
                                    {{ $client->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mt-4" id="pet_select_div">
                        <label for="pet_id">Seleccionar Mascota:</label>
                        <select name="pet_id" id="pet_id" class="form-control">
                            <option value="">Selecciona una mascota</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="description">Descripcion:</label>
                        <textarea name="description" id="description" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="date">Fecha:</label>
                        <input type="date" name="date" id="date" class="form-control" max="{{ date('Y-m-d') }}">
                    </div>

                    <button type="submit" class="btn btn-limit botones_emple  mt-4">Agregar Diagnostico</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection


<script>
    function getPets() {
        var clientId = document.getElementById('client_id').value;
        if (clientId) {
            fetch(`/vendor/get-pets?client_id=${clientId}`)
                .then(response => response.json())
                .then(data => {
                    var petSelect = document.getElementById('pet_id');
                    petSelect.innerHTML = '<option value="">Selecciona una mascota</option>';

                    if (data.length > 0) {
                        data.forEach(function(pet) {
                            var option = document.createElement('option');
                            option.value = pet.id;
                            option.text = pet.name;
                            petSelect.appendChild(option);
                        });
                    } else {
                        var option = document.createElement('option');
                        option.text = 'No hay mascotas registradas para este cliente';
                        petSelect.appendChild(option);
                    }
                });
        } else {
            document.getElementById('pet_id').innerHTML = '<option value="">Selecciona una mascota</option>';
        }
    }
</script>

