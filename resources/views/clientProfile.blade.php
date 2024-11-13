@extends('layouts.templeClient')

@section('content')
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 d-flex justify-content-center rounded-5 bg-light p-5 shadow-lg">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
      @endif


      <form method="POST" action="{{ route('clientProfile.updateProfile') }}" class="w-100">
        @csrf

        <h2 class="text-center">Mi Perfil</h2>

        
        <div class="form-group mt-4">
          <label class="form-label">Nombre y apellido actual:</label>
          <p class="text-muted">{{ $user->name }}</p> 
          <input type="text" id="name" name="name" class="form-control my-1" placeholder="Nuevo nombre y apellido..." value="{{ old('name', $user->name) }}">
          @error('name')
            <span class="text-danger small">{{ $message }}</span>
          @enderror
        </div>

        
        <div class="form-group mt-4">
          <label class="form-label">E-mail actual:</label>
          <p class="text-muted">{{ $user->email }}</p>
          <input type="email" id="email" name="email" class="form-control my-1" placeholder="Nuevo e-mail..." value="{{ old('email', $user->email) }}">
          @error('email')
            <span class="text-danger small">{{ $message }}</span>
          @enderror
        </div>

        
        <div class="form-group mt-4">
          <label class="form-label">Teléfono actual:</label>
          <p class="text-muted">{{ $user->telefono }}</p>
          <input type="text" id="telefono" name="telefono" class="form-control my-1" placeholder="Nuevo teléfono..." value="{{ old('telefono', $user->telefono) }}">
          @error('telefono')
            <span class="text-danger small">{{ $message }}</span>
          @enderror
        </div>

        
        <div class="form-group mt-4">
          <label class="form-label">Dirección actual:</label>
          <p class="text-muted">{{ $user->direccion }}</p>
          <input type="text" id="direccion" name="direccion" class="form-control my-1" placeholder="Nueva dirección..." value="{{ old('direccion', $user->direccion) }}">
          @error('direccion')
            <span class="text-danger small">{{ $message }}</span>
          @enderror
        </div>

        
        <div class="d-grid gap-2 col-6 mx-auto mt-5">
          <button class="btn btn-limit botones_clientes rounded-4 mt-4" type="submit">Guardar Cambios</button>
          <button class="btn btn-limit botones_clientes rounded-4 mt-4" type="button" onclick="window.location.href='{{ route('passwordChange') }}'">Cambiar Contraseña</button>
        </div>

      </form>
    </div>
  </div>
</div>
@endsection

