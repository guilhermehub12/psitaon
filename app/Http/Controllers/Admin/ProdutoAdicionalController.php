<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProdutoAdicional\StoreProdutoAdicionalRequest;
use App\Models\Produto;
use App\Models\ProdutoAdicional;
use App\Repositories\ProdutoAdicionalRepository;
use Illuminate\Http\Request;

class ProdutoAdicionalController extends Controller
{
    public function __construct(
        private ProdutoAdicionalRepository $produtoAdicionalRepository
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
    public function create(Produto $produto)
    {
        return view('admin.produtos_adicionais.create', [
            'produto' => $produto
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdutoAdicionalRequest $request, Produto $produto)
    {
        $result = $this->produtoAdicionalRepository->store($produto, $request->except(['_token']));

        if ($result === true) {
            $request->session()->flash('success', 'Adicional do produto cadastrado com sucesso!');
        } else {
            $request->session()->flash('danger', 'Erro ao cadastrar o adicional do produto. '.$result);
        }

        return redirect()->route('admin.produtos.adicionais.create', $produto);
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
    public function destroy(Request $request, Produto $produto, ProdutoAdicional $produtoAdicional)
    {
        $result = $this->produtoAdicionalRepository->destroy($produtoAdicional);

        if ($result === true) {
            $request->session()->flash('success', 'Adicional deletado com sucesso!');
        } else {
            $request->session()->flash('danger', 'Erro ao deletar o adicional. '.$result);
        }

        return redirect()->route('admin.produtos.adicionais.create', $produto);
    }
}
