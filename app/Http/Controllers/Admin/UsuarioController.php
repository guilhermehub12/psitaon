<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Usuario\StoreUsuarioRequest;
use App\Repositories\PerfilRepository;
use App\Repositories\UsuarioRepository;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function __construct(
        private UsuarioRepository $usuarioRepository,
        private PerfilRepository $perfilRepository
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $usuarios = $this->usuarioRepository->paginate(10, 'nome', 'ASC', $request->except(['_token', 'page']));

        return view('admin.usuarios.index', [
            'usuarios' => $usuarios
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.usuarios.create', [
            'perfis' => $this->perfilRepository->selectOption()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsuarioRequest $request)
    {
        // $result = $this->usuarioRepository->store($request->except(['_token']));
        $result = true;

        if ($result === true) {
            $request->session()->flash('success', 'Usuário cadastrado com sucesso!');
        } else {
            $request->session()->flash('error', 'Erro ao cadastrar o usuário. '.$result);
        }

        return redirect()->route('admin.usuarios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
