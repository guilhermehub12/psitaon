<x-admin.modal
    title="Tamanho"
    subtitle="Deletar"
    target="produto-modal-{{ $produto->id }}-show"
>
    <div class="row">
        <div class="col-md-12">
            <strong class="font-weight-bold text-danger">Nome:</strong>
            <p>{{ $produto->nome }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <strong class="font-weight-bold text-danger">Descrição:</strong>
            <p>{{ $produto->descricao }}</p>
        </div>
    </div>
</x-admin.modal>

