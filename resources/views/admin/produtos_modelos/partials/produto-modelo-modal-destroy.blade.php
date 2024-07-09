<x-admin.modal-destroy
    title="Tamanho"
    subtitle="Deletar"
    target="produto-modelo-modal-{{ $produtoModelo->id }}-destroy"
    :action="route('admin.produtos.tamanhos.destroy', ['produto' => $produto, 'produtoModelo' => $produtoModelo])"
    size="lg"
>
    <div class="row">
        <div class="col-md-12 text-center text-danger">
            <h5>Deseja apagar o modelo abaixo?</h5>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <p class="font-weight-bold">Nome</p>
            {{ $produtoModelo->nome }}
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <p class="font-weight-bold">Descrição Resumida</p>
            {{ $produtoModelo->descricao_resumida }}
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <p class="font-weight-bold">Descrição Completa</p>
            {{ $produtoModelo->descricao_completa }}
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <p class="font-weight-bold">Preço</p>
            R$ {{ $produtoModelo->preco }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p class="font-weight-bold">Observação</p>
            {{ $produtoModelo->observacao ?? 'Nenhuma observação' }}
        </div>
    </div>
</x-admin.modal-destroy>


