<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Produto\StoreProdutoRequest;
use App\Models\Produto;
use App\Repositories\ProdutoRepository;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function __construct(
        private ProdutoRepository $produtoRepository
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $produtos = $this->produtoRepository->paginate(10, 'nome', 'ASC', $request->except(['_token', 'page']));

        return view('admin.produtos.index', [
            'produtos' => $produtos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdutoRequest $request)
    {
        $result = $this->produtoRepository->store($request->except(['_token']));

        if ($result === true) {
            $request->session()->flash('success', 'Produto cadastrado com sucesso!');
        } else {
            $request->session()->flash('danger', 'Erro ao cadastrar o produto. '.$result);
        }

        return redirect()->route('admin.produtos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        return view('admin.produtos.show', [
            'produto' => $produto
        ]);
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
