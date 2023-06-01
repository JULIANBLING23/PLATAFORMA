@extends('layouts.panel')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <h3>Bienvenido(a) a la plataforma Santo Domingo Savio</h3>
                    <p>Esta plataforma te brinda acceso a una variedad de exámenes en diferentes materias. Aquí podrás poner a prueba tus conocimientos y evaluar tu rendimiento.</p>
                    <p>Para realizar los exámenes, sigue estos pasos:</p>
                    <ol>
                        <li>Selecciona la materia en la que deseas hacer el examen.</li>
                        <li>Responde las preguntas que se te presenten.</li>
                        <li>Al finalizar, recibirás una nota que reflejará tu desempeño en el examen.</li>
                    </ol>
                    <p>¡Disfruta de la experiencia de aprendizaje y mejora tus habilidades!</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection