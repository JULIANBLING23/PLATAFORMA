<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        {{config('app.name')}}
    </title>
</head>
<body>
    <div>
        <h1>Certificado de Examen</h1>
        <hr>
        <p>Estimado(a) {{auth()->user()->name}},</p>
        <p>Has completado con éxito el examen de {{$nombreExamen}}.</p>
        <p>Tu nota obtenida es: {{$nota}}</p>
        <p>Felicitaciones por tu desempeño y esfuerzo. ¡Sigue así!</p>
        <hr>
        <p class="text-center">Fecha: <?php echo date('Y-m-d'); ?></p>
    </div>
</body>
