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
        ]);
        $capturista_sji = User::create([
            'name' => 'Capturista SJI',
            'email' => 'sji_captura@example.com',
            'password' => Hash::make('1234'),
            'role'  => 'Capturista',
        ]);
        $enlace_sji = User::create([
            'name' => 'Enlace SJI',
            'email' => 'sji_enlace@example.com',
            'password' => Hash::make('1234'),
            'role'  => 'Enlace',
        ]);
        $this->call(DiagnosticoSeeder::class);
        $this->call(GeneroSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(TipoSeeder::class);
    }
}
