<head>
    <link href="{{ url('css/vistadash.css')}}" rel="stylesheet">
</head>
@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="bold">Historial BIP</h1>
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
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-dark">Edición del Historial</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="vc_nombre">Id_Equipo</label>
                                <input value="{{ $historial->equipo->vc_nombre_equipo ?? '' }}" id="vc_nombre" name="vc_nombre" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="vc_nombre">Id_Empleado</label>
                                <input id="vc_nombre" value="{{ $historial->empleado->vc_nombre ?? '' }}" name="vc_nombre" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="vc_nombre">Id_Ubicación</label>
                                <input id="vc_nombre" value="{{ $historial->ubicaciones->vc_nombre ?? '' }}" name="vc_nombre" type="text" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="vc_observaciones">Observaciones</label>
                                <input value="{{ $historial->vc_observaciones ?? '' }}" id="vc_observaciones" name="vc_observaciones" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="d_fecha_observaciones">Fecha de la Observación</label>
                                <input id="d_fecha_observaciones" value="{{ $historial->d_fecha_observaciones ?? '' }}" name="d_fecha_observaciones" type="date" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('historial.update', $historial->i_pk_id) }}" method="POST" class="button-group">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn">Actualizar</button>
                        <a href="{{ route('personal.historial') }}" class="btn">Regresar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
