<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $empleados = Empleado::all();
        return view('personal.edit', compact('empleados'));
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
        // Me valida los datos del formulario antes de enviar a la bd
       $validatedData = $request->validate([
        'vc_nombre' => 'required|string|max:255',
        'vc_apellido' => 'required|string|max:255',
        'vc_cargo' => 'required|string|max:255',
        'vc_usuario_DA' => 'nullable|string|max:255',
        'vc_email' => 'required|email|max:255',
        'vc_email_personal' => 'nullable|email|max:255',
        'vc_telefono' => 'required|string|max:20',
        'vc_telefono_corporativo' => 'nullable|string|max:20',
        'vc_url_contrato' => 'nullable|file|max:10240',
        'vc_url_examenes' => 'nullable|file|max:10240',
        'vc_url_cedula' => 'nullable|file|max:10240',
        'i_fk_id_ubicacion' => 'nullable|integer'
       ]);

       // Manejo de los archivos pra guardar las rutas en la bd
        if ($request->hasFile('vc_url_contrato')) { 
            $validatedData['vc_url_contrato'] = $request->file('vc_url_contrato')->store('contratos');
        }
        if ($request->hasFile('vc_url_examenes')) { 
            $validatedData['vc_url_examenes'] = $request->file('vc_url_examenes')->store('examenes'); 
        } 
        if ($request->hasFile('vc_url_cedula')) { 
            $validatedData['vc_url_cedula'] = $request->file('vc_url_cedula')->store('cedulas'); 
        }

       //Crear un empleado según los datos del formulario
       Empleado::Create($validatedData);

       //Redirigir al crear el empleado mostrando un mensaje
       return back()->with('success', 'Empleado creado exitosamente');
    }

    public function dashboard(){
         //Se crea el metodo para obtener los datos de los empleados y ponerlos en el panel
        $empleados = Empleado::all();
        return view('personal.index', compact('empleados'));
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
       $empleado = Empleado::findOrFail($id);
       return view('personal.edit', compact('empleado'));  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'vc_nombre' => 'required|string|max:255', 
            'vc_apellido' => 'required|string|max:255', 
            'vc_cargo' => 'required|string|max:255', 
            'vc_usuario_DA' => 'nullable|string|max:255', 
            'vc_email' => 'required|email|max:255', 
            'vc_email_personal' => 'nullable|email|max:255', 
            'vc_telefono' => 'required|string|max:20', 
            'vc_telefono_corporativo' => 'nullable|string|max:20', 
            'vc_url_contrato' => 'nullable|string|max:255', 
            'vc_url_examenes' => 'nullable|string|max:255', 
            'vc_url_cedula' => 'nullable|string|max:255', 
            'i_fk_id_ubicacion' => 'nullable|integer|exists:ubicaciones,i_pk_id', 
        ]); 
        
        $empleado = Empleado::findOrFail($id); $empleado->update($validatedData);
        
        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
