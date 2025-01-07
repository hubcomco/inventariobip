<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoEquipo;

class TipoEquipoController extends Controller
{
    public function index()
    {
        $tipos = TipoEquipo::all();
        return view('TipoEquipo.tipo', compact('tipos'));
    }

    public function create()
    {
        return view('TipoEquipo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'vc_tipo' => 'required|string|max:255',
        ]);

        TipoEquipo::create($request->all());
        return redirect()->route('TipoEquipo.index')->with('success', 'Tipo de equipo creado exitosamente.');
    }

    public function edit($id)
    {
        $tipo = TipoEquipo::findOrFail($id);
        return view('TipoEquipo.edit', compact('tipo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'vc_tipo' => 'required|string|max:255',
        ]);

        $tipo = TipoEquipo::findOrFail($id);
        $tipo->update($request->all());
        return redirect()->route('TipoEquipo.index')->with('success', 'Tipo de equipo actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $tipo = TipoEquipo::findOrFail($id);
        $tipo->delete();
        return redirect()->route('TipoEquipo.index')->with('success', 'Tipo de equipo eliminado exitosamente.');
    }
}
