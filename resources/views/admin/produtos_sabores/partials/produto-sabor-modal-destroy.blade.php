<x-admin.modal-destroy
    title="Tamanho"
    subtitle="Deletar"
    target="produto-sabor-modal-{{ $produtoSabor->id }}-destroy"
    :action="route('admin.produtos.sabores.destroy', ['produto' => $produto, 'produtoSabor' => $produtoSabor])"
    size="lg"
>
    <div class="row">
        <div class="col-md-12 text-center text-danger">
            <h5>Deseja apagar o sabor abaixo?</h5>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <p class="font-weight-bold">Nome</p>
            {{ $produtoSabor->nome }}
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <p class="font-weight-bold">Descrição</p>
            {{ $produtoSabor->descricao }}
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <p class="font-weight-bold">Preço</p>
            R$ {{ $produtoSabor->preco }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p class="font-weight-bold">Observação</p>
            {{ $produtoSabor->observacao ?? 'Nenhuma observação' }}
        </div>
    </div>
</x-admin.modal-destroy>


