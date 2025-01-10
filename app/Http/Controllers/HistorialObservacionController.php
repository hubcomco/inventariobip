<?php

namespace App\Http\Controllers;

use App\Models\HistorialObservacion;
use App\Models\Historial;
use Illuminate\Http\Request;

class HistorialObservacionController extends Controller
{
    /**
     * Mostrar una lista de observaciones.
     */
    public function index($id)
    {
        $historial = Historial::findOrFail($id);
        $observaciones = HistorialObservacion::where('i_fk_id_historial', $id)->get();
        return view('Historial.historialObservacion', compact('observaciones', 'historial'));
        
    }

    /**
     * Mostrar el formulario para crear una nueva observación.
     */
    public function create()
    {
    }

    /**
     * Almacenar una nueva observación en la base de datos.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'i_fk_id_historial' => 'required|exists:historial,i_pk_id',
            'vc_observacion' => 'required|string|max:255',
        ]);

        HistorialObservacion::create($validatedData);
        return redirect()->route('HistorialObservacion.index')->with('success', 'Observación creada exitosamente.');
    }


    /**
     * Mostrar el formulario para editar una observación.
     */
    public function edit($id)
    {
        $observacion = HistorialObservacion::findOrFail($id);
        return view('Historial.editHisto', compact('observacion'));
    }

    /**
     * Actualizar una observación en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'i_fk_id_historial' => 'required|exists:historial,i_pk_id',
            'vc_observacion' => 'required|string|max:255',
        ]);

        $observacion = HistorialObservacion::findOrFail($id);
        $observacion->update($validatedData);
        return redirect()->route('Historial.index')->with('success', 'Observación actualizada exitosamente.');
    }

    /**
     * Eliminar una observación de la base de datos.
     */
    public function destroy($id)
    {
        $observacion = HistorialObservacion::findOrFail($id);
        $observacion->delete();
        return redirect()->route('Historial.index')->with('success', 'Observación eliminada exitosamente.');
    }
}

