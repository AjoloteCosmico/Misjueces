<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use Illuminate\Http\Request;
use DB;
class CandidatoController extends Controller
{
    public function index()
    {
        $candidatos = Candidato::withCount("votaciones")->get();
        return view("candidatos.index", compact("candidatos"));
    }
    public function create()
    {
        return view("candidatos.create");
    }
    public function buscar(Request $request)
    {
        $term = $request->query('q'); // Obtener el término de búsqueda

        $resultados = Candidato::where(DB::raw('lower(nombre)'), 'like', '%' . strtolower($term) . '%')
            // where('nombre', 'LIKE', "%$term%")
            ->take(10)
            ->get();

        return response()->json($resultados);
    }
}
