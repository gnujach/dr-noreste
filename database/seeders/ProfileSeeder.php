<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            'user_id' => 1,
            'municipio_id' => 1,
            'puesto_id' => 3,
        ]);
        DB::table('profiles')->insert([
            'user_id' => 2,
            'municipio_id' => 1,
            'puesto_id' => 4,
        ]);
        DB::table('profiles')->insert([
            'user_id' => 1,
            'municipio_id' => 1,
            'puesto_id' => 2,
        ]);
    }
}
