<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Ubicacion;
use App\Models\Empleado;
use Illuminate\Http\Request;

class EquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipos = Equipo::all();
        return view('personal.equipos', compact('equipos'));
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
        // Validar los datos del formulario antes de enviarlos a la base de datos
        $validatedData = $request->validate([
            'vc_nombre_equipo' => 'required|string|max:100',
            't_componentes_generales' => 'nullable|string',
            'vc_serial_equipo' => 'required|string|max:100|unique:equipo,vc_serial_equipo', // Serial único
            'vc_marca' => 'required|string|max:100',
            'vc_modelo' => 'nullable|string|max:100',
            'd_fecha_compra' => 'nullable|date',
            'dec_costo_equipo' => 'nullable|numeric|min:0',
            'vc_estado_equipo' => 'required|string|max:100',
            'vc_garantia_equipo' => 'nullable|string|max:100',
            'i_fk_id_ubicacion' => 'nullable|integer|exists:ubicacion,i_pk_id', // Clave foránea debe existir
            'i_fk_id_empleado' => 'nullable|integer|exists:empleado,i_pk_id', // Clave foránea debe existir
        ]);
        // Crear un nuevo equipo con los datos validados
        Equipo::create($validatedData);

        //Redirigir al crear el empleado mostrando un mensaje
        return back()->with('success', 'Equipo creado exitosamente');
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
        $equipos = Equipo::findOrFail($id); // Encuentra el equipo o lanza una excepción
        return view('personal.editEqui', compact('equipos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'vc_nombre_equipo' => 'required|string|max:100',
            't_componentes_generales' => 'nullable|string',
            'vc_serial_equipo' => 'required|string|max:100|unique:equipo,vc_serial_equipo,' . $id . ',i_pk_id',
            'vc_marca' => 'required|string|max:100',
            'vc_modelo' => 'nullable|string|max:100',
            'd_fecha_compra' => 'nullable|date',
            'dec_costo_equipo' => 'nullable|numeric|min:0',
            'vc_estado_equipo' => 'required|string|max:100',
            'vc_garantia_equipo' => 'nullable|string|max:100',
            'i_fk_id_ubicacion' => 'nullable|integer|exists:ubicacion,i_pk_id',
            'i_fk_id_empleado' => 'nullable|integer|exists:empleado,i_pk_id',
        ]);

        try {
            $equipo = Equipo::findOrFail($id);
            $equipo->update($validatedData);
            return redirect()->route('equipos.index')->with('success', 'Equipo actualizado exitosamente');
        } catch (\Exception $e) {
            return back()->withErrors('Error al actualizar el equipo: ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $equipo = Equipo::findOrFail($id);
            $equipo->delete();
            return redirect()->route('equipos.index')->with('success', 'Equipo eliminado exitosamente');
        } catch (\Exception $e) {
            return back()->withErrors('Error al eliminar el equipo: ' . $e->getMessage());
        }
    }
}
