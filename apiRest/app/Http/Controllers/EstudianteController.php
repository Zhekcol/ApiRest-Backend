<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    
    public function index()
    {
        $estudiantes = Estudiante::all();
        
        $data = [];
        foreach ($estudiantes as $estudiante) {
            $data[] = [
                'id' => $estudiante->id,
                'documento' => $estudiante->documento,
                'nombre' => $estudiante->nombre,
                'telefono' => $estudiante->telefono,
                'email' => $estudiante->email,
                'direccion' => $estudiante->direccion,
                'ciudad' => $estudiante->ciudad,
                'semestre' => $estudiante->semestre,
                'profesores' => $estudiante->profesores,
                'asignaturas' => $estudiante->asignaturas
            ];
        }

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $estudiante = Estudiante::create($request->all());

        return response()->json($estudiante);
    }

    public function show(Estudiante $estudiante)
    {
        return response()->json($estudiante);
    }

    public function update(Request $request, Estudiante $estudiante)
    {
        $estudiante->update($request->all());

        return response()->json($estudiante);
    }

    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();

        return response()->json($estudiante);
    }

    //Añadir un profesor a un estudiante
    public function attachProfesores(Request $request){
        $estudiante = Estudiante::find($request->estudiante_id);
        $estudiante->profesores()->syncWithoutDetaching($request->profesore_id);
        
        return response()->json($estudiante);
    }

    //Quitar un profesor a un estudiante
    public function detach(Request $request){
        $estudiante = Estudiante::find($request->estudiante_id);
        $estudiante->profesores()->detach($request->profesore_id);

        return response()->json($estudiante);
    }
}
