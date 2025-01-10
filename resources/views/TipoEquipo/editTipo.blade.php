@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="bold">Edición Tipos BIP</h1>
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
                    <h6 class="m-0 font-weight-bold text-dark">Formulario de Edición</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{ route('TipoEquipo.update', $tipo->i_pk_id) }}" method="POST" class="button-group">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="vc_tipo">Tipo de Equipo</label>
                            <input type="text" id="vc_tipo" name="vc_tipo" value="{{ $tipo->vc_tipo }}" class="form-control" required>
                        </div>
                        <button type="submit" class="btn">Actualizar</button>
                        <a href="{{ route('TipoEquipo.index') }}" class="btn ">Regresar a Equipos</a>
                    </form>
                </div>                
            </div>
        </div>
    </div>
@endsection