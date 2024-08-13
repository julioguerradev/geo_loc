<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rodovias;
use Illuminate\Http\JsonResponse;

class RodoviaController extends Controller
{
    public function index(): JsonResponse
    {
        $rodovias = Rodovias::all();
        return response()->json($rodovias);
    }

    public function getRodoviasByUf($uf)
    {
        try {
            $rodovias = Rodovias::whereHas('uf', function ($query) use ($uf) {
                $query->where('id', $uf);
            })->with('uf')
              ->get();

            return response()->json($rodovias);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao buscar rodovias: ' . $e->getMessage()], 500);
        }
    }
}
