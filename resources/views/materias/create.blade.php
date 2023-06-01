@extends('layouts.panel')

@section('content')

<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Nueva Materia</h3>
            </div>
            <div class="col text-right">
                <a href="{{url('/materias')}}" class="btn btn-sm btn-succes">
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

        <form action="{{ url('/materias') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="Nombre de la materia">Nombre de la materia</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="Nombre de la materia">Descripción</label>
                <input type="text" name="description" class="form-control" value="{{ old('description') }}">
            </div>

            <div class="form-group">
                <label for="Nombre de la materia">Temarios de la materia</label>
                <button type="button" onclick="addFields()" class="btn btn-info">Agregar campo</button>
            </div class="form-group">

            <div>
                <label for="title1">Tema 1</label>
                <input type="text" name="title[0][titulo]" id="title1" class="form-control" required>
            </div>

            <div id="dynamic-fields">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-info">Agregar materia</button>
            </div>
        </form>
    </div>
</div>

@endsection