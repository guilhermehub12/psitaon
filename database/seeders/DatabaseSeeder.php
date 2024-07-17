<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        try {
            DB::beginTransaction();

            $this->call([
                UsuarioSeeder::class,
                PerfilSeeder::class,
                UsuarioPerfilSeeder::class,
                EstadoSeeder::class,
                MunicipioSeeder::class,
                PacienteSeeder::class
            ]);

            DB::commit();
        } catch (\Exception  $e) {
            DB::rollback();

            throw $e;
        }
    }
}
