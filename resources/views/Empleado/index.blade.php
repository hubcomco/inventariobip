@extends('layouts.admin')

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
            <button id="btnVerContenido" class="btn mb-4">Abrir Formulario</button>
        </div> 
    </div>
    
    <!--Se crea un id para el contenedor y un display para que desaparezca-->
    <div class="row" id="verContenedor" style="display:none;">
        <div class="col-md-11">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-around">
                    <h6 class="m-0 font-weight-bold text-dark">Formulario de Creación</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{ route('empleados.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                         <!-- Nombres y Apellidos en una misma fila -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="vc_nombre">Nombres</label>
                                    <input value="{{ $empleado->vc_nombre ?? '' }}" id="vc_nombre" name="vc_nombre" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="vc_apellido">Apellidos</label>
                                    <input id="vc_apellido" value="{{ $empleado->vc_apellido ?? '' }}"  name="vc_apellido" type="text" class="form-control" required>
                                </div>
                            </div>
                        </div>
                         <!-- Emails en una sola fila -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="vc_email">Email Corporativo</label>
                                    <input id="vc_email" value="{{ $empleado->vc_email ?? '' }}"  name="vc_email" type="email" class="form-control" required>
                                    <small id="emailError" class="text-danger" style="display:none;"></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="vc_email_personal">Email Personal</label>
                                    <input id="vc_email_personal" value="{{ $empleado->vc_email_personal ?? '' }}"  name="vc_email_personal" type="email" class="form-control" >
                                </div>
                            </div>
                        </div>
                        <!-- Telefonos en la misma fila -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="vc_telefono">Teléfono</label>
                                    <input id="vc_telefono" value="{{ $empleado->vc_telefono ?? '' }}"  name="vc_telefono" type="number" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="vc_telefono_corporativo">Teléfono Corporativo</label>
                                    <input id="vc_telefono_corporativo" value="{{ $empleado->vc_telefono_corporativo ?? '' }}"  name="vc_telefono_corporativo" type="number" class="form-control" >
                                </div>
                            </div>
                        </div>
                         <!-- Usuario Directorio Activo en una fila -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="vc_cargo">Cargo</label>
                                    <input id="vc_cargo" value="{{ $empleado->vc_cargo ?? '' }}"  name="vc_cargo" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="vc_usuario_DA">Usuario Directorio Activo</label>
                                    <input id="vc_usuario_DA" value="{{ $empleado->vc_usuario_DA ?? '' }}"  name="vc_usuario_DA" type="text" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <!-- Contrato, Exámenes y Cédula en una fila de tres columnas -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="formFile">Contrato</label>
                                    <input id="vc_url_contrato" name="vc_url_contrato" type="file" class="formFile">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="formFile">Exámenes</label>
                                    <input id="vc_url_examenes" name="vc_url_examenes" type="file" class="formFile">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="formFile">Cédula</label>
                                    <input id="vc_url_cedula" name="vc_url_cedula" type="file" class="formFile">
                                </div>
                            </div>
                        </div>
                        <!-- Botón de envío -->
                        <button type="submit" class="btn mt-3" id="Btnactividad">Registrar Empleado</button>
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
                        <th>Editar</th>
                        <th>Eliminar</th>
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
    $(document).ready(function() {
        // Se activa el evento al hacer clic en el boton para mostrar el formulario u ocultarlo
        $('#btnVerContenido').on('click', function() { 
            $('#verContenedor').toggle(); 
            if ($('#verContenedor').is(':visible')) { 
                $('#btnVerContenido').text('Ocultar Formulario'); 
            } else { 
                $('#btnVerContenido').text('Abrir Formulario'); 
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
    $(document).ready(function () {
        $('#empleadosTabla').DataTable({
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


