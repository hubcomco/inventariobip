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
        <div class="col-md-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-dark">Creación empleado</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{ route('empleados.store')}}" method="POST" enctype="multipart/form-data">
                        @include('personal.form.form')
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="panel mt-5"> 
        <h3>Lista de Empleados</h3>
        <div class="table-responsive">
            <table class="table tabla-inventario">
                <thead> 
                    <tr> 
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
                        <th></th>    
                    </tr> 
                </thead> 
                <tbody> 
                    <!--Crea una tabla HTML donde cada fila representa un empleado, mostrando todas sus propiedades-->
                    @foreach ($empleados as $empleado) 
                    <tr> <!--Cada tr representa una fila en la tabla, dentro de cada fila td representa una celda-->
                        <td>{{ $empleado->vc_nombre }}</td> 
                        <td>{{ $empleado->vc_apellido }}</td> 
                        <td>{{ $empleado->vc_cargo }}</td> 
                        <td>{{ $empleado->vc_usuario_DA }}</td> 
                        <td>{{ $empleado->vc_email }}</td> 
                        <td>{{ $empleado->vc_email_personal }}</td> 
                        <td>{{ $empleado->vc_telefono }}</td> 
                        <td>{{ $empleado->vc_telefono_corporativo }}</td> 
                        <td><a href="{{ Storage::url($empleado->vc_url_contrato)}}">Ver Contrato</a></td>
                        <td><a href="{{ Storage::url($empleado->vc_url_examenes)}}">Ver Examenes</a></td>
                        <td><a href="{{ Storage::url($empleado->vc_url_cedula)}}">Ver Cedula</a></td>
                        <td> <a href="{{ route('empleados.edit',['id'=>$empleado->i_pk_id])}}" class="btn btn-primary mt-3">Editar</a></td>
                    </tr>
                    @endforeach
                </tbody> 
            </table>
        </div>   
    </div>
@endsection


