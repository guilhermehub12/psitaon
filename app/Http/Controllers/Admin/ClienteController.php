<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Cliente\StoreClienteRequest;
use App\Http\Requests\Admin\Cliente\UpdateClienteRequest;
use App\Models\Cliente;
use App\Repositories\ClienteRepository;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function __construct(
        private ClienteRepository $clienteRepository
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $clientes = $this->clienteRepository->paginate(10, 'nome', 'ASC', $request->except(['_token', 'page']));

        return view('admin.clientes.index', [
            'clientes' => $clientes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClienteRequest $request)
    {
        $result = $this->clienteRepository->store($request->except(['_token']));

        if ($result === true) {
            $request->session()->flash('success', 'Cliente cadastrado com sucesso!');
        } else {
            $request->session()->flash('danger', 'Erro ao cadastrar o cliente. '.$result);
        }

        return redirect()->route('admin.clientes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        return view('admin.clientes.show', [
            'cliente' => $cliente
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('admin.clientes.edit', [
            'cliente' => $cliente
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        $result = $this->clienteRepository->update($cliente, $request->except(['_token']));

        if ($result === true) {
            $request->session()->flash('success', 'Cliente atualizado com sucesso!');
            return redirect()->route('admin.clientes.index');
        } else {
            $request->session()->flash('danger', 'Erro ao cadastrar o cliente. '.$result);
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
