@extends('layouts.admin')
@section('content')
    <h1>Tipos de Equipos</h1>
    <a href="{{ route('TipoEquipo.index') }}" class="btn btn-primary mb-3">Agregar</a>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tipos as $tipo)
                <tr>
                    <td>{{ $tipo->i_pk_id }}</td>
                    <td>{{ $tipo->vc_tipo }}</td>
                    <td>
                        <a href="{{ route('TipoEquipo.edit', $tipo->i_pk_id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('TipoEquipo.destroy', $tipo->i_pk_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection