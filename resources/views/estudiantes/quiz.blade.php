@extends('layouts.panel')

@section('content')

<div class="card shadow">
    @if($curso->name == 'Matematicas')
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">EXAMEN DE </h3>
            </div>
            <div class="col text-right">
                <a href="{{url('/estudiantes')}}" class="btn btn-sm btn-succes">
                    <i class="fas fa-chevron-left"></i>
                    Regresar</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/oexd_Dfic_Q" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <div class="form-group">
            <p>Ejercicios de práctica, responda las siguientes preguntas de selección múltiple</p>
        </div>
        <form action="{{ url('/estudiantes/resultado') }}" method="POST">
            @csrf
            @method('POST')
            <input type="hidden" name="materia" value="Matematicas">
            <div>
                <div class="form-group">
                    <label for="Nombre de la materia">1. ¿Cual es el total de estrellas?</label>
                </div>
                <div class="form-group">
                    <img src="{{ asset('img/matematicas-1.png') }}" width="400px" height="200px" alt="Card image cap">
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pregunta1" id="gridRadios1" value="A" checked>
                            <label class="form-check-label" for="gridRadios1">
                                A. 3
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pregunta1" id="gridRadios2" value="B">
                            <label class="form-check-label" for="gridRadios2">
                                B. 2
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pregunta1" id="gridRadios2" value="C">
                            <label class="form-check-label" for="gridRadios3">
                                C. 1
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pregunta1" id="gridRadios2" value="D">
                            <label class="form-check-label" for="gridRadios4">
                                D. 4
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="form-group">
                    <label for="Nombre de la materia">2. ¿Cual es el total de caras?</label>
                </div>
                <div class="form-group">
                    <img src="{{ asset('img/matematicas-2.png') }}" width="400px" height="150px" alt="Card image cap">
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pregunta2" id="gridRadios1" value="A" checked>
                            <label class="form-check-label" for="gridRadios1">
                                A. 3
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pregunta2" id="gridRadios2" value="B">
                            <label class="form-check-label" for="gridRadios2">
                                B. 2
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pregunta2" id="gridRadios2" value="C">
                            <label class="form-check-label" for="gridRadios3">
                                C. 1
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pregunta2" id="gridRadios2" value="D">
                            <label class="form-check-label" for="gridRadios4">
                                D. 4
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="form-group">
                    <label for="Nombre de la materia">3. Clara tiene 7 gallinas y compra 8 más.¿Cuántas tiene ahora?</label>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pregunta3" id="gridRadios1" value="A" checked>
                            <label class="form-check-label" for="gridRadios1">
                                A. 6
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pregunta3" id="gridRadios2" value="B">
                            <label class="form-check-label" for="gridRadios2">
                                B. 9
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pregunta3" id="gridRadios2" value="C">
                            <label class="form-check-label" for="gridRadios3">
                                C. 14
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pregunta3" id="gridRadios2" value="D">
                            <label class="form-check-label" for="gridRadios4">
                                D. 15
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="form-group">
                    <label for="Nombre de la materia">4. Diego compra 14 panes y Juan 18.
                        ¿Cuántos panes compraron en total?
                    </label>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pregunta4" id="gridRadios1" value="A" checked>
                            <label class="form-check-label" for="gridRadios1">
                                A. 32
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pregunta4" id="gridRadios2" value="B">
                            <label class="form-check-label" for="gridRadios2">
                                B. 54
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pregunta4" id="gridRadios2" value="C">
                            <label class="form-check-label" for="gridRadios3">
                                C. 15
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pregunta4" id="gridRadios2" value="D">
                            <label class="form-check-label" for="gridRadios4">
                                D. 31
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="form-group">
                    <label for="Nombre de la materia">5. Laura gana 32 caramelos, si le regalan 17. ¿Cuántos tiene ahora?
                    </label>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pregunta5" id="gridRadios1" value="A" checked>
                            <label class="form-check-label" for="gridRadios1">
                                A. 31
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pregunta5" id="gridRadios2" value="B">
                            <label class="form-check-label" for="gridRadios2">
                                B. 34
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pregunta5" id="gridRadios2" value="C">
                            <label class="form-check-label" for="gridRadios3">
                                C. 49
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pregunta5" id="gridRadios2" value="D">
                            <label class="form-check-label" for="gridRadios4">
                                D. 3217
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="form-group">
                    <label for="Nombre de la materia">6. Pepe tiene 25 cuadernos y Miguel le obsequió 12 más.
                        ¿Cuántos cuadernos tiene ahora Miguel?

                    </label>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pregunta6" id="gridRadios1" value="A" checked>
                            <label class="form-check-label" for="gridRadios1">
                                A. 15
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pregunta6" id="gridRadios2" value="B">
                            <label class="form-check-label" for="gridRadios2">
                                B. 43
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pregunta6" id="gridRadios2" value="C">
                            <label class="form-check-label" for="gridRadios3">
                                C. 37
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pregunta6" id="gridRadios2" value="D">
                            <label class="form-check-label" for="gridRadios4">
                                D. 21
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Enviar respuestas</button>
        </form>
    </div>

    @elseif($curso->name == 'Lengua')
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">EXAMEN DE LENGUA</h3>
            </div>
            <div class="col text-right">
                <a href="{{url('/estudiantes')}}" class="btn btn-sm btn-succes">
                    <i class="fas fa-chevron-left"></i>
                    Regresar</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group">
            <p>Video de leccion.</p>
        </div>
        <div class="form-group">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/sDBGBXyJaJg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <div class="form-group">
            <p>Estas 5 vocales se usan para darle sonido a las palabras y así poder dar a entender la palabra de manera correcta combinando estas vocales con consonantes.</p>
        </div>
        <form action="" method="POST">
            @csrf
            @method('PUT')
            <div>
                <div class="form-group">
                    <label for="Nombre de la materia">1. ¿Cual es el total de estrellas?</label>
                </div>
                <div class="form-group">
                    <img src="{{ asset('img/matematicas-1.png') }}" width="400px" height="200px" alt="Card image cap">
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pregunta1" id="gridRadios1" value="A" checked>
                            <label class="form-check-label" for="gridRadios1">
                                A. 3
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pregunta1" id="gridRadios2" value="B">
                            <label class="form-check-label" for="gridRadios2">
                                B. 2
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pregunta1" id="gridRadios2" value="C">
                            <label class="form-check-label" for="gridRadios3">
                                C. 1
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pregunta1" id="gridRadios2" value="D">
                            <label class="form-check-label" for="gridRadios4">
                                D. 4
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Enviar respuestas</button>
        </form>
    </div>

    @elseif($curso->name == 'Ciencia')


    @endif

</div>

@endsection