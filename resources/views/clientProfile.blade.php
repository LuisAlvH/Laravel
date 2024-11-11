@extends('layouts.templeClient')

@section('content')

<div class="container my-5">

<div class="row justify-content-center">

  <div class="col-md-8 col-lg-6 d-flex justify-content-center rounded-5 bg-light p-5 shadow-lg">

    <form class="w-100">

      <h2 class="text-center">Mí Perfil</h2>

      <div class="form-group mt-4">
        <label for="name" class="form-label">Nombre y apellido</label>
        <input type="text" id="name" class="form-control my-1" placeholder="nombre y apellido..">
      </div>

      <div class="form-group mt-4">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" id="email" class="form-control my-1" placeholder="e-mail..">
      </div>

      <div class="form-group mt-4">
        <label for="phone" class="form-label">Telefono</label>
        <input type="text" id="phone" class="form-control my-1" placeholder="telefono..">
      </div>

      <div class="form-group mt-4">
        <label for="address" class="form-label">Direccion</label>
        <input type="text" id="address" class="form-control my-1" placeholder="direccion..">
      </div>

      <div class="d-grid gap-2 col-6 mx-auto mt-5">

        <button class="btn btn-limit botones_clientes rounded-4 mt-4" type="button">CAMBIAR CONTRASEÑA</button>
      </div>

    </form>
  </div>

</div>

</div>

@endsection