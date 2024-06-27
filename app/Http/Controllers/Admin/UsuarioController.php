<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Usuario\StoreUsuarioRequest;
use App\Http\Requests\Admin\Usuario\UpdateUsuarioRequest;
use App\Models\Usuario;
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
        $result = $this->usuarioRepository->store($request->except(['_token']));

        if ($result === true) {
            $request->session()->flash('success', 'Usuário cadastrado com sucesso!');
        } else {
            $request->session()->flash('danger', 'Erro ao cadastrar o usuário. '.$result);
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
    public function edit(Usuario $usuario)
    {
        return view('admin.usuarios.edit', [
            'usuario' => $usuario,
            'perfis' => $this->perfilRepository->selectOption()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsuarioRequest $request, Usuario $usuario)
    {
        $result = $this->usuarioRepository->update($usuario, $request->except(['_token']));

        if ($result === true) {
            $request->session()->flash('success', 'Usuário atualizado com sucesso!');
            return redirect()->route('admin.usuarios.index');
        } else {
            $request->session()->flash('danger', 'Erro ao atualizar o usuário. '.$result);
            return redirect()->route('admin.usuarios.edit', $usuario);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
