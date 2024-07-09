<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProdutoModelo\StoreProdutoModeloRequest;
use App\Models\Produto;
use App\Models\ProdutoModelo;
use App\Repositories\ProdutoModeloRepository;
use Illuminate\Http\Request;

class ProdutoModeloController extends Controller
{
    public function __construct(
        private ProdutoModeloRepository $produtoModeloRepository
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
        return view('admin.produtos_modelos.create', [
            'produto' => $produto
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdutoModeloRequest $request, Produto $produto)
    {
        $result = $this->produtoModeloRepository->store($produto, $request->except(['_token']));

        if ($result === true) {
            $request->session()->flash('success', 'Modelo do produto cadastrado com sucesso!');
        } else {
            $request->session()->flash('danger', 'Erro ao cadastrar o modelo do produto. '.$result);
        }

        return redirect()->route('admin.produtos.modelos.create', $produto);
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
    public function destroy(Request $request, Produto $produto, ProdutoModelo $produtoModelo)
    {
        $result = $this->produtoModeloRepository->destroy($produtoModelo);

        if ($result === true) {
            $request->session()->flash('success', 'Modelo deletado com sucesso!');
        } else {
            $request->session()->flash('danger', 'Erro ao deletar o modelo. '.$result);
        }

        return redirect()->route('admin.produtos.modelos.create', $produto);
    }
}
