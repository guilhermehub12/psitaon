<?php

namespace Database\Seeders;

use App\Models\Perfil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = DB::table('usuarios')->where('email', 'leandroalvesmachado@gmail.com')->get()->first();

        $perfis = [
            [
                'codigo' => 1,
                'nome' => 'Administrador',
                'descricao' => 'Administrador do Sistema'
            ],
            [
                'codigo' => 2,
                'nome' => 'Psicológa',
                'descricao' => 'Cadastrar pacientes, configurar consultas...'
            ],
            [
                'codigo' => 3,
                'nome' => 'Paciente',
                'descricao' => 'Visualizar as consultas, os custos...'
            ]
        ];

        foreach ($perfis as $perfil) {
            $perfilSeeder = new Perfil($perfil);
            $perfilSeeder->created_by = $admin->id;
            $perfilSeeder->updated_by = $admin->id;
            $perfilSeeder->save();
        }

    }
}
