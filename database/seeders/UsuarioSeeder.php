<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = [
            [
                'nome' => 'Guilherme Delmiro',
                'email' => 'guilhermedelmiro11@gmail.com',
                'senha' => 'P@ssword',
                'email_verified_at' => Carbon::now()
            ],
        ];

        foreach ($usuarios as $usuario) {
            $usuarioSeeder = new Usuario($usuario);
            $usuarioSeeder->save();
        }
    }
}
