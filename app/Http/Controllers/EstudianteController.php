<?php

namespace App\Http\Controllers;

use App\Models\Materias;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Examen;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use PDF;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiantes = User::estudiantes()->where('role', 'estudiante')->get();
        return view('estudiantes.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $estudiante = User::estudiantes()->findOrFail($id);
        return view('estudiantes.edit', compact('estudiante'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => 'required|min:3',
            'cedula' => 'nullable|digits:10',
            'address' => 'nullable|min:6',
            'date' => 'nullable',
            'phone' => 'nullable|digits:10',
            'modality' => 'nullable|min:4',
        ];
        $messages = [
            'name.required' => 'El nombre de usuario es obligatorio.',
            'name.min' => 'El nombre de usuario debe tener más de 3 caracteres.',
            'cedula.required' => 'La cédula es obligatoria',
            'cedula.digits' => 'La cédula debe tener 10 dígitos',
            'address.min' => 'La dirección debe tener al menos 6 caracteres',
            'date.required' => 'La fecha es obligatoria.',
            'phone.required' => 'El número de telefono es obligatorio',
            'phone.digits' => 'Ingrese un número de telefono válido',
        ];
        $this->validate($request, $rules, $messages);

        $user = User::estudiantes()->findOrFail($id);
        $data = $request->only('name', 'email', 'date', 'address', 'cedula', 'gender', 'modality', 'phone');
        $password = $request->input('password');

        if ($password) {
            $data['password'] = bcrypt($password);
        }
        $user->fill($data);
        $user->save();

        $notification = 'Los datos se han actualizado correctamente';
        return redirect('/estudiantes')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function registrarMateria(Request $request, User $studentId, Materias $materia)
    {
        //dd($request->all());
        $studentId->courses()->syncWithoutDetaching($request->input('materias'));

        $courses = $studentId->courses()->get();
        $materias = Materias::all();
        $notification = 'Se ha inscrito correctamente';

        return view('estudiantes.cursos', compact('courses', 'materias', 'notification'));
    }

    public function cursos(string $studentId)
    {
        $student = User::find($studentId);
        $materias = Materias::all();

        if ($student && $student->courses()->count() > 0) {
            $courses = $student->courses()->get();
            return view('estudiantes.cursos', compact('courses', 'materias'));
        } else {
            return view('estudiantes.cursos', ['courses' => [], 'materias' => $materias]);
        }
    }
    public function buscarUsuario(Request $request)
    {
        $input = $request->input('input');

        $estudiantes = User::where('name', 'LIKE', "%$input%")->where('role', 'estudiante')->get();

        return view('estudiantes.index', compact('estudiantes'));
    }

    public function quitarMateria($materia_id)
    {
        // Buscar al usuario
        $usuario = User::find(auth()->user()->id);
        //dd($usuario);
        // Remover la materia del usuario
        $usuario->courses()->detach($materia_id);

        // Redireccionar a la página de materias con una notificación
        $notification = 'La materia se ha eliminado correctamente del usuario';
        return redirect('/home');
    }

    public function examen($materia)
    {
        $curso = Materias::find($materia);
        return view('estudiantes.examen', compact('curso'));
    }
    public function quiz(Request $request, $materia)
    {
        $curso = Materias::find($materia);
        $opcion = $request->input('opcion');
        //dd($curso->name);
        return view('estudiantes.quiz', compact('curso', 'opcion'));
    }
    public function resultado(Request $request)
    {
        $materia = $request->input("materia");
        $respuestasCorrectas = [];

        $usuario = Auth::user();
        $contador = 0;

        if ($materia == 'Matematicas') {
            $nombreExamen = "Suma";
            $respuestasCorrectas = [
                'pregunta1' => 'D',
                'pregunta2' => 'B',
                'pregunta3' => 'D',
                'pregunta4' => 'A',
                'pregunta5' => 'C',
                'pregunta6' => 'C',
            ];
        }

        foreach ($respuestasCorrectas as $pregunta => $respuestaCorrecta) {
            $respuesta = $request->input($pregunta);

            if ($respuesta == $respuestaCorrecta) {
                $contador++;
            }
        }
        $usuario = Auth::user();
        $examen = Examen::firstOrCreate(['nombreExamen' => $nombreExamen]);
        $nota = round(($contador / 6) * 5);

        $usuario->exam()->attach($examen, ['nota' => $nota]);

        return view('estudiantes.pdf', compact('nota', 'nombreExamen', 'materia'));
    }
    public function generarCertificado(Request $request)
    {
        $nota = $request->input('nota');
        $nombreExamen = $request->input('nombreExamen');

        $html = view('estudiantes.certificado', compact('nombreExamen','nota'))->render();

        // Crear una instancia de Dompdf
        $dompdf = new Dompdf();

        // Cargar el contenido HTML en Dompdf
        $dompdf->loadHtml($html);

        // Renderizar el contenido HTML en PDF
        $dompdf->render();

        // Generar una respuesta de descarga para el PDF
        return $dompdf->stream('Certificado.pdf');
    }
}
