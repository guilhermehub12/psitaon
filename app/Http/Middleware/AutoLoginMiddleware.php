<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use App\Models\Perfil;
use App\Models\UsuarioPerfil;
use Illuminate\Support\Str;

class AutoLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            // Criar usuário administrador se não existir
            $usuario = Usuario::firstOrCreate(
                ['email' => 'admin@admin.com'],
                [
                    'id' => Str::uuid(),
                    'nome' => 'Administrador',
                    'email' => 'admin@admin.com',
                    'senha' => bcrypt('123456'),
                    'ativo' => true,
                ]
            );

            // Criar perfil administrador se não existir
            $perfil = Perfil::firstOrCreate(
                ['codigo' => 1],
                [
                    'id' => Str::uuid(),
                    'codigo' => 1,
                    'nome' => 'Administrador',
                    'descricao' => 'Perfil de Administrador do Sistema',
                    'ativo' => true,
                    'created_by' => $usuario->id,
                    'updated_by' => $usuario->id
                ]
            );

            // Vincular usuário ao perfil se ainda não estiver vinculado
            UsuarioPerfil::firstOrCreate(
                [
                    'usuario_id' => $usuario->id,
                    'perfil_id' => $perfil->id
                ],
                [
                    'id' => Str::uuid(),
                    'usuario_id' => $usuario->id,
                    'perfil_id' => $perfil->id,
                    'ativo' => true,
                    'created_by' => $usuario->id,
                    'updated_by' => $usuario->id
                ]
            );

            // Fazer login do usuário
            Auth::login($usuario);
        }

        return $next($request);
    }

}
