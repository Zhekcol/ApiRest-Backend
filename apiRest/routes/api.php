<?php

use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\ProfesoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('estudiantes', EstudianteController::class);
Route::apiResource('profesores', ProfesoreController::class);
Route::apiResource('asignaturas', AsignaturaController::class);

Route::post('estudiantes/profesore', [EstudianteController::class, 'attachProfesores']);
Route::post('estudiantes/profesore/detach', [EstudianteController::class, 'detach']);
Route::post('asignaturas/estudiante', [AsignaturaController::class, 'attachEstudiantes']);
Route::post('profesores/asignatura', [ProfesoreController::class, 'attachAsignaturas']);

//Ver estudiantes vinculados con determinado profesor
Route::post('profesores/estudiante', [ProfesoreController::class, 'estudiantes']);
