<?php

namespace App\Http\Controllers;

use App\Models\Votacion;
use App\Models\Candidato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VotacionController extends Controller
{
    function normalizarCadena($cadena) {
       
        // Eliminar caracteres no permitidos
        $cadena = preg_replace('/[^a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s]/u', '', $cadena);
        
        // Normalizar espacios
        $cadena = preg_replace('/\s+/u', ' ', trim($cadena));
        
        // Convertir a minúsculas y capitalizar palabras
        $cadena = mb_convert_case(mb_strtolower($cadena, 'UTF-8'), MB_CASE_TITLE, 'UTF-8');
        
        
        return $cadena;
    }
    
    public function redirect_votar()
    {
        if(Auth::check()){
        return redirect()->route("candidatos.create");
        }else{
            return redirect()->route("login")->with("error", "Debes iniciar sesión para votar.");}      
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            "nombre" => "required",
            "puntuacion" => "required|integer|between:1,5",
            "comentarios" => "nullable|string|max:255",
        ]);
        $candidato = Candidato::where("nombre", $validated["nombre"])->first();
          if (!$candidato) {
            $candidato=new Candidato();
            $candidato->nombre = $this->normalizarCadena($validated["nombre"]);
            
            $candidato->save();}
        Votacion::create([
            "candidato_id" => $candidato->id,
            "user_id" => auth()->id(),
            "puntuacion" => $validated["puntuacion"],
            "comentarios" => $validated["comentarios"],
            "ip_address" => $request->ip(),
        ]);

        return redirect()
            ->route("dashboard")
            ->with("success", "ok");
    }
}
