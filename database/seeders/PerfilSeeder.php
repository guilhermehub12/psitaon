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
                'nome' => 'Atendimento',
                'descricao' => 'Cadastrar clientes, cadastrar pedidos e dar entrada no sistema de controle de estoque'
            ],
            [
                'codigo' => 3,
                'nome' => 'Cozinha',
                'descricao' => 'Visualizar os pedidos, por dia, e dar baixa dos pedidos conforme finalização na cozinha'
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
