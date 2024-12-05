<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historial;
use App\Models\Equipo;
use App\Models\Empleado;
use App\Models\Ubicacion;

class HistorialesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $equipos = Equipo::all();
        $empleados = Empleado::all();
        $ubicaciones = Ubicacion::all();
        $historiales = Historial::with(['equipo', 'empleado', 'ubicaciones'])->get();
        return view('personal.historial', compact('historiales', 'equipos', 'empleados', 'ubicaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([ 
            'i_fk_id_equipo' => 'required|exists:equipo,i_pk_id',
            'i_fk_id_empleado' => 'required|exists:empleado,i_pk_id',
            'i_fk_id_ubicacion' => 'required|exists:ubicacion,i_pk_id',
            'vc_observaciones' => 'required|string|max:255', 
            'd_fecha_observaciones' => 'nullable|date',
        ]);
        // Crear un nuevo rol 
        Historial::create([$validatedData]);  
        return redirect()->route('personal.historial')->with('success', 'Observación agregada exitosamente.'); 

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
        $historiales = Historial::findOrFail($id);
        return view('personal.editHisto', compact('historiales'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
