<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Materias;
use App\Models\Temas;
use App\Http\Controllers\Controller;

class MateriasController extends Controller
{


    public function index()
    {
        $materias = Materias::all();
        return view('materias.index', compact('materias'));
    }

    public function create()
    {
        return view('materias.create');
    }

    public function sendData(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'title' => 'required|array|min:1'
        ];
        $messages = [
            'name.required' => 'El nombre de la materia es obligatorio.',
            'name.min' => 'El nombre de la materia debe tener más de 3 caracteres.'
        ];

        $this->validate($request, $rules, $messages);

        //Nombre y descripcion
        $materias = new Materias();
        $materias->name = $request->input('name');
        $materias->description = $request->input('description');
        $materias->save();
        $id = $materias->id;
        $notification = 'La materia se ha agregado correctamente';
        //Temas

        // Insertar los temas en la base de datos
        /*
        foreach ($temas as $tema) {
            $temaModel = new Temas();
            $temaModel->titulo = $tema;
            $temaModel->materia_id = $materias->id;
            $temaModel->save();
        }
        */

        /*
        $temas = $request->input('title');
        foreach ($temas as $tema) {
            $tema_db = new Temas;
            $tema_db->titulo = $tema['titulo'];
            $tema_db->materia_id = $materias->id; // Relacionar el tema con la materia
            $tema_db->save();
        }
        */

        return redirect('/materias')->with(compact('notification'));
    }

    public function edit(Materias $materias)
    {
        return view('materias.edit', compact('materias'));
    }

    public function update(Request $request, Materias $materias)
    {
        $rules = [
            'name' => 'required|min:3'
        ];
        $messages = [
            'name.required' => 'El nombre de la materia es obligatorio.',
            'name.min' => 'El nombre de la materia debe tener más de 3 caracteres.'
        ];

        $this->validate($request, $rules, $messages);

        $materias->name = $request->input('name');
        $materias->description = $request->input('description');
        $materias->save();
        $notification = 'La materia se ha actualizado correctamente';

        return redirect('/materias')->with(compact('notification'));
    }

    public function destroy(Materias $materias)
    {
        $deleteName = $materias->name;
        $materias->delete();
        $notification = 'La materia ' . $deleteName . ' se ha eliminado correctamente';

        return redirect('/materias')->with(compact('notification'));
    }

    public function inscritos(Materias $materias)
    {
        $materia = Materias::findOrFail($materias->id);
        $estudiantes = $materia->users;
        //dd($estudiantes);

        return view('materias.inscritos', compact('estudiantes', 'materia'));
    }
    public function examen(Materias $query){
        
    }
}
