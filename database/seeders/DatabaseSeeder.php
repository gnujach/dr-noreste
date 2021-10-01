<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MunicipioSeeder::class);
        $this->call(PuestoSeeder::class);
        $this->call(ProfileSeeder::class);
        $adminUser = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('1234'),
            'role'  => 'Admin',
            'municipio_id' => 1
        ]);
        $capturista_sji = User::create([
            'name' => 'Capturista SJI',
            'email' => 'sji_captura@example.com',
            'password' => Hash::make('1234'),
            'role'  => 'Capturista',
            'municipio_id' => 1
        ]);
        $enlace_slpaz = User::create([
            'name' => 'Enlace SJI',
            'email' => 'sji_enlace@example.com',
            'password' => Hash::make('1234'),
            'role'  => 'Enlace',
            'municipio_id' => 2
        ]);
        $this->call(DiagnosticoSeeder::class);
        $this->call(GeneroSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(TipoSeeder::class);
    }
}
