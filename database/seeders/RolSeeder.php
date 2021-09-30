<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rols')->insert([
            'nombre' => 'Alumno',
        ]);
        DB::table('rols')->insert([
            'nombre' => 'Docente',
        ]);
        DB::table('rols')->insert([
            'nombre' => 'Intendente',
        ]);
        DB::table('rols')->insert([
            'nombre' => 'Personal de apoyo',
        ]);
        DB::table('rols')->insert([
            'nombre' => 'Director',
        ]);
    }
}
