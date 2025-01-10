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
            <h1 class="bold">Equipos BIP</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <button id="btnVerTipo" class="btn mb-4">Abrir Formulario</button>
        </div>
    </div>

    <div class="row" id="verTipo" style="display:none;">
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <!-- Card Header -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-around">
                    <h6 class="m-0 font-weight-bold text-dark">Formulario de Creación</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{ route('TipoEquipo.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="vc_tipo">Tipo de equipo a registrar</label>
                            <input id="vc_tipo" name="vc_tipo" type="text" class="form-control" required>
                        </div>
                        <button id="Btnactividad" type="submit" class="btn mt-3">Crear Tipo</button>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
    <div class="panel mt-3">
        <h3>Lista de Tipos</h3>
        <div class="table-responsive">
            <table id="tiposTabla" class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tipo</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tipos as $tipo)
                        <tr>
                            <td>{{ $tipo->i_pk_id }}</td>
                            <td>{{ $tipo->vc_tipo }}</td>
                            <td><a href="{{ route('TipoEquipo.edit', $tipo->i_pk_id) }}" class="btn">Editar</a></td>
                            <td>
                                <form action="{{ route('TipoEquipo.destroy', $tipo->i_pk_id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
<!--Enlace a biblioteca jQuery-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function() {
        // Manejo del formulario de usuario
        $('#btnVerTipo').on('click', function() { 
            $('#verTipo').toggle(); 
            if ($('#verTipo').is(':visible')) { 
                $('#btnVerTipo').text('Ocultar Formulario'); 
            } else { 
                $('#btnVerTipo').text('Abrir Formulario'); 
            } 
        });
    });

    $(document).ready(function () {
        $('#tiposTabla').DataTable({
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