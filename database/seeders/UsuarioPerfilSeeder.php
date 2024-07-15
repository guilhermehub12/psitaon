<?php

namespace Database\Seeders;

use App\Enums\PerfilEnum;
use App\Models\UsuarioPerfil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioPerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuario = DB::table('usuarios')->where('email', 'guilhermedelmiro11@gmail.com')->get()->first();
        $perfil = DB::table('perfis')->where('codigo', PerfilEnum::ADMINISTRADOR->value)->get()->first();

        $usuarioPerfilSeeder = new UsuarioPerfil();
        $usuarioPerfilSeeder->usuario_id = $usuario->id;
        $usuarioPerfilSeeder->perfil_id = $perfil->id;
        $usuarioPerfilSeeder->created_by = $usuario->id;
        $usuarioPerfilSeeder->updated_by = $usuario->id;
        $usuarioPerfilSeeder->save();
    }
}
