<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = DB::table('usuarios')->where('email', 'leandroalvesmachado@gmail.com')->get()->first();

        $produtos = [
            [
                'nome' => 'Bolo',
                'descricao' => 'Bolo'
            ],
            [
                'nome' => 'Docinho',
                'descricao' => 'Docinho'
            ],
        ];

        foreach ($produtos as $produto) {
            $produtoSeeder = new Produto($produto);
            $produtoSeeder->created_by = $admin->id;
            $produtoSeeder->updated_by = $admin->id;
            $produtoSeeder->save();
        }
    }
}
