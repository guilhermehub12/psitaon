<x-admin.modal-destroy
    title="Data"
    subtitle="Deletar"
    target="cliente-data-modal-{{ $clienteData->id }}-destroy"
    :action="route('admin.clientes.datas.destroy', ['cliente' => $cliente, 'clienteData' => $clienteData])"
    size="lg"
>
    <div class="row">
        <div class="col-md-12 text-center text-danger">
            <h5>Deseja apagar a data abaixo?</h5>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <p class="font-weight-bold">Nome</p>
            {{ $clienteData->nome }}
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <p class="font-weight-bold">Data</p>
            {{ $clienteData->data }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p class="font-weight-bold">Observação</p>
            {{ $clienteData->observacao ?? 'Nenhuma observação' }}
        </div>
    </div>
</x-admin.modal-destroy>


