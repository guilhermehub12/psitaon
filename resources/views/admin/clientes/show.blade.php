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
        <div class="col-4">
            <div class="card h-100">
                <div class="card-header">
                  <h3 class="card-title font-weight-bold text-uppercase">
                    Cliente <span class="badge badge-secondary">Datas</span>
                  </h3>
                </div>
                <div class="card-body">

                </div>
                <div class="card-footer bg-transparent border-top">

                </div>
              </div>
        </div>
    </div>
</x-app-layout>
