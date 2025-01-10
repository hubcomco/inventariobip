<?php

namespace App\Http\Controllers;

use App\Models\Asignacion;
use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Empleado;

class AsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($equipoId)
    {
        $equipo = Equipo::findOrFail($equipoId);
        $empleados = Empleado::all();
        return view('asignaciones.create', compact('equipo', 'empleados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $equipoId)
    {
        $request->validate([
            'empleado_id' => 'required|exists:empleados,i_pk_id',
        ]);
    
        Asignacion::create([
            'i_fk_id_empleado' => $request->empleado_id,
            'i_fk_id_equipo' => $equipoId,
        ]);
    
        return redirect()->route('equipos.index')->with('success', 'Equipo asignado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Asignacion $asignacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asignacion $asignacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asignacion $asignacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asignacion $asignacion)
    {
        //
    }
}
