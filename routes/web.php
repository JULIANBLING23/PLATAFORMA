<?php

use Illuminate\Support\Facades\Route;
use Dompdf\Dompdf;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function () {

    //Rutas materias
    Route::get('/materias', [App\Http\Controllers\Admin\MateriasController::class, 'index']);
    Route::get('/materias/create', [App\Http\Controllers\Admin\MateriasController::class, 'create']);
    Route::get('/materias/{materias}/edit', [App\Http\Controllers\Admin\MateriasController::class, 'edit']);
    Route::post('/materias', [App\Http\Controllers\Admin\MateriasController::class, 'sendData']);
    Route::put('/materias/{materias}', [App\Http\Controllers\Admin\MateriasController::class, 'update']);
    Route::delete('/materias/{materias}', [App\Http\Controllers\Admin\MateriasController::class, 'destroy']);
    Route::get('/materias/{materias}/inscritos', [App\Http\Controllers\Admin\MateriasController::class, 'inscritos']);
});

//Ruta estudiantes
Route::resource('/estudiantes', 'App\Http\Controllers\EstudianteController');
//Route::resource('/estudiantes/{studentId}/cursos', 'App\Http\Controllers\EstudianteController');
Route::get('/estudiantes/{studentId}/cursos', [App\Http\Controllers\EstudianteController::class, 'cursos']);
//Route::put('/estudiantes/{studentId}', [App\Http\Controllers\EstudianteController::class, 'registrarMateria']);
Route::post('/estudiantes/{studentId}/registrarMateria', [App\Http\Controllers\EstudianteController::class, 'registrarMateria']);
Route::get('/estudiantes', [App\Http\Controllers\EstudianteController::class, 'buscarUsuario']);
Route::delete('/estudiantes/{materia_id}/quitarMateria', [App\Http\Controllers\EstudianteController::class, 'quitarMateria']);
Route::get('/estudiantes/{materia}/examen', [App\Http\Controllers\EstudianteController::class, 'examen']);
Route::get('/estudiantes/{materia}/quiz', [App\Http\Controllers\EstudianteController::class, 'quiz']);
Route::post('/estudiantes/resultado', [App\Http\Controllers\EstudianteController::class, 'resultado']);
Route::post('/estudiantes/generarCertificado', [App\Http\Controllers\EstudianteController::class, 'generarCertificado']);




