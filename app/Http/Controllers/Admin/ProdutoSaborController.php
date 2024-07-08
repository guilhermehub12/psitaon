<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProdutoSabor\StoreProdutoSaborRequest;
use App\Models\Produto;
use App\Models\ProdutoSabor;
use App\Repositories\ProdutoSaborRepository;
use Illuminate\Http\Request;

class ProdutoSaborController extends Controller
{
    public function __construct(
        private ProdutoSaborRepository $produtoSaborRepository
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
        return view('admin.produtos_sabores.create', [
            'produto' => $produto
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdutoSaborRequest $request, Produto $produto)
    {
        $result = $this->produtoSaborRepository->store($produto, $request->except(['_token']));

        if ($result === true) {
            $request->session()->flash('success', 'Sabor do produto cadastrado com sucesso!');
        } else {
            $request->session()->flash('danger', 'Erro ao cadastrar o sabor do produto. '.$result);
        }

        return redirect()->route('admin.produtos.sabores.create', $produto);
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
    public function destroy(Request $request, Produto $produto, ProdutoSabor $produtoSabor)
    {
        $result = $this->produtoSaborRepository->destroy($produtoSabor);

        if ($result === true) {
            $request->session()->flash('success', 'Tamanho deletado com sucesso!');
        } else {
            $request->session()->flash('danger', 'Erro ao deletar o tamanho. '.$result);
        }

        return redirect()->route('admin.produtos.sabores.create', $produto);
    }
}
