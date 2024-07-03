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

    <div class="row mb-3">
        <div class="col-md-2 offset-md-10">
            <button
                type="button"
                class="btn btn-lila btn-block text-uppercase font-weight-bold"
                data-toggle="modal"
                data-target="#cliente-data-modal-{{ $cliente->id }}-store"
            >
                <i class="fas fa-plus-circle"></i> Data
            </button>

            @push('modals')
                @includeIf('admin.clientes.partials.cliente-data-modal-store', $cliente)
            @endpush
        </div>
    </div>

    <x-admin.table
        title="Cliente"
        subtitle="Datas"
        :headers="['Nome', 'Data', 'Observação', 'Ações']"
        :records="$cliente->datas"
    >
        @forelse ($cliente->datas as $clienteData)
            <tr class="text-center">
                <td class="align-middle">{{ $clienteData->nome }}</td>
                <td class="align-middle">{{ $clienteData->data }}</td>
                <td class="align-middle">{{ $clienteData->observacao }}</td>
                <td class="align-middle text-uppercase">
                    <button
                        type="button"
                        class="btn btn-danger text-uppercase font-weight-bold"
                        data-toggle="modal"
                        data-target="#cliente-data-modal-{{ $clienteData->id }}-destroy"
                    >
                        <i class="fas fa-trash"></i> Deletar
                    </button>

                    @push('modals')
                        @includeIf('admin.clientes.partials.cliente-data-modal-destroy', [
                            $cliente,
                            $clienteData
                        ])
                    @endpush
                </td>
            </tr>
        @empty
        @endforelse
    </x-admin.table>
</x-app-layout>
