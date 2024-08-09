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
        $validatedData = $request->validate([
            'data_referencia' => 'required|date',
            'uf_id' => 'required|exists:ufs,id',
            'rodovia_id' => 'required|exists:rodovias,id',
            'quilometragem_inicial' => 'required|integer',
            'quilometragem_final' => 'required|integer',
            'geo' => 'nullable|string',
        ]);

        $ufRodovia = $this->trechoService->getUfAndRodoviaData($validatedData['uf_id'], $validatedData['rodovia_id']);

        $trecho = new Trechos();

        $trecho->fill($validatedData);
        $trecho->geo = $this->trechoService->fetchGeo($validatedData, $ufRodovia);

        $trecho->save();
        return redirect()->route('trechos.index');
    }

    public function show($id)
    {
        $trecho = Trechos::with(['uf', 'rodovia'])->findOrFail($id);

        return Inertia::render('Trechos/Show', [
            'trecho' => $trecho
        ]);
    }

    public function edit($id)
    {
        $trecho = Trechos::findOrFail($id);

        return inertia('Trechos/Edit', [
            'trecho' => $trecho
        ]);
    }

    public function update(Request $request, $id)
    {
        $trecho = Trechos::findOrFail($id);
        $trecho->update($request->all());

        return redirect()->route('trechos.index')->with('success', 'Trecho atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $trecho = Trechos::findOrFail($id);
        $trecho->delete();

        return redirect()->route('trechos.index')->with('success', 'Trecho deletado com sucesso!');
    }

}
