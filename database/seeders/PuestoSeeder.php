<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('puestos')->insert([
            'nombre' => 'Jefe de USAE',
        ]);
        DB::table('puestos')->insert([
            'nombre' => 'Asesor de participación social',
        ]);
        DB::table('puestos')->insert([
            'nombre' => 'Subjefe de informática',
        ]);
        DB::table('puestos')->insert([
            'nombre' => 'Director de escuela',
        ]);
    }
}
