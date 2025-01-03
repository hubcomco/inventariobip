@extends('layouts.admin')
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
</head>

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="bold">Empleados BIP</h1>
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

    <!-- Botón para desplegar el formulario --> 
    <div class="row"> 
        <div class="col-md-12"> 
            <button id="btnVerContenido" class="btn mb-4">Abrir Formulario de Registro</button>
        </div> 
    </div>
    
    <!--Se crea un id para el contenedor y un display para que desaparezca-->
    <div class="row" id="verContenedor" style="display:none;">
        <div class="col-md-11">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-around">
                    <h6 class="m-0 font-weight-bold text-dark">Creación empleado</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{ route('empleados.store')}}" method="POST" enctype="multipart/form-data">
                        @include('Empleado.empleados')
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="panel mt-5"> 
        <h3>Lista de Empleados</h3>
        <div class="table-responsive">
            <table id="empleadosTabla" class="table tabla-inventario">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Cargo</th>
                        <th>Usuario DA</th>
                        <th>Correo</th>
                        <th>Correo Personal</th>
                        <th>Teléfono</th>
                        <th>Teléfono Corporativo</th>
                        <th>Archivo Contrato</th>
                        <th>Archivo Exámenes</th>
                        <th>Archivo Cédula</th>
                        <th colspan="2" style="text-align: center;">Opciones Disponibles</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->i_pk_id }}</td>
                        <td>{{ $empleado->vc_nombre }}</td>
                        <td>{{ $empleado->vc_apellido }}</td>
                        <td>{{ $empleado->vc_cargo }}</td>
                        <td>{{ $empleado->vc_usuario_DA }}</td>
                        <td>{{ $empleado->vc_email }}</td>
                        <td>{{ $empleado->vc_email_personal }}</td>
                        <td>{{ $empleado->vc_telefono }}</td>
                        <td>{{ $empleado->vc_telefono_corporativo }}</td>
                        <td><a href="{{ Storage::url($empleado->vc_url_contrato) }}">Ver Contrato</a></td>
                        <td><a href="{{ Storage::url($empleado->vc_url_examenes) }}">Ver Exámenes</a></td>
                        <td><a href="{{ Storage::url($empleado->vc_url_cedula) }}">Ver Cédula</a></td>
                        <td><a href="{{ route('empleados.edit', ['id' => $empleado->i_pk_id]) }}" class="btn mt-1">Editar</a></td>
                        <td>
                            <form action="{{ route('empleados.destroy', $empleado->i_pk_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>            
        </div>   
    </div>
@endsection
  
<!--Enlace a la biblioteca de jQuery-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#empleadosTabla').DataTable({
            responsive: true, // Hacer que la tabla sea adaptable
            paging: true,    // Habilitar paginación
            searching: true, // Habilitar búsqueda
            ordering: true   // Habilitar ordenamiento
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Se activa el evento al hacer clic en el boton para mostrar el formulario u ocultarlo
        $('#btnVerContenido').on('click', function() { 
            $('#verContenedor').toggle(); 
            if ($('#verContenedor').is(':visible')) { 
                $('#btnVerContenido').text('Ocultar Formulario'); 
            } else { 
                $('#btnVerContenido').text('Abrir Formulario de Registro'); 
            } 
        });
        //Se activa el envento cada vez que se escribe en el campo email corporativo
        $('#vc_email').on('input', function() {
            var email = $(this).val(); //La variable obtiene el valor del campo email
            var domain = email.substring(email.lastIndexOf("@") + 1); //Extrae la parte del dominio del correo para la validacion
            var validDomains = ["bienestarprimero.com", "aggroup.la"]; //Dominios validos para el campo email
            
            if ($.inArray(domain, validDomains) == -1) {//Define un array con los dominios validos
                $('#emailError').text("Correo electrónico no válido. Debe ser @bienestarprimero.com o @aggroup.la").show();
                $('#Btnactividad').attr('disabled', 'disabled');//Desactiva el boton de envio
            } else { 
                //Si el dominio es valido esconde el mensaje de error y habilita el boton 
                $('#emailError').hide();  
                $('#Btnactividad').removeAttr('disabled');  
            }
        });
    });
</script>

