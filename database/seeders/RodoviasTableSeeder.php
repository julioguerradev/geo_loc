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
            ['codigo' => '060', 'nome' => 'Rodovia BR-060'],
            ['codigo' => '101', 'nome' => 'Rodovia BR-101'],
            ['codigo' => '116', 'nome' => 'Rodovia BR-116'],
            ['codigo' => '153', 'nome' => 'Rodovia BR-153'],
            ['codigo' => '020', 'nome' => 'Rodovia BR-020'],
            ['codigo' => '070', 'nome' => 'Rodovia BR-070'],
            ['codigo' => '262', 'nome' => 'Rodovia BR-262'],
            ['codigo' => '324', 'nome' => 'Rodovia BR-324'],
            ['codigo' => '364', 'nome' => 'Rodovia BR-364'],
            ['codigo' => '425', 'nome' => 'Rodovia BR-425'],
            ['codigo' => '319', 'nome' => 'Rodovia BR-319'],
        ];

        DB::table('rodovias')->insert($rodovias);
    }
}
