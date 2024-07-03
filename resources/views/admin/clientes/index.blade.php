<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb icon="fas fa-restroom" title="Clientes" />
    </x-slot>

    <div class="row mb-3">
        <div class="col-md-2 offset-md-10">
            <a href="{{  route('admin.clientes.create') }}" class="btn btn-lila btn-block text-uppercase font-weight-bold">
                <i class="fas fa-plus-circle"></i> Cliente
            </a>
        </div>
    </div>

    <x-admin.table
        title="Clientes"
        subtitle="Listagem"
        :headers="['Nome', 'E-mail', 'Data Nascimento', 'Telefone', 'Celular', 'Instagram', 'Ações']"
        :records="$clientes"
    >
        @forelse ($clientes as $cliente)
            <tr class="text-center">
                <td class="align-middle">{{ $cliente->nome }}</td>
                <td class="align-middle">{{ $cliente->email }}</td>
                <td class="align-middle">{{ $cliente->data_nascimento }}</td>
                <td class="align-middle">{{ $cliente->telefone }}</td>
                <td class="align-middle">{{ $cliente->celular }}</td>
                <td class="align-middle">{{ $cliente->instagram }}</td>
                <td class="align-middle text-uppercase">
                    <div class="dropdown dropright">
                        <button
                            id="dropdown-{{ $cliente->id }}"
                            class="btn btn-lila dropdown-toggle"
                            type="button"
                            data-toggle="dropdown"
                            aria-expanded="false"
                        >
                            <i class="fas fa-cog"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdown-{{ $cliente->id }}">
                            <a
                                href="#"
                                class="dropdown-item"
                                data-toggle="modal"
                                data-target="#cliente-modal-{{ $cliente->id }}-show"
                            >
                                <i class="fas fa-window-restore"></i> Visualizar
                            </a>

                            @push('modals')
                                @includeIf('admin.clientes.partials.cliente-modal-show', $cliente)
                            @endpush

                            <a href="{{  route('admin.clientes.edit', $cliente) }}" class="dropdown-item">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <a href="{{  route('admin.clientes.show', $cliente) }}" class="dropdown-item">
                                <i class="fas fa-info-circle"></i> Detalhes
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
        @empty
        @endforelse
    </x-admin.table>
</x-app-layout>
