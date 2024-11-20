<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\EquiposController;

//Ruta login
Route::get('/', function () {
    return view('login.login');
});

//Ruta para acceder al dashboard
Route::get('/dashboard', function () {
    return view('personal.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// Ruta para ver el dashboard de los equipos
Route::get('/equipos', function () {
    return view('personal.equipos'); 
})->name('equipos');

//Ruta para mostrar el listado de empleados registrados
Route::get('/dashboard', [EmpleadosController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
//Ruta para registrar los empleados mediante el formulario
Route::post('/empleados/store', [EmpleadosController::class, 'store'])->name('empleados.store');
//Ruta para mostrar el form de edicion
Route::get('/empleados', [EmpleadosController::class, 'index'])->name('empleados.index');
//Ruta para editar los empleados mediante la tabla de registro
Route::get('/empleados/editar/{id}', [EmpleadosController::class, 'edit'])->name('empleados.edit');
//Ruta para actualizar los empleados editados
Route::put('/empleados/{id}', [EmpleadosController::class, 'update'])->name('empleados.update');

//Ruta para mostar los equipos mediante el formulario
Route::get('/equipos', [EquiposController::class, 'index'])->name('equipos.index');
//Ruta para registrar los equipos 
Route::post('/equipos/store', [EquiposController::class, 'store'])->name('equipos.store');
//Ruta para editar los equipos mediante la tabla de equipos
Route::get('/equipos/{id}/edit', [EquiposController::class, 'edit'])->name('equipos.edit');
//Ruta para actualizar los empleados editados


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


