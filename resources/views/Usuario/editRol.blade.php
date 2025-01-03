<head>
    <link href="{{ url('css/vistadash.css')}}" rel="stylesheet">
</head>
@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="bold">Roles BIP</h1>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-around">
                    <h6 class="m-0 font-weight-bold text-dark">Edición Roles</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{ route('roles.update', $rol->i_pk_id) }}" method="POST" class="button-group">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="vc_rol">Nombre del Rol</label>
                            <input type="text" id="vc_rol" name="vc_rol" value="{{ $rol->vc_rol }}" class="form-control" required>
                        </div>
                        <button type="submit" class="btn">Actualizar</button>
                        <a href="{{ route('Usuario.usuarios') }}" class="btn">Regresar a Usuarios</a>
                    </form>
                </div>                
            </div>
        </div>
    </div>
@endsection