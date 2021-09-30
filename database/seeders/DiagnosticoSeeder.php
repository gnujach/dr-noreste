<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiagnosticoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('diagnosticos')->insert([
            'nombre' => 'Positivo',
        ]);
        DB::table('diagnosticos')->insert([
            'nombre' => 'Negativo',
        ]);
    }
}
