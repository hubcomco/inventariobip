<head>
    <link href="{{ url('css/vistadash.css') }}" rel="stylesheet">
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

    <div class="row1">
        <div class="col-md-8">
            <h1 class="bold">Gestión de Equipos BIP</h1>
        </div>
    </div>

    <div class="row"> 
        <div class="col-md-12"> 
            <button id="btnVerContenido" class="btn mb-4">Abrir Formulario</button>
        </div> 
    </div>

    <div class="row" id="verContenedor" style="display: none;">
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <!-- Card Header -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-around">
                    <h6 class="m-0 font-weight-bold text-dark">Formulario de Creación</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{ route('equipos.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="vc_nombre_equipo">Nombre del Equipo</label>
                            <input id="vc_nombre_equipo" 
                                   value="{{ $equipo->vc_nombre_equipo ?? '' }}" 
                                   name="vc_nombre_equipo" 
                                   type="text" 
                                   class="form-control" 
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="i_fk_id_tipo">Tipo de Equipo</label>
                            <select id="i_fk_id_tipo" name="i_fk_id_tipo" class="form-control" required>
                                <option value="">Seleccione un tipo</option>
                                @foreach ($tipos as $tipo)
                                    <option value="{{ $tipo->i_pk_id }}">{{ $tipo->vc_tipo }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="t_componentes_generales">Componentes Generales</label>
                            <input id="t_componentes_generales" 
                                   value="{{ $equipo->t_componentes_generales ?? '' }}" 
                                   name="t_componentes_generales" 
                                   type="text" 
                                   class="form-control" 
                                   required>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="vc_serial_equipo">Serial del Equipo</label>
                                    <input id="vc_serial_equipo" 
                                           value="{{ $equipo->vc_serial_equipo ?? '' }}" 
                                           name="vc_serial_equipo" 
                                           type="text" 
                                           class="form-control" 
                                           required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="vc_marca">Marca</label>
                                    <input id="vc_marca" 
                                           value="{{ $equipo->vc_marca ?? '' }}" 
                                           name="vc_marca" 
                                           type="text" 
                                           class="form-control" 
                                           required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="vc_modelo">Modelo</label>
                                    <input id="vc_modelo" 
                                           value="{{ $equipo->vc_modelo ?? '' }}" 
                                           name="vc_modelo" 
                                           type="text" 
                                           class="form-control" 
                                           required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="d_fecha_compra">Fecha de Compra</label>
                                    <input id="d_fecha_compra" 
                                           value="{{ $equipo->d_fecha_compra ?? '' }}" 
                                           name="d_fecha_compra" 
                                           type="date" 
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dec_costo_equipo">Costo</label>
                                    <input id="dec_costo_equipo" 
                                           value="{{ $equipo->dec_costo_equipo ?? '' }}" 
                                           name="dec_costo_equipo" 
                                           type="number" 
                                           class="form-control" 
                                           step="0.01">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="vc_estado_equipo">Estado del Equipo</label>
                                    <input id="vc_estado_equipo" 
                                           value="{{ $equipo->vc_estado_equipo ?? '' }}" 
                                           name="vc_estado_equipo" 
                                           type="text" 
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dec_costo_equipo">Garantia</label>
                                    <input id="dec_costo_equipo" 
                                           value="{{ $equipo->vc_garantia_equipo ?? '' }}" 
                                           name="vc_garantia_equipo" 
                                           type="text" 
                                           class="form-control" >
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn mt-3">Registrar Equipo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="panel mt-5">
        <h3 class="mt-5">Lista de Equipos</h3>
        <div class="table-responsive">
            <table id="equiposTabla" class="table tabla-inventario">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Serial</th>
                        <th>Modelo</th>
                        <th>Tipo de Equipo</th>
                        <th>Marca</th>
                        <th>Componentes Generales</th>
                        <th>Fecha Compra</th>
                        <th>Costo</th>
                        <th>Estado</th>
                        <th>Garantia</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                        <th>Asignar Equipo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($equipos as $equipo)
                        <tr>
                            <td>{{ $equipo->i_pk_id }}</td>
                            <td>{{ $equipo->vc_nombre_equipo }}</td>
                            <td>{{ $equipo->vc_serial_equipo }}</td>
                            <td>{{ $equipo->vc_modelo }}</td>
                            <td>{{ $equipo->tipoEquipo->vc_tipo ?? 'Sin asignar' }}</td>
                            <td>{{ $equipo->vc_marca }}</td>
                            <td>{{ $equipo->t_componentes_generales }}</td>
                            <td>{{ $equipo->d_fecha_compra }}</td>
                            <td>{{ $equipo->dec_costo_equipo }}</td>
                            <td>{{ $equipo->vc_estado_equipo }}</td>
                            <td>{{ $equipo->vc_garantia_equipo }}</td>
                            <td>
                                <a href="{{ route('equipos.edit', ['id' => $equipo->i_pk_id]) }}" class="btn">Editar</a>
                            </td>
                            <td>
                                <form action="{{ route('equipos.destroy', $equipo->i_pk_id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn">Eliminar</button> 
                                </form> 
                            </td>
                            <td>
                                <a href="{{ route('asignaciones.create', $equipo->i_pk_id) }}" class="btn">Asignar Equipo</a>
                            </td>                           
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
        // Mostrar u ocultar el formulario al hacer clic en el botón
        $('#btnVerContenido').on('click', function() { 
            $('#verContenedor').toggle(); 
            if ($('#verContenedor').is(':visible')) { 
                $('#btnVerContenido').text('Ocultar Formulario'); 
            } else { 
                $('#btnVerContenido').text('Abrir Formulario'); 
            } 
        });
    });
    
    $(document).ready(function () {
        $('#equiposTabla').DataTable({
            responsive: true,
            paging: true,
            searching: true,
            ordering: true,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
            }
        });
    });
</script>
