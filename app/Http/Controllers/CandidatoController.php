<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use Illuminate\Http\Request;

class CandidatoController extends Controller
{
    public function index()
    {
        $candidatos = Candidato::withCount("votaciones")->get();
        return view("candidatos.index", compact("candidatos"));
    }

    public function buscar(Request $request)
    {
        $query = $request->input("q");
        return Candidato::where("nombre", "LIKE", "%$query%")->get();
    }
}
