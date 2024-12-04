<head>
    <link href="{{ url('css/vistadash.css')}}" rel="stylesheet">
</head>
@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="bold">Editar Equipos BIP</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-dark">Edición equipos</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{ route('equipos.update', $equipo->i_pk_id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('personal.equipos')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection