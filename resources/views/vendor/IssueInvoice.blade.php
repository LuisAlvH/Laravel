@extends('layouts.templateEmple')


@section('title','Factura')

@section('content')

{{-- EMITIR FACTURA--}}



@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="container my-5">

    <div class="row justify-content-center">

        <div class="col-md-8 col-lg-6 d-flex justify-content-center rounded-5 bg-light p-5 shadow-lg">



            <form class="w-100" action="{{ route('saveIssue') }}" method="POST">
                @csrf
                <h2 class="text-center">Emitir Factura</h2>

                <div class="form-group mt-4">
                    <label for="user_id">Seleccionar Cliente:</label>
                    <select name="user_id" id="user_id" required>
                        <option value=""> Selecciona un cliente </option>
                        @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mt-4">
                    <label for="diagnosis_id">Seleccionar Diagnostico:</label>
                    <select name="diagnosis_id" id="diagnosis_id" required>
                        <option value=""> Selecciona un diagnostico </option>
                    </select>
                </div>

                <div class="form-group mt-4">
                    <label for="date">Fecha:</label>
                    <input type="date" name="date" id="date" required>
                </div>

                <button type="submit" class="btn btn-limit botones_emple  mt-4">Emitir Factura</button>
            </form>


            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $('#user_id').on('change', function() {
                    var clientId = $(this).val();
                    if (clientId) {
                        $.ajax({
                            url: '{{ route("getDiagnostics") }}',
                            type: 'GET',
                            data: {
                                client_id: clientId
                            },
                            success: function(response) {
                                var diagnosisSelect = $('#diagnosis_id');
                                diagnosisSelect.empty();
                                diagnosisSelect.append('<option value=""> Selecciona un diagnostico </option>');
                                response.forEach(function(diagnosis) {
                                    diagnosisSelect.append('<option value="' + diagnosis.id + '">' + diagnosis.description + '</option>');
                                });
                            }
                        });
                    } else {
                        $('#diagnosis_id').empty();
                        $('#diagnosis_id').append('<option value=""> Selecciona un diagnostico </option>');
                    }
                });
            </script>







        </div>

    </div>

</div>

@endsection