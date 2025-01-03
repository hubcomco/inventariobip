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
            <h1 class="bold">Ubicaciones BIP</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <button id="btnVerUsuario" class="btn mb-4">Registrar Ubicación</button>
        </div>
    </div>

    <div class="row" id="verUbi" style="display:none;">
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <!-- Card Header -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-around">
                    <h6 class="m-0 font-weight-bold text-dark">Ingresar la Ubicación</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{ route('ubicaciones.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="vc_pais">Países</label>
                                    <select id="vc_pais" name="vc_pais" class="form-control" required>
                                        <option value="">Seleccione un País</option>
                                        @foreach(array_keys($paisesCiudades) as $pais)
                                            <option value="{{ $pais }}">{{ $pais }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="vc_ciudad">Ciudades</label>
                                    <select id="vc_ciudad" name="vc_ciudad" class="form-control" required>
                                        <option value="">Seleccione una Ciudad</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                            <div class="form-group">
                            <label for="vc_direccion">Dirección</label>
                            <input id="vc_direccion" name="vc_direccion" type="text" class="form-control" required>
                        </div>
                        <button id="Btnactividad" type="submit" class="btn mt-3">Crear Ubicación</button>
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
                        <th>País</th>
                        <th>Ciudad</th>
                        <th>Dirección</th>
                        <th colspan="2" style="text-align: center;">Opciones disponibles</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ubicaciones as $ubicacion)
                        <tr>
                            <td>{{ $ubicacion->i_pk_id }}</td>
                            <td>{{ $ubicacion->vc_pais  }}</td>
                            <td>{{ $ubicacion->vc_ciudad  }}</td>
                            <td>{{ $ubicacion->vc_direccion  }}</td>
                            <td><a href="{{ route('ubicaciones.edit', ['id' => $ubicacion->i_pk_id]) }}" class="btn btn-edit">Editar</a></td>    
                            <td>
                                <form action="{{ route('ubicaciones.destroy', $ubicacion->i_pk_id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-delete">Eliminar</button> 
                                </form> 
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
        // Manejo del formulario de usuario
        $('#btnVerUsuario').on('click', function() { 
            $('#verUbi').toggle(); 
            if ($('#verUbi').is(':visible')) { 
                $('#btnVerUsuario').text('Ocultar Formulario'); 
            } else { 
                $('#btnVerUsuario').text('Registrar Ubicación'); 
            } 
        });
    });
</script>
<script>
    $(document).ready(function () {
        var paisesCiudades = @json($paisesCiudades);

        // Manejar el cambio en el select de países
        $('#vc_pais').on('change', function () {
            var pais = $(this).val();
            var ciudades = paisesCiudades[pais] || []; // Obtener las ciudades del país seleccionado

            // Limpiar y llenar el select de ciudades
            $('#vc_ciudad').empty().append('<option value="">Seleccione una Ciudad</option>');
            ciudades.forEach(function (ciudad) {
                $('#vc_ciudad').append('<option value="' + ciudad + '">' + ciudad + '</option>');
            });
        });
    });
</script>