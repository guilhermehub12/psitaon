<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb icon="fas fa-gift" title="Pedidos" />
    </x-slot>

    <div class="row mb-3">
        <div class="col-md-2 offset-md-10">
            <a href="{{ route('admin.pedidos.create') }}" class="btn btn-lila btn-block text-uppercase font-weight-bold">
                <i class="fas fa-plus-circle"></i> Pedido
            </a>
        </div>
    </div>

    <x-admin.table
        title="Pedidos"
        subtitle="Listagem"
        :headers="['Nome', 'Descrição', 'Ações']"
        :records="$pedidos"
    >
        @forelse ($pedidos as $pedido)
            <tr class="text-center">
            </tr>
        @empty
        @endforelse
    </x-admin.table>
</x-app-layout>
