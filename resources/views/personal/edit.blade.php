<head>
    <link href="{{ url('css/vistadash.css')}}" rel="stylesheet">
</head>
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

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-around">
                    <h6 class="m-0 font-weight-bold text-dark">Edición empleado</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{ route('empleados.update', $empleado->i_pk_id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('personal.form.empleados')
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

