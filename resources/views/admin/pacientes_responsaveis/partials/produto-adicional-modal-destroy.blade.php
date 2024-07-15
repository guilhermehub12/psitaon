<x-admin.modal-destroy
    title="Tamanho"
    subtitle="Deletar"
    target="produto-adicional-modal-{{ $produtoAdicional->id }}-destroy"
    :action="route('admin.produtos.adicionais.destroy', ['produto' => $produto, 'produtoAdicional' => $produtoAdicional])"
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
            {{ $produtoAdicional->nome }}
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <p class="font-weight-bold">Descrição Resumida</p>
            {{ $produtoAdicional->descricao_resumida }}
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <p class="font-weight-bold">Descrição Completa</p>
            {{ $produtoAdicional->descricao_completa }}
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <p class="font-weight-bold">Preço</p>
            R$ {{ $produtoAdicional->preco }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p class="font-weight-bold">Observação</p>
            {{ $produtoAdicional->observacao ?? 'Nenhuma observação' }}
        </div>
    </div>
</x-admin.modal-destroy>


