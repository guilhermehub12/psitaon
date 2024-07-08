<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ClienteRepository;
use App\Repositories\ProdutoRepository;
use App\Repositories\UsuarioRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(
        private ClienteRepository $clienteRepository,
        private UsuarioRepository $usuarioRepository,
        private ProdutoRepository $produtoRepository,
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.home.index', [
            'clientes' => $this->clienteRepository->dashboard(),
            'usuarios' => $this->usuarioRepository->dashboard(),
            'produtos' => $this->produtoRepository->dashboard(),
        ]);
    }
}
