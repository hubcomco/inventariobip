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

    <!-- Gestión de Usuarios -->
    <div class="row1">
        <div class="col-md-8">
            <h1 class="bold">Gestión de Usuarios</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <button id="btnVerUsuario" class="btn mb-4">Abrir Formulario</button>
        </div>
    </div>

    <div class="row" id="verUsuario" style="display:none;">
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <!-- Card Header -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-around">
                    <h6 class="m-0 font-weight-bold text-dark">Formulario de Creación</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{ route('Usuario.usuarios.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input id="name" name="name" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Correo Electrónico</label>
                            <input id="email" name="email" type="email" class="form-control" required>
                            <small id="emailError" class="text-danger" style="display:none;"></small>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input id="password" name="password" type="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirmar Contraseña</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="rol_id">Rol</label>
                            <select id="rol_id" name="rol_id" class="form-control" required>
                                <option value="">Seleccione un Rol</option>
                                @foreach ($roles as $rol)
                                    <option value="{{ $rol->i_pk_id }}">{{ $rol->vc_rol }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button id="Btnactividad" type="submit" class="btn mt-3">Crear Usuario</button>
                    </form>                    
                </div>
            </div>
        </div>
    </div>

    <div class="panel mt-5">
        <h3>Lista de Usuarios</h3>
        <div class="table-responsive">
            <table id="usuariosTabla" class="table tabla-inventario">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Correo Electrónico</th>
                        <th>Rol Asignado</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->role->vc_rol ?? 'Sin Rol' }}</td>
                            <td><a href="{{ route('Usuario.usuarios.edit', ['id' => $usuario->id]) }}" class="btn btn-edit">Editar</a></td>
                            <td>
                                <form action="{{ route('Usuario.usuarios.destroy', $usuario->id) }}" method="POST" style="display:inline;">
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

    <!-- Gestión de Roles -->
    <div class="row1">
        <div class="col-md-8">
            <h1 class="bold mt-5">Gestión de Roles</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <button id="btnVerRol" class="btn mb-4">Abrir Formulario de Rol</button>
        </div>
    </div>

    <div class="row" id="verRol" style="display:none;">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <!-- Card Header -->
                <div class="card-header py-3 d-flex flex-row justify-content-around">
                    <h6 class="m-0 font-weight-bold text-dark">Formulario de Creación</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="vc_rol">Ingresa el Rol</label>
                            <input id="vc_rol" name="vc_rol" type="text" class="form-control" required>
                        </div>
                        <button type="submit" class="btn mt-3">Crear Rol</button>
                    </form>                    
                </div>
            </div>
        </div>
    </div>

    <div class="panel mt-5">
        <h3>Lista de Roles</h3>
        <div class="table-responsive">
            <table id="rolesTabla" class="table tabla-inventario">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Rol</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $rol)
                        <tr>
                            <td>{{ $rol->i_pk_id }}</td>
                            <td>{{ $rol->vc_rol }}</td>
                            <td><a href="{{ route('roles.edit', ['id' => $rol->i_pk_id]) }}" class="btn btn-edit">Editar</a></td>
                            <td>
                                <form action="{{ route('roles.destroy', $rol->i_pk_id) }}" method="POST" style="display:inline;">
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
            $('#verUsuario').toggle(); 
            if ($('#verUsuario').is(':visible')) { 
                $('#btnVerUsuario').text('Ocultar Formulario'); 
            } else { 
                $('#btnVerUsuario').text('Abrir Formulario'); 
            } 
        });

        // Manejo del formulario de rol
        $('#btnVerRol').on('click', function() { 
            $('#verRol').toggle(); 
            if ($('#verRol').is(':visible')) { 
                $('#btnVerRol').text('Ocultar Formulario'); 
            } else { 
                $('#btnVerRol').text('Abrir Formulario'); 
            } 
        });

        $('#email').on('input', function() {
            var email = $(this).val();
            var domain = email.substring(email.lastIndexOf("@") + 1);
            var validDomains = ["bienestarprimero.com", "aggroup.la"];
            
            if ($.inArray(domain, validDomains) == -1) {
                $('#emailError').text("Correo electrónico no válido. Debe ser @bienestarprimero.com o @aggroup.la").show();
                $('#Btnactividad').attr('disabled', 'disabled');
            } else {
                $('#emailError').hide();
                $('#Btnactividad').removeAttr('disabled');
            }
        });
    });

    $(document).ready(function () {
        $('#usuariosTabla').DataTable({
            responsive: true,
            paging: true,
            searching: true,
            ordering: true,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
            }
        });
    });

    $(document).ready(function () {
        $('#rolesTabla').DataTable({
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
