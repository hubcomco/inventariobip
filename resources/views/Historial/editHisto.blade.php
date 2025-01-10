@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="bold">Historial Equipos BIP</h1>
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
        <div class="col-md-9">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-around">
                    <h6 class="m-0 font-weight-bold text-dark">Edición del Historial</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('historial.update', $historial->i_pk_id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="i_fk_id_equipo">Equipo</label>
                                    <select id="i_fk_id_equipo" name="i_fk_id_equipo" class="form-control" required>
                                        <option value="">Seleccione un equipo</option>
                                        @foreach ($equipos as $equipo)
                                            <option value="{{ $equipo->i_pk_id }}" {{ $historial->i_fk_id_equipo == $equipo->i_pk_id ? 'selected' : '' }}>
                                                {{ $equipo->vc_nombre_equipo }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="i_fk_id_empleado">Empleado</label>
                                    <select id="i_fk_id_empleado" name="i_fk_id_empleado" class="form-control" required>
                                        <option value="">Seleccione un empleado</option>
                                        @foreach ($empleados as $empleado)
                                            <option value="{{ $empleado->i_pk_id }}" {{ $historial->i_fk_id_empleado == $empleado->i_pk_id ? 'selected' : '' }}>
                                                {{ $empleado->vc_nombre }} {{ $empleado->vc_apellido }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="i_fk_id_ubicacion">Ubicación</label>
                                    <select id="i_fk_id_ubicacion" name="i_fk_id_ubicacion" class="form-control" required>
                                        <option value="">Seleccione una ubicación</option>
                                        @foreach ($ubicaciones as $ubicacion)
                                            <option value="{{ $ubicacion->i_pk_id }}" {{ $historial->i_fk_id_ubicacion == $ubicacion->i_pk_id ? 'selected' : '' }}>
                                                {{ $ubicacion->vc_ciudad }} {{ $ubicacion->vc_pais }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn">Actualizar Historial</button>
                        <a href="{{ route('Historial.historial') }}" class="btn">Regresar a historial</a>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    $(document).ready(function () {
        $('#i_fk_id_equipo, #i_fk_id_empleado, #i_fk_id_ubicacion').select2({
            placeholder: "Seleccione una opción",
            allowClear: true
        });
    });
</script>
