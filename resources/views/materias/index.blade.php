@extends('layouts.panel')

@section('content')

<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Materias</h3>
            </div>
            <div class="col text-right">
                <a href="{{url('/materias/create')}}" class="btn btn-sm btn-primary">Nueva materia</a>
            </div>
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
                    <th scope="col">Descripción</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($materias as $_materias)
                <tr>
                    <th scope="row">
                        {{ $_materias->name }}
                    </th>
                    <td>
                        {{ $_materias->description }}
                    </td>
                    <td>
                        <form action="{{ url('/materias/'.$_materias->id) }}" method="POST">
                            @csrf 
                            @method('DELETE')
                            <a href="{{ url('/materias/'.$_materias->id.'/inscritos') }}" class="btn btn-sm btn-primary">Ingresar</a>
                            <a href="{{ url('/materias/'.$_materias->id.'/edit') }}" class="btn btn-sm btn-primary">Editar</a>
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