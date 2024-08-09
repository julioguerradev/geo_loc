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
}
