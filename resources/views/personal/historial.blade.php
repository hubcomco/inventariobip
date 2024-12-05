<head>
    <link href="{{ url('css/vistadash.css')}}" rel="stylesheet">
</head>
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
            <h1 class="bold">Historial Equipos BIP</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button id="btnVerForm" class="btn mb-4">Abrir Formulario</button>
        </div>
    </div>
    <div class="row" id="verHisto" style="display:none;">
        <div class="col-md-9">
            <div class="card shadow mb-4">
                <!-- Card Header -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-around">
                    <h6 class="m-0 font-weight-bold text-dark">Historiales BIP</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{ route('historial.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="i_fk_id_equipo">Equipo</label>
                                    <select id="i_fk_id_equipo" name="i_fk_id_equipo" class="form-control" required>
                                        <option value="">Seleccione un equipo</option>
                                        @foreach ($equipos as $equipo)
                                            <option value="{{ $equipo->i_pk_id }}">{{ $equipo->vc_nombre_equipo }}</option>
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
                                            <option value="{{ $empleado->i_pk_id }}">{{ $empleado->vc_nombre }} {{ $empleado->vc_apellido }}</option>
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
                                            <option value="{{ $ubicacion->i_pk_id }}">{{ $ubicacion->vc_ciudad }} {{ $ubicacion->vc_pais }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="vc_observaciones">Contenido</label>
                                    <input id="vc_observaciones" name="vc_observaciones" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="d_fecha_observaciones">Fecha Observación</label>
                                    <input id="d_fecha_observaciones" name="d_fecha_observaciones" type="date" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <button id="Btnactividad" type="submit" class="btn mt-3">Registrar Observación</button>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
    <div class="panel mt-2">
        <div class="table-responsive">
            <table class="table tabla-inventario">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ID_Equipo</th>
                        <th>ID_Empleado</th>
                        <th>ID_Ubicación</th>
                        <th>Observaciones</th>
                        <th>Fecha</th>
                        <th colspan="2" style="text-align: center;">Opciones Disponibles</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($historiales as $historial)
                        <tr>
                            <td>{{ $historial->i_pk_id }}</td>
                            <td>{{ $historial->equipo->vc_nombre_equipo ?? 'N/A' }}</td>
                            <td>{{ $historial->empleado->vc_nombre ?? 'N/A' }}</td>
                            <td>{{ $historial->ubicaciones->vc_nombre ?? 'N/A' }}</td>
                            <td>{{ $historial->vc_observaciones }}</td>
                            <td>{{ $historial->d_fecha_observaciones }}</td>
                            <td><a href="{{ route('historial.edit', ['id' => $historial->i_pk_id]) }}" class="btn btn-edit">Editar</a></td>    
                            <form action="{{ route('historial.destroy', $historial->i_pk_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-delete">Eliminar</button> 
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Manejo del formulario de usuario
        $('#btnVerForm').on('click', function() { 
            $('#verHisto').toggle(); 
            if ($('#verHisto').is(':visible')) { 
                $('#btnVerForm').text('Ocultar Formulario'); 
            } else { 
                $('#btnVerForm').text('Abrir Formulario'); 
            } 
        });
    });
</script>