<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\EquiposController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolController;
use App\Models\Rol;

//Ruta login
Route::get('/', function () {return view('login.login');});
//Ruta para acceder al dashboard
Route::get('/dashboard', function () {return view('personal.index');})->middleware(['auth', 'verified'])->name('dashboard');


//Ruta para mostrar el listado de empleados registrados
Route::get('/dashboard', [EmpleadosController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
//Ruta para registrar los empleados mediante el formulario
Route::post('/empleados/store', [EmpleadosController::class, 'store'])->name('empleados.store');
//Ruta para mostrar el form de edicion
Route::get('/empleados', [EmpleadosController::class, 'index'])->name('empleados.index');
//Ruta para editar los empleados mediante la tabla de registro
Route::get('/empleados/{id}/edit', [EmpleadosController::class, 'edit'])->name('empleados.edit');
//Ruta para actualizar los empleados editados
Route::put('/empleados/{id}', [EmpleadosController::class, 'update'])->name('empleados.update');
//Ruta para eliminar los empleados
Route::delete('/empleados/{id}', [EmpleadosController::class, 'destroy'])->name('empleados.destroy');


// Ruta para ver el dashboard de los equipos
Route::get('/equipos', function () { return view('personal.equipos');})->name('equipos');
//Ruta para mostar los equipos mediante el formulario
Route::get('/equipos', [EquiposController::class, 'index'])->name('equipos.index');
//Ruta para registrar los equipos 
Route::post('/equipos/store', [EquiposController::class, 'store'])->name('equipos.store');
//Ruta para editar los equipos mediante la tabla de equipos
Route::get('/equipos/{id}/edit', [EquiposController::class, 'edit'])->name('equipos.edit');

//Ruta para ver los usuarios registrados
Route::get('/usuarios', [UserController::class, 'index'])->name('personal.usuarios');
//Ruta para registrar los Usuarios
Route::post('/usuarios/store',[UserController::class, 'store'])->name('personal.usuarios.store');
//Ruta para editar los Usuarios
Route::get('/usuarios/{id}/edit', [UserController::class, 'edit'])->name('personal.usuarios.edit');
//Ruta para eliminar los Usuarios
Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('personal.usuarios.destroy');
//Ruta para actualizar los usuarios
Route::put('/usuarios/{id}', [UserController::class, 'update'])->name('personal.usuarios.update');


//Ruta para registrar el Rol
Route::post('/roles', [RolController::class, 'store'])->name('roles.store');
//Ruta que actualiza los roles luego de ser eliminados
Route::put('/roles/{id}', [RolController::class, 'update'])->name('roles.update');
//Ruta para editar los roles
Route::get('/roles/{id}/edit', [RolController::class, 'edit'])->name('roles.edit');
////Ruta para eliminar los roles
Route::delete('/roles/{id}', [RolController::class, 'destroy'])->name('roles.destroy'); 


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


