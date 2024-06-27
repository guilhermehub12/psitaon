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
        :headers="['Nome', 'E-mail', 'Ações']"
        :records="$clientes"
    >
        @forelse ($clientes as $cliente)
            <tr class="text-center">
                <td class="align-middle">{{ $cliente->nome }}</td>
                <td class="align-middle">
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
                            <a href="{{  route('admin.clientes.edit', $cliente) }}" class="dropdown-item">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
        @empty
        @endforelse
    </x-admin.table>
</x-app-layout>
