<?php

namespace App\Http\Controllers;

use App\Models\Votacion;
use Illuminate\Http\Request;

class VotacionController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            "nombre" => "required|exists:candidatos,nombre",
            "puntuacion" => "required|integer|between:1,5",
            "comentarios" => "nullable|string|max:255",
        ]);

        $candidato = Candidato::where("nombre", $validated["nombre"])->first();

        Votacion::create([
            "candidato_id" => $candidato->id,
            "user_id" => auth()->id(),
            "puntuacion" => $validated["puntuacion"],
            "comentarios" => $validated["comentarios"],
            "ip_address" => $request->ip(),
        ]);

        return redirect()
            ->route("candidatos.index")
            ->with("success", "Votación registrada exitosamente!");
    }
}
