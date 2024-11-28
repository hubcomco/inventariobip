<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inventario BIP - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ url('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ url('css/admin.css')}}" rel="stylesheet">
    <link href="{{ url('css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
     <!-- Lista para crear los cubos animados en el fondo-->
    <ul class="background">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="container vh-100 d-flex align-items-center justify-content-center color-fondo1">
        <!-- Outer Row -->
        <div class="row form-login justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4 bold">Recursos Humanos e Inventarios</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                name="email" id="Email" aria-describedby="emailHelp" placeholder="Correo">
                                            <small 
                                                id="emailError" class="text-danger" style="display:none;">
                                            </small>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="password" id="exampleInputPassword" placeholder="Contraseña">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck" name="remember">
                                                <label class="custom-control-label" for="customCheck">Recordar Contraseña</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-user btn-block color-boton" id="Btnactividad"> Ingresar </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Olvidé mi contraseña</a>
                                    </div>
                                    <!--Se comenta la clase para evitar que los usuarios se registren sin autorizacion-->
                                    <div class="text-center">
                                       <!-- <a class="small" href="register.html">Create an Account!</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ url('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ url('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ url('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src=" {{ url('js/sb-admin-2.min.js')}}"></script>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        //Se activa el envento cada vez que se escribe en el campo email corporativo
        $('#Email').on('input', function() {
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
</html>