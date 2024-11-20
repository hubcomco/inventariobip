@extends('layouts.admin')

@section('content')
    <div class="row1">
        <div class="col-md-8">
            <h1 class="bold">Gestión de Equipos BIP</h1>
        </div>
    </div>

    <div class="row"> 
        <div class="col-md-12"> 
            <button id="btnVerContenido" class="btn mb-4">Añadir Empleado</button>
        </div> 
    </div>

    <div class="row" id="verContenedor" style="display:none;">
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <!-- Card Header -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-dark">Creación de Equipo</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{ route('equipos.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="vc_nombre_equipo">Nombre del Equipo</label>
                            <input id="vc_nombre_equipo" value="{{ $equipo->vc_nombre_equipo ?? '' }}" name="vc_nombre_equipo" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="t_componentes_generales">Componentes Generales</label>
                            <input id="t_componentes_generales" value="{{ $equipo->t_componentes_generales ?? '' }}" name="t_componentes_generales" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="vc_serial_equipo">Serial del Equipo</label>
                            <input id="vc_serial_equipo" value="{{ $equipo->vc_serial_equipo ?? '' }}" name="vc_serial_equipo" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="vc_marca">Marca</label>
                            <input id="vc_marca" value="{{ $equipo->vc_marca ?? '' }}" name="vc_marca" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="vc_modelo">Modelo</label>
                            <input id="vc_modelo" value="{{ $equipo->vc_modelo ?? '' }}" name="vc_modelo" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="d_fecha_compra">Fecha de Compra</label>
                            <input id="d_fecha_compra" value="{{ $equipo->d_fecha_compra ?? '' }}" name="d_fecha_compra" type="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="dec_costo_equipo">Costo</label>
                            <input id="dec_costo_equipo" value="{{ $equipo->dec_costo_equipo ?? '' }}" name="dec_costo_equipo" type="number" class="form-control" step="0.01">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Guardar Equipo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="panel mt-5">
        <h3>Lista de Equipos</h3>
        <div class="table-responsive">
            <table class="table tabla-inventario">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Componentes Generales</th>
                        <th>Serial</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Fecha de Compra</th>
                        <th>Costo</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($equipos as $equipo)
                        <tr>
                            <td>{{ $equipo->vc_nombre_equipo }}</td>
                            <td>{{ $equipo->t_componentes_generales }}</td>
                            <td>{{ $equipo->vc_serial_equipo }}</td>
                            <td>{{ $equipo->vc_marca }}</td>
                            <td>{{ $equipo->vc_modelo }}</td>
                            <td>{{ $equipo->d_fecha_compra }}</td>
                            <td>{{ $equipo->dec_costo_equipo }}</td>
                            <td><a href="{{ route('equipos.edit', ['id' => $equipo->id]) }}" class="btn btn-primary">Editar</a></td>
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
        // Se activa el evento al hacer clic en el boton para mostrar el formulario
        $('#btnVerContenido').on('click', function() {
            $('#verContenedor').toggle();
         });
    });    
</script>
