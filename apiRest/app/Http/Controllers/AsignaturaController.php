<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    
    public function index()
    {
        $asignaturas = Asignatura::all();
        $data = [];
        foreach ($asignaturas as $asignatura) {
            $data[] = [
                'id' => $asignatura->id,
                'documento' => $asignatura->documento,
                'nombre' => $asignatura->nombre,
                'telefono' => $asignatura->telefono,
                'email' => $asignatura->email,
                'direccion' => $asignatura->direccion,
                'ciudad' => $asignatura->ciudad,
                'semestre' => $asignatura->semestre,
                'profesores' => $asignatura->profesores,
                'estudiantes' => $asignatura->estudiantes
            ];
        }

        return response()->json($asignaturas);
    }

    public function store(Request $request)
    {
        $asignatura = Asignatura::create($request->all());

        return response()->json($asignatura);
    }

    public function show(Asignatura $asignatura)
    {
        return response()->json($asignatura);
    }

    public function update(Request $request, Asignatura $asignatura)
    {
        $asignatura->update($request->all());

        return response()->json($asignatura);
    }

    public function destroy(Asignatura $asignatura)
    {
        $asignatura->delete();

        return response()->json($asignatura);
    }

    //Añadir una asignatura a un estudiante
    public function attachEstudiantes(Request $request){
        $asignatura = Asignatura::find($request->asignatura_id);
        $asignatura->estudiantes()->syncWithoutDetaching($request->estudiante_id);

        return response()->json($asignatura);
    }
}
