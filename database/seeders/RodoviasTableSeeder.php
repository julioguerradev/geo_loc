<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RodoviasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rodovias = [
            'Acre' => ['BR-364'],
            'Alagoas' => ['BR-101'],
            'Amapá' => ['BR-156'],
            'Amazonas' => ['BR-174', 'BR-319'],
            'Bahia' => ['BR-116', 'BR-324'],
            'Ceará' => ['BR-116'],
            'Espírito Santo' => ['BR-101', 'BR-262'],
            'Goiás' => ['BR-153'],
            'Maranhão' => ['BR-135'],
            'Mato Grosso' => ['BR-163'],
            'Mato Grosso do Sul' => ['BR-163'],
            'Minas Gerais' => ['BR-040', 'BR-116', 'BR-381'],
            'Pará' => ['BR-158'],
            'Paraíba' => ['BR-101'],
            'Paraná' => ['BR-116', 'BR-277'],
            'Pernambuco' => ['BR-101'],
            'Piauí' => ['BR-316'],
            'Rio de Janeiro' => ['BR-101', 'BR-116'],
            'Rio Grande do Norte' => ['BR-101'],
            'Rio Grande do Sul' => ['BR-116', 'BR-290'],
            'Rondônia' => ['BR-364'],
            'Roraima' => ['BR-174'],
            'Santa Catarina' => ['BR-101'],
            'São Paulo' => ['BR-116', 'BR-153'],
            'Sergipe' => ['BR-101'],
            'Distrito Federal' => ['BR-060', 'BR-020', 'BR-070'],
        ];

        foreach ($rodovias as $estado => $rodoviasEstado) {
            foreach ($rodoviasEstado as $codigo) {
                DB::table('rodovias')->insert([
                    'codigo' => $codigo,
                    'nome' => "Rodovia $codigo",
                    'estado' => $estado,
                ]);
            }
        }
    }
}
