@extends('layouts.panel')

@section('content')

<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col-12">
                <h1 class="mb-0">Examenes disponibles de {{$curso->name}}:</h1>
            </div>
        </div>
        @if($curso->name == 'Matematicas')
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('img/matematicasImagen.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h3 class="card-title">SUMA</h3>
                        <p>Bienvenido al examen de sumas. En este examen, pondremos a prueba tus habilidades de suma. El objetivo es resolver una serie de problemas de suma correctamente y obtener la puntuación máxima posible</p>
                                                <form action="{{ url('/estudiantes/'.$curso->id.'/quiz') }}" method="GET">
                            @csrf
                            @method('GET')
                            <input type="hidden" name="opcion" value="1">
                            <button type="submit" class="btn btn-primary">Responder</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Agrega más tarjetas aquí si es necesario -->
        </div>
        @elseif($curso->name == 'Lengua')
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('img/lenguajeImagen.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h3 class="card-title">LAS VOCALES</h3>
                        <p class="card-text">¡Bienvenido al examen de vocales! En este examen, pondremos a prueba tus conocimientos sobre las vocales del alfabeto. El objetivo es identificar y recordar las cinco vocales principales: A, E, I, O y U.</p>
                        <form action="{{ url('/estudiantes/'.$curso->id.'/quiz') }}" method="GET">
                            @csrf
                            @method('GET')
                            <input type="hidden" name="opcion" value="1">
                            <button type="submit" class="btn btn-primary">Responder</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Agrega más tarjetas aquí si es necesario -->
        </div>
        @elseif($curso->name == 'Ciencias')
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('img/cienciaImagen.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h3 class="card-title">LAS PARTES DEL CUERPO</h3>
                        <p class="card-text">¡Bienvenido al examen de ciencias sobre el cuerpo humano! En este examen, exploraremos el fascinante mundo de nuestro propio organismo. El cuerpo humano es una máquina increíblemente compleja y en este examen pondremos a prueba tus conocimientos acerca de sus sistemas, órganos y funciones.</p>
                        <form action="{{ url('/estudiantes/'.$curso->id.'/quiz') }}" method="GET">
                            @csrf
                            @method('GET')
                            <input type="hidden" name="opcion" value="1">
                            <button type="submit" class="btn btn-primary">Responder</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Agrega más tarjetas aquí si es necesario -->
        </div>
        @endif
    </div>
</div>

@endsection