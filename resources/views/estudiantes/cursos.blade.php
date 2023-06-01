@extends('layouts.panel')

@section('content')

<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Mis materias</h3>
            </div>
            <form action="{{ url('estudiantes/'.auth()->id().'/registrarMateria') }}" method="POST">
                @csrf
                @method('POST')
                <div class="input-group">
                    <select name="materias[]" id="materias" class="custom-select" id="inputGroupSelect04">
                        @foreach($materias as $materia)
                        <option value="{{ $materia->id }}">{{ $materia->name}}</option>
                        @endforeach
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-light" type="submit">Inscribir</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if(isset($notification) && !empty($notification))
    <div class="alert alert-success">
        {{ $notification }}
    </div>
    @endif
    <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $curso)
                <tr>
                    <th scope="row">
                        {{ $curso->name }}
                    </th>
                    <td>
                        {{ $curso->description }}
                    </td>
                    <td>
                        <form action="{{ url('/estudiantes/'.$curso->id.'/quitarMateria') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ url('/estudiantes/'.$curso->id.'/examen') }}" class="btn btn-sm btn-primary">Ingresar</a>
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection