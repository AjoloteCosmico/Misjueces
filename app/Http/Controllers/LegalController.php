<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LegalController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'titulo' => 'required|string|max:255',
        'contenido' => 'required|string'
    ]);

    Legal::create([
        'titulo' => $request->titulo,
        'contenido' => $request->contenido,
        'version' => '1.0.0', // Lógica para incrementar versión
        'fecha_publicacion' => now()
    ]);

    return back()->with('success', 'Documento guardado');
}

}
