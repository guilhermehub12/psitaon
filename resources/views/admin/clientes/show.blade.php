<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb
            icon="fas fa-restroom"
            title="Clientes"
            :links="[
                'Clientes',
                'Cliente Detalhe'
            ]"
        />
    </x-slot>

    @includeIf('admin.clientes.partials.cliente', [
        "cliente" => $cliente
    ])

    <div class="row">
        <div class="col-12">
            <div class="card h-100">
                <div class="card-header">
                  <h3 class="card-title font-weight-bold text-uppercase">
                    Cliente <span class="badge badge-secondary">Datas</span>
                  </h3>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-2 offset-md-10">
                            <button
                                type="button"
                                class="btn btn-lila btn-block text-uppercase font-weight-bold"
                                data-toggle="modal"
                                data-target="#cliente-data-modal-{{ $cliente->id }}-create"
                            >
                                <i class="fas fa-plus-circle"></i> Data
                            </button>

                            @push('modals')
                                @includeIf('admin.clientes.datas.cliente_data_modal_create', $cliente)
                            @endpush
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-top">
                </div>
              </div>
        </div>
    </div>
</x-app-layout>
