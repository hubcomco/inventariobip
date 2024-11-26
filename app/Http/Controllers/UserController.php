<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Rol;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::all(); // Obtener todos los usuarios 
        $roles = Rol::all(); // Obtener todos los roles 
        return view('personal.usuarios', compact('usuarios', 'roles'));
    }


    public function store(Request $request)
    {
        // Validacion de datos
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Crear el usuario en la base de datos
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']), // Hash de la contraseña
        ]);

        return redirect()->route('personal.usuarios')->with('success', 'Usuario creado exitosamente.');
    }

    public function edit(string $id)
    {
        $usuario = User::findOrFail($id);
        return view('personal.form.editUser', compact('usuario'));
    }


    public function destroy(String $id)
    {
        // Encuentra el usuario por ID
        $usuario = User::findOrFail($id);
        // Elimina el usuario
        $usuario->delete();
        // Redirige de vuelta con un mensaje 
        return redirect()->route('personal.usuarios')->with('success', 'Usuario eliminado exitosamente.');
    }

    public function update(Request $request, string $id)
    {
        // Validación de los datos del formulario
        $validatedData = $request->validate([
            'name' => 'required|string|max:255', 
            'email' => 'required|email|max:255|unique:users,email,' . $id,
        ]);
        // Busca el usuario en la base de datos
        $usuario = User::findOrFail($id);
        // Actualiza los datos del usuario
        $usuario->update($validatedData);
        // Redirige a la lista de usuarios con un mensaje
        return redirect()->route('personal.usuarios')->with('success', 'Usuario actualizado exitosamente.');
    }
}
