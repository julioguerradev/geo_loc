<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Ufs;
use App\Models\Trecho;
use GuzzleHttp\Client;
use App\Models\Rodovias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Exception\RequestException;

class TrechosService {

    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * Método para salvar os dados de uma novo Trecho
     */
    public function saveTrechoData($data){
    }

    /**
     * Método para atualizar os dados de um Trecho
     */
    public function updateTrechoData($data)
    {
    }

    /**
     * Método para validar os dados do novo Trecho
     */
    public function validate(Request $r)
    {
        $result = $r->validate([
            'uf_id'                 => 'required|int',
            'rodovia_id'            => 'required|int|min:3|max:5',
            'quilometragem_inicial' => 'required|int',
            'quilometragem_final'    => 'required|integer',
        ], [
            'uf_id.required'                 => 'UF deve ser informado.',
            'rodovia_id.required'            => 'A Rodovia deve ser informada.',
            'rodovia_id.min'                 => 'A Rodovia deve ter ao menos 3 digitos.',
            'quilometragem_inicial.required' => 'A quilometragem inicial deve ser informado.',
            'quilometragem_final.required'    => 'A quilometragem final deve ser informado.',
        ]);

        $result['data_referencia'] = Carbon::now()->format('Y-m-d');

        return $result;
        
    }

    public function getUfAndRodoviaData($ufId, $rodoviaId)
    {
        $uf = Ufs::find($ufId);
        $rodovia = Rodovias::find($rodoviaId);

        if (!$uf || !$rodovia) {
            throw new \Exception('UF ou Rodovia não encontrado.');
        }

        return [
            'uf_sigla' => $uf->sigla,
            'rodovia_codigo' => str_replace('BR-', '', $rodovia->codigo)
        ];
    }

    public function fetchGeo($params, $ufRodovia)
    {
        $rodovia               = $ufRodovia['rodovia_codigo'];
        $tipo                  = 'B';
        $uf                    = $ufRodovia['uf_sigla'];
        $data_referencia       = $params['data_referencia'];
        $quilometragem_inicial = $params['quilometragem_inicial'];
        $quilometragem_final    = $params['quilometragem_final'];

        $url = "https://servicos.dnit.gov.br/sgplan/apigeo/rotas/espacializarlinha?br={$rodovia}&tipo={$tipo}&uf={$uf}&cd_tipo=null&data={$data_referencia}&kmi={$quilometragem_inicial}&kmf={$quilometragem_final}";

        try {
            $response = $this->client->get($url);
            
            return $response->getBody()->getContents();
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                return json_decode($e->getResponse()->getBody()->getContents(), true);
            }
            return ['error' => 'Request failed'];
        }
    }
}
