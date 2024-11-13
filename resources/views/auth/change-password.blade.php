@extends('layouts.templeClient')

@section('content')
<div class="container d-flex justify-content-center my-5">
    <div class="edit_perfil bg-light p-5 shadow-lg">
        <h2 class="text-center mb-4">Cambiar Contraseña</h2>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            @method('PUT')

            <div class="form-group mb-4">
                <x-input-label for="current_password" :value="__('Contraseña Actual')" />
                <x-text-input id="current_password" type="password" name="current_password" class="form-control" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
            </div>

            <div class="form-group mb-4">
                <x-input-label for="password" :value="__('Nueva Contraseña')" />
                <x-text-input id="password" type="password" name="password" class="form-control" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="form-group mb-4">
                <x-input-label for="password_confirmation" :value="__('Confirmar Nueva Contraseña')" />
                <x-text-input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-limit botones_clientes rounded-4">
                    {{ __('Actualizar Contraseña') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

