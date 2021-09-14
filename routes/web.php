<?php

use App\Http\Controllers\EvidenciaController;
use App\Http\Controllers\IncidenteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Rutas genericas y de autentricacion
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();


// Rutas de ficha de asistencia
Route::get('asistencias', [IncidenteController::class, 'index'])->name('asistencias.index');
Route::get('asistencias/{id}', [IncidenteController::class, 'incidencias'])->name('asistencias.incidencias');
Route::get('asistencias/crear/{id}', [IncidenteController::class, 'create'])->name('asistencias.create');
Route::post('asistencias/crear', [IncidenteController::class, 'store'])->name('asistencias.store');

// Rutas de evidencias
Route::get('evidencias/{id}', [EvidenciaController::class, 'index'])->name('evidencia.index');
Route::post('evidencias/{id}', [EvidenciaController::class, 'agregarEvidencia'])->name('evidencia.agregar');
Route::get('evidencias/delete/{id}', [EvidenciaController::class, 'eliminarEvidencia'])->name('evidencia.eliminar');

Route::get('evidencias/show/{nombre_archivo}', [EvidenciaController::class, 'show'])->name('evidencia.show');
//Route::get('evidencias/show/img/{nombre_archivo}', [EvidenciaController::class, 'verEvidencia'])->name('evidencia.ver');



