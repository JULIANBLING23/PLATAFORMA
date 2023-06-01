@extends('layouts.panel')

@section('content')

<div class="card shadow">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">Certificado de Examen</h3>
                        <img src="{{ asset('img/logoC.png') }}" class="mx-auto d-block" width="200px" height="200px" alt="Card image cap">
                        <hr>
                        <p>Estimado(a) {{auth()->user()->name}},</p>
                        <p>Has completado con éxito el examen de {{$nombreExamen}}.</p>
                        <p>Tu nota obtenida es: {{$nota}}</p>
                        <p>Felicitaciones por tu desempeño y esfuerzo. ¡Sigue así!</p>
                        <hr>
                        <p class="text-center">Fecha: <?php echo date('Y-m-d'); ?></p>
                        <form action="{{ url('/estudiantes/generarCertificado') }}" method="POST" target="_blank">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="nombreExamen" value="{{ $nombreExamen }}">
                            <input type="hidden" name="nota" value="{{ $nota }}">
                            <button type="submit" class="btn btn-primary d-flex justify-content-center"">Descargar PDF</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection