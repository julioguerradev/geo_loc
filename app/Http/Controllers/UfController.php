<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ufs;
use Illuminate\Http\JsonResponse;


class UfController extends Controller
{
    public function index(): JsonResponse
    {
        $ufs = Ufs::all();
        return response()->json($ufs);
    }
}
