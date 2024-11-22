<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Rol;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $usuarios = User::all(); // Obtener todos los usuarios 
        $roles = Rol::all(); // Obtener todos los roles 
        return view('personal.usuarios', compact('usuarios', 'roles'));
    }


    public function store(Request $request){
        // Validación de datos
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
        $usuarios = User::find($id);
        
        if (!$usuarios) {
            return redirect()->back()->with('error', 'Usuario no encontrado.');
        }

        return view('personal.usuarios', compact('usuarios'));
    }


    public function destroy(String $id){
        // Encuentra el usuario por ID
        $usuario = User::findOrFail($id);

        // Elimina el usuario
        $usuario->delete();

        // Redirige de vuelta con un mensaje de éxito
        return redirect()->route('personal.usuarios')->with('success', 'Usuario eliminado exitosamente.');
    }
}
