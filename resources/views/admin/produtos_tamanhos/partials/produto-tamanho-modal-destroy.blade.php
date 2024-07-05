<x-admin.modal-destroy
    title="Tamanho"
    subtitle="Deletar"
    target="produto-tamanho-modal-{{ $produtoTamanho->id }}-destroy"
    :action="route('admin.produtos.tamanhos.destroy', ['produto' => $produto, 'produtoTamanho' => $produtoTamanho])"
    size="lg"
>
    <div class="row">
        <div class="col-md-12 text-center text-danger">
            <h5>Deseja apagar o tamanho abaixo?</h5>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <p class="font-weight-bold">Nome</p>
            {{ $produtoTamanho->nome }}
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <p class="font-weight-bold">Descrição</p>
            {{ $produtoTamanho->descricao }}
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <p class="font-weight-bold">Preço</p>
            R$ {{ $produtoTamanho->preco }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p class="font-weight-bold">Observação</p>
            {{ $produtoTamanho->observacao ?? 'Nenhuma observação' }}
        </div>
    </div>
</x-admin.modal-destroy>


