<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historial;
use App\Models\Equipo;
use App\Models\Empleado;
use App\Models\Ubicacion;

class HistorialesController extends Controller
{
    public function index()
    {   
        $equipos = Equipo::all(); 
        $empleados = Empleado::all(); 
        $ubicaciones = Ubicacion::all(); 
        $historiales = Historial::with(['equipo', 'empleado', 'ubicaciones'])->get();
        return view('Historial.historial', compact('historiales', 'equipos', 'empleados', 'ubicaciones'));
    }

   public function create()
    {
        //
    }

    public function store(Request $request)
    {   
        $validatedData = $request->validate([
            'i_fk_id_equipo' => 'required|exists:equipo,i_pk_id',
            'i_fk_id_empleado' => 'required|exists:empleado,i_pk_id',
            'i_fk_id_ubicacion' => 'required|exists:ubicacion,i_pk_id',
            'vc_observaciones' => 'required|string|max:255',
            'd_fecha_observaciones' => 'nullable|date',
        ]);
        // Crear un nuevo historial 
        Historial::create([$validatedData]);
        return redirect()->route('Historial.historial')->with('success', 'Observación agregada exitosamente.');
    }

    public function show(string $id)
    {
       //
    }

    public function edit(string $id)
    {   
        $empleados = Empleado::all(); 
        $ubicaciones = Ubicacion::all(); 
        $equipos = Equipo::all();  
        $historial = Historial::findOrFail($id);
        return view('Historial.editHisto', compact('historial','equipos','empleados','ubicaciones'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
           'vc_observaciones' => 'string|max:255',
            'd_fecha_observaciones' => 'nullable|date',
        ]);
        // Busca el historial en la base de datos
        $historial = Historial::findOrFail($id);
        // Actualiza los datos del historial
        $historial->update([
            'vc_observaciones' => $request -> vc_observaciones,
            'd_fecha_observaciones' => $request -> d_fecha_observaciones,
        ]);
        // Redirige a la vista con un mensaje
        return redirect()->route('Historial.historial')->with('success', 'Historial actualizado exitosamente.');
    }

    public function destroy(string $id)
    {
        try {
            $historial = Historial::findOrFail($id);
            $historial->delete();
            return redirect()->route('Historial.historial')->with('success', 'Historial eliminado exitosamente');
        } catch (\Exception $e) {
            return back()->withErrors('Error al eliminar: ' . $e->getMessage());
        }
    }
}
