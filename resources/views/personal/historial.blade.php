<head>
    <link href="{{ url('css/vistadash.css')}}" rel="stylesheet">
</head>
@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="bold">Historial Equipos BIP</h1>
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
                        <th colspan="2" style="text-align: center;">Opciones disponibles</th>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection