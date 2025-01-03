@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="bold">Editar Ubicaciones</h1>
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
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-around">
                    <h6 class="m-0 font-weight-bold text-dark">Edición Ubicaciones</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('ubicaciones.update', $ubicaciones->i_pk_id)}}" method="POST" class="button-group">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="vc_pais">Países</label>
                            <select id="vc_pais" name="vc_pais" class="form-control" required>
                                <option value="">Seleccione un País</option>
                                @foreach(array_keys($paisesCiudades) as $pais)
                                    <option value="{{ $pais }}">{{ $pais }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="vc_ciudad">Ciudad</label>
                            <input type="text" id="vc_ciudad" name="vc_ciudad" value="{{ $ubicaciones->vc_ciudad }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="vc_direccion">Dirección</label>
                            <input type="text" id="vc_direccion" name="vc_direccion" value="{{ $ubicaciones->vc_direccion }}" class="form-control" required>
                        </div>
                        <button type="submit" class="btn">Actualizar</button>
                        <a href="{{ route('Ubicacion.ubicaciones') }}" class="btn">Regresar a Ubicaciones</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

