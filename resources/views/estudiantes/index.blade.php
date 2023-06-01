@extends('layouts.panel')

@section('content')

<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Estudiantes</h3>
            </div>
            <form action="{{ url('/estudiantes') }}" method="GET">
                @csrf
                @method('GET')
                <div class="input-group">
                    <input type="text" class="form-control" name="input" placeholder="Ingrese un nombre" aria-label="Ingrese un nombre" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-light" type="submit">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if(session('notification'))
    <div class="card-body">
        <div class="alert alert-success" role="alert">
            {{ session('notification') }}
        </div>
    </div>
    @endif
    <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Cédula</th>
                    @if(auth()->user()->role == 'admin')
                    <th scope="col">Opciones</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($estudiantes as $estudiante)
                <tr>
                    <th scope="row">
                        {{ $estudiante->name }}
                    </th>
                    <td>
                        {{ $estudiante->email }}
                    </td>
                    <td>
                        {{ $estudiante->cedula }}
                    </td>
                    @if(auth()->user()->role == 'admin')
                    <td>
                        <form action="{{ url('/estudiantes/'.$estudiante->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ url('/estudiantes/'.$estudiante->id.'/edit') }}" class="btn btn-sm btn-primary">Editar</a>
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection