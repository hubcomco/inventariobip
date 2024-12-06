<?php

namespace App\Http\Controllers;

use App\Models\Ubicacion;
use Illuminate\Http\Request;

class UbicacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ubicaciones=Ubicacion::all();
        // Cargar el archivo json
        $paisesCiudades = json_decode(file_get_contents(storage_path('app/paises_ciudades.json')), true);
        return view('personal.ubicaciones', compact('ubicaciones', 'paisesCiudades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'vc_pais' => 'required|string|max:100',
            'vc_ciudad' => 'required|string|max:100',
            'vc_direccion' => 'required|string|max:255',
            ]);
            // Crear un nuevo equipo con los datos validados
        Ubicacion::create($validatedData);
        return redirect()->route('personal.ubicaciones')->with('success', 'Ubicación creada exitosamente.');    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ubicaciones = Ubicacion::findOrFail($id);
        $paisesCiudades = json_decode(file_get_contents(storage_path('app/paises_ciudades.json')), true);
        return view('personal.editUbi', compact('ubicaciones', 'paisesCiudades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validación de los datos del formulario
        $validatedData = $request->validate([
            'vc_pais' => 'required|string|max:255', 
            'vc_ciudad' => 'required|string|max:255|',
            'vc_direccion' => 'required|string|max:255',
        ]);
        // Busca el usuario en la base de datos
        $ubicaciones = Ubicacion::findOrFail($id);
        // Actualiza los datos del usuario
        $ubicaciones->update($validatedData);
        // Redirige a la lista de usuarios con un mensaje
        return redirect()->route('personal.ubicaciones')->with('success', 'Ubicación actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ubicaciones = Ubicacion::findOrFail($id);

        // Elimina el rol
        $ubicaciones->delete();

        // Redirige de vuelta con un mensaje de éxito
        return redirect()->route('personal.ubicaciones')->with('success', 'Ubicación eliminada exitosamente.');
    }
}
