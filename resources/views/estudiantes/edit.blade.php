@extends('layouts.panel')

@section('content')

<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Editar información</h3>
            </div>
            <div class="col text-right">
                <a href="{{url('/estudiantes')}}" class="btn btn-sm btn-succes">
                    <i class="fas fa-chevron-left"></i>
                    Regresar</a>
            </div>
        </div>
    </div>
    <div class="card-body">

        @if($errors->any)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    <i class="fas fa-exclamation-triangle"></i>
                    <strong>Por favor!</strong> {{$error}}
                </div>
            @endforeach
        @endif

        <form action="{{ url('/estudiantes/'.$estudiante->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="Nombre de la materia">Nombre de usuario</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $estudiante->name) }}">
            </div>
            <div class="form-group">
                <label for="Nombre de la materia">Dirección</label>
                <input type="text" name="address" class="form-control" value="{{ old('address', $estudiante->address) }}">
            </div>
            <div class="form-group">
                <label for="Nombre de la materia">Cédula</label>
                <input type="text" name="cedula" class="form-control" value="{{ old('cedula', $estudiante->cedula) }}">
            </div>
            <div class="form-group">
                <label for="Nombre de la materia">Modalidad</label>
                <input type="text" name="modality" class="form-control" value="{{ old('modality', $estudiante->modality) }}">
            </div>
            <div class="form-group">
                <label for="Nombre de la materia">Teléfono</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $estudiante->phone) }}">
            </div>
            <div class="form-group">
                <label for="Nombre de la materia">Contraseña</label>
                <input type="text" name="password" class="form-control">
                <small class="text-warning">Solo llene el campo si desea cambiar la contraseña</small>
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Guardar cambios</button>
        </form>
    </div>
</div>

@endsection