<head>
    <link href="{{ url('css/vistadash.css')}}" rel="stylesheet">
</head>
@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="bold">Historial BIP</h1>
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
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-dark">Edición del Historial</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('historial.update' , $historiales->i_pk_id)}}" method="POST"  class="button-group">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn">Actualizar</button>
                        <a href="{{ route('personal.historial') }}" class="btn">Regresar a Historiales</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
