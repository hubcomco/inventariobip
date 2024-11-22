<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;

class RolController extends Controller
{
    public function store(Request $request) {  
        $request->validate([ 
            'vc_rol' => 'required|string|max:255', 
        ]);
        // Crear un nuevo rol 
        Rol::create([ 'vc_rol' => $request->vc_rol, ]);  
        return redirect()->route('personal.usuarios')->with('success', 'Rol creado exitosamente.'); 
    }

    public function edit(string $id)
    {   
        // Busca el rol por su ID
        $rol = Rol::findOrFail($id);

        // Retorna una vista específica para editar roles
        return view('personal.editRol', compact('rol'));
    }


    public function destroy(String $id){
        // Encuentra el rol por ID
        $rol = Rol::findOrFail($id);

        // Elimina el rol
        $rol->delete();

        // Redirige de vuelta con un mensaje de éxito
        return redirect()->route('personal.usuarios')->with('success', 'Rol eliminado exitosamente.');
    }


    public function update(Request $request, string $id){
        // Validar los datos enviados desde el formulario
        $request->validate([
            'vc_rol' => 'required|string|max:255',
        ]);

        // Buscar el rol por su ID
        $rol = Rol::findOrFail($id);

        // Actualizar el nombre del rol
        $rol->update([
            'vc_rol' => $request->vc_rol,
        ]);

        // Redirigir a la página de lista de roles con un mensaje de éxito
        return redirect()->route('personal.usuarios')->with('success', 'Rol actualizado exitosamente.');
    }

}