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
        return view('Usuario.usuarios', compact('usuarios', 'roles'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'rol_id' => 'required|exists:rol,i_pk_id', // Validar que el rol existe
        ]);

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'rol_id' => $validatedData['rol_id'], // Guardar el rol
        ]);

        return redirect()->route('Usuario.usuarios')->with('success', 'Usuario creado exitosamente.');
    }


    public function edit(string $id)
    {
        $usuario = User::findOrFail($id);
        $roles = Rol::all();
        return view('Usuario.editUser', compact('usuario' , 'roles'));
    }


    public function destroy(String $id)
    {
        // Encuentra el usuario por ID
        $usuario = User::findOrFail($id);
        // Elimina el usuario
        $usuario->delete();
        // Redirige de vuelta con un mensaje 
        return redirect()->route('Usuario.usuarios')->with('success', 'Usuario eliminado exitosamente.');
    }

    public function update(Request $request, string $id)
    {
        // Validación de datos
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'rol_id' => 'required|exists:rol,i_pk_id', // Validar que el rol exista
        ]);
    
        // Actualizar el usuario
        $usuario = User::findOrFail($id);
        $usuario->update($validatedData);
    
        return redirect()->route('Usuario.usuarios')->with('success', 'Usuario actualizado exitosamente.');
    }
    
}
