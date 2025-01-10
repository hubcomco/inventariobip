@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Asignar Equipo: {{ $equipo->vc_tipo }}</h1>
        <form action="{{ route('asignaciones.store', $equipo->i_pk_id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="empleado_id">Empleado</label>
                <select name="empleado_id" id="empleado_id" class="form-control" required>
                    <option value="">Seleccione un empleado</option>
                    @foreach($empleados as $empleado)
                        <option value="{{ $empleado->i_pk_id }}">{{ $empleado->vc_nombre }} {{ $empleado->vc_apellido }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Asignar</button>
        </form>
    </div>
@endsection