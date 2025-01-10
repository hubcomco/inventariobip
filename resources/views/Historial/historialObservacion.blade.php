@extends('layouts.admin')
@section('content')
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
        <div class="col-md-12">
            <h1 class="bold">Observaciones del Historial</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-around">
                    <h6 class="m-0 font-weight-bold text-dark">Agregar Observación</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('HistorialObservacion.update', $historial->i_pk_id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="i_fk_id_historial">Historial Número: {{ $historial->i_pk_id }}</label>
                                </div>
                                <div class="form-group">
                                    <label for="vc_observacion">Ingresa la Observación</label>
                                    <input type="text" id="vc_observacion" 
                                           value="{{ $observacion->vc_observacion ?? '' }}" 
                                           name="vc_observacion" 
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn">Registrar Observación</button>
                        <a href="{{ route('Historial.historial') }}" class="btn">Regresar a Historial</a>
                    </form>                    
                </div>
            </div>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Id Historial</th>
                <th>Observación</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($observaciones as $observacion)
                <tr>
                    <td>{{ $observacion->i_pk_id }}</td>
                    <td>{{ $historial->i_pk_id }}</td>
                    <td>{{ $observacion->vc_observacion }}</td>
                    <td>{{ $observacion->created_at }}</td>
                    <td>
                        <a href="{{ route('HistorialObservacion.edit', $observacion->i_pk_id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('HistorialObservacion.destroy', $observacion->i_pk_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
