<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\Trechos;
use Illuminate\Http\Request;
use App\Services\TrechosService;

class TrechosController extends Controller
{
    protected $trechoService;

    public function __construct(
        TrechosService $trechoService)
    {
        $this->trechoService = $trechoService;
    }

    public function index()
    {
        $trechos = Trechos::all();
        return Inertia::render('Trechos/Index', ['trechos' => $trechos]);
    }

    public function create()
    {
        return Inertia::render('Trechos/Create');
    }

    public function store(Request $request)
    {
        // $dataToSave        = $this->trechoService->validate($request);


        $dataToSave                    = $request->all();
        $dataToSave['data_referencia'] = Carbon::now()->format('Y-m-d');
        $dataToSave['geo']             = (string) json_encode($this->trechoService->fetchGeo($dataToSave));
        $dataToSave['uf_id']           = 7;
        $trecho                        = new Trechos($dataToSave);

        $trecho->save();
        return redirect()->route('trechos.index');
    }
}
