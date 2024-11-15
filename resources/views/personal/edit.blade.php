@extends('layouts.admin');

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
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-dark">Edición empleado</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{ route('empleados.update')}}" method="PUT" enctype="multipart/form-data">
                        @include('personal.form.form')
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

