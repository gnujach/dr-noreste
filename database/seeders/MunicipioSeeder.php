<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('municipios')->insert([
            'nombre' => 'San Jose Iturbide',
            'estado_id' => 11,
            'num_municipio' => 32,
        ]);
        DB::table('municipios')->insert([
            'nombre' => 'San Luis de la Paz',
            'estado_id' => 11,
            'num_municipio' => 33,
        ]);
    }
}
