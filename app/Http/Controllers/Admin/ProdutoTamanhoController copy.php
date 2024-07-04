<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProdutoTamanho\StoreProdutoTamanhoRequest;
use App\Models\Produto;
use App\Models\ProdutoTamanho;
use App\Repositories\ProdutoTamanhoRepository;
use Illuminate\Http\Request;

class ProdutoTamanhoController extends Controller
{
    public function __construct(
        private ProdutoTamanhoRepository $produtoTamanhoRepository
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
        return view('admin.produtos_tamanhos.create', [
            'produto' => $produto
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdutoTamanhoRequest $request, Produto $produto)
    {
        $result = $this->produtoTamanhoRepository->store($produto, $request->except(['_token']));

        if ($result === true) {
            $request->session()->flash('success', 'Tamanho do produto cadastrado com sucesso!');
        } else {
            $request->session()->flash('danger', 'Erro ao cadastrar o tamanho do produto. '.$result);
        }

        return redirect()->route('admin.produtos.tamanhos.create', $produto);
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
    public function destroy(Request $request, Produto $produto, ProdutoTamanho $produtoTamanho)
    {
        $result = $this->produtoTamanhoRepository->destroy($produtoTamanho);

        if ($result === true) {
            $request->session()->flash('success', 'Tamanho deletado com sucesso!');
        } else {
            $request->session()->flash('danger', 'Erro ao deletar o tamanho. '.$result);
        }

        return redirect()->route('admin.produtos.tamanhos.create', $produto);
    }
}
