<?php

namespace Database\Seeders;

use App\Models\Municipio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = DB::table('usuarios')->where('email', 'guilhermedelmiro11@gmail.com')->get()->first();
        $estado = DB::table('estados')->where('sigla', 'CE')->get()->first();

        $municipios = [
            ['estado_id' => $estado->id, 'nome' => 'Fortaleza']
        ];

        foreach ($municipios as $municipio) {
            $municipioSeeder = new Municipio($municipio);
            $municipioSeeder->created_by = $admin->id;
            $municipioSeeder->updated_by = $admin->id;
            $municipioSeeder->save();
        }
    }
}
