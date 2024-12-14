@extends('layouts.templateEmple')

@section('title', 'Ver Diagnosticos')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container my-5">
    <h2 class="text-center">Ver Diagnosticos</h2>

    <form action="{{ route('vendor.viewsDiagnosis') }}" method="GET" id="filterForm">
        <div class="form-group">
            <label for="client">Cliente:</label>
            <select id="client" name="client_id" class="form-control" required>
                <option value="">Seleccione un cliente</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ request('client_id') == $client->id ? 'selected' : '' }}>
                        {{ $client->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="pet">Mascota:</label>
            <select id="pet" name="pet_id" class="form-control" required>
                <option value="">Seleccione una mascota</option>
                @if(isset($pets))
                    @foreach($pets as $pet)
                        <option value="{{ $pet->id }}" {{ request('pet_id') == $pet->id ? 'selected' : '' }}>
                            {{ $pet->name }}
                        </option>
                    @endforeach
                @endif
            </select>
        </div>

        <button type="submit" class="btn btn-limit botones_emple mt-3">Buscar</button>
    </form>

    @if(isset($diagnoses) && $diagnoses->isNotEmpty())
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($diagnoses as $diagnosis)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($diagnosis->date)->format('d/m/Y') }}</td>
                        <td>{{ $diagnosis->description }}</td>
                        <td>
                            <a href="{{ route('vendor.showDiagnosis', $diagnosis->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('vendor.editDiagnosis', $diagnosis->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('vendor.deleteDiagnosis', $diagnosis->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-warning mt-4">
            @if(!request('client_id') || !request('pet_id'))
                No se ha seleccionado un cliente ni una mascota.
            @else
                No hay diagnósticos disponibles para esta mascota.
            @endif
        </div>
    @endif
</div>

<script>
    document.getElementById('client').addEventListener('change', function () {
        let clientId = this.value;

        fetch(`/vendor/get-pets?client_id=${clientId}`)
            .then(response => response.json())
            .then(data => {
                let petSelect = document.getElementById('pet');
                petSelect.innerHTML = '<option value="">Seleccione una mascota</option>';
                data.forEach(pet => {
                    petSelect.innerHTML += `<option value="${pet.id}">${pet.name}</option>`;
                });
            });
    });
</script>

@endsection
