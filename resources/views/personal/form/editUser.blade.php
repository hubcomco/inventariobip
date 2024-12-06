<head>
    <link href="{{ url('css/vistadash.css')}}" rel="stylesheet">
</head>
@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="bold">Edición Usuarios BIP</h1>
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
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-around">
                    <h6 class="m-0 font-weight-bold text-dark">Editar Usuario</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{ route('personal.usuarios.update', $usuario->id) }}" method="POST" class="button-group">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nombre del Usuario</label>
                            <input type="text" id="name" name="name" value="{{ $usuario->name }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Correo del Usuario</label>
                            <input type="text" id="email" name="email" value="{{ $usuario->email }}" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="rol_id">Rol del Usuario</label>
                            <select id="rol_id" name="rol_id" class="form-control" required>
                                <option value="" disabled>Seleccionar un rol</option>
                                @foreach($roles as $rol)
                                    <option value="{{ $rol->i_pk_id }}" {{ $usuario->rol_id == $rol->i_pk_id ? 'selected' : '' }}>
                                        {{ $rol->vc_rol }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn">Actualizar Usuario</button>
                        <a href="{{ route('personal.usuarios') }}" class="btn">Regresar a Usuarios</a>
                    </form>
                </div>                
            </div>
        </div>
    </div>
@endsection

<!--Enlace a la biblioteca de jQuery-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    //Asegura que el cdigo se ejecute dentro del formulario
    $(document).ready(function() {
        //Se activa el envento cada vez que se escribe en el campo email corporativo
        $('#vc_email').on('input', function() {
            var email = $(this).val(); //La variable obtiene el valor del campo email
            var domain = email.substring(email.lastIndexOf("@") + 1); //Extrae la parte del dominio del correo para la validacion
            var validDomains = ["bienestarprimero.com", "aggroup.la"]; //Dominios validos para el campo email
            
            if ($.inArray(domain, validDomains) == -1) {//Define un array con los dominios validos
                $('#emailError').text("Correo electrónico no válido. Debe ser @bienestarprimero.com o @aggroup.la").show();
                $('#Btnactividad').attr('disabled', 'disabled');//Desactiva el boton de envio
            } else { //Si el dominio es valido esconde el mensaje de error y habilita el boton 
                $('#emailError').hide();  
                $('#Btnactividad').removeAttr('disabled');  
            }
        });
    });
</script>

