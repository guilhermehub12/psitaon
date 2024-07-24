<?php

namespace Database\Seeders;

use App\Models\Perfil;
use App\Models\TipoResponsavel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoResponsavelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = DB::table('usuarios')->where('email', 'guilhermedelmiro11@gmail.com')->get()->first();

        $tipos_responsaveis = [
            [
                'codigo' => 1,
                'nome' => 'Financeiro',
                'descricao' => 'Quem irá cuidar da minha parte financeira das consultas'
            ],
            [
                'codigo' => 2,
                'nome' => 'Cuidador',
                'descricao' => 'Cuidador'
            ],
            [
                'codigo' => 3,
                'nome' => 'Família',
                'descricao' => 'Família'
            ],
            [
                'codigo' => 4,
                'nome' => 'Amigos',
                'descricao' => 'Amigos'
            ],
            [
                'codigo' => 5,
                'nome' => 'Grupos',
                'descricao' => 'Grupos'
            ],
            [
                'codigo' => 6,
                'nome' => 'Mora com',
                'descricao' => 'Mora com'
            ],
            [
                'codigo' => 7,
                'nome' => 'Dependentes',
                'descricao' => 'Dependentes'
            ]
        ];

        foreach ($tipos_responsaveis as $tipo_responsavel) {
            $tipoResponsavelSeeder = new TipoResponsavel($tipo_responsavel);
            $tipoResponsavelSeeder->created_by = $admin->id;
            $tipoResponsavelSeeder->updated_by = $admin->id;
            $tipoResponsavelSeeder->save();
        }

    }
}
