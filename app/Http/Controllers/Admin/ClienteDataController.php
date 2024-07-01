<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Repositories\ClienteDataRepository;
use Illuminate\Http\Request;

class ClienteDataController extends Controller
{
    public function __construct(
        private ClienteDataRepository $clienteDataRepository
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Cliente $cliente)
    {
        return view('admin.clientes.datas.create', [
            'cliente' => $cliente
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClienteDataRequest $request, Cliente $cliente)
    {
        $result = $this->clienteDataRepository->store($cliente, $request->except(['_token']));

        if ($result === true) {
            $request->session()->flash('success', 'Data cadastrada com sucesso!');
        } else {
            $request->session()->flash('danger', 'Erro ao cadastrar a data. '.$result);
        }

        return redirect()->route('admin.clientes.show', $cliente);
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
