<?php

namespace App\Http\Controllers;

use App\Models\Profesore;
use Illuminate\Http\Request;

class ProfesoreController extends Controller
{
    
    public function index()
    {
        $profesores = Profesore::all();
        $data = [];
        foreach ($profesores as $profesore) {
            $data[] = [
                'id' => $profesore->id,
                'documento' => $profesore->documento,
                'nombre' => $profesore->nombre,
                'telefono' => $profesore->telefono,
                'email' => $profesore->email,
                'direccion' => $profesore->direccion,
                'ciudad' => $profesore->ciudad,
                'semestre' => $profesore->semestre,
                'asignaturas' => $profesore->asignaturas,
                'estudiantes' => $profesore->estudiantes
            ];
        }

        return response()->json($profesores);
    }

    public function store(Request $request)
    {
        $profesore = Profesore::create($request->all());

        return response()->json($profesore);
    }

    public function show(Profesore $profesore)
    {
        return response()->json($profesore);
    }

    public function update(Request $request, Profesore $profesore)
    {
        $profesore->update($request->all());
    }

    public function destroy(Profesore $profesore)
    {
        $profesore->delete();

        return response()->json($profesore);
    }

    //Ver estudiantes que tenga un determinado profesor
    public function estudiantes(Request $request){
        $profesore = Profesore::find($request->profesore_id);
        $estudiantes = $profesore->estudiantes;

        return response()->json($estudiantes);
    }

    //Añadir una asignatura a un profesor
    public function attachAsignaturas(Request $request){
        $profesore = Profesore::find($request->profesore_id);
        $profesore->asignaturas()->syncWithoutDetaching($request->asignatura_id);

        return response()->json($profesore);
    }
}
