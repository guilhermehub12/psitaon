<x-app-layout>
    <x-admin.breadcrumb icon="fas fa-map" title="Estados" />

    <div class="row mb-3">
        <div class="col-md-2 offset-md-10">
            <a href="{{  route('admin.estados.create') }}" class="btn btn-lila btn-block text-uppercase font-weight-bold">
                <i class="fas fa-plus-circle"></i> Estado
            </a>
        </div>
    </div>

    <x-admin.table
        title="Estados"
        subtitle="Listagem"
        :headers="['Nome', 'Sigla']"
        :records="$estados"
    >
        @forelse ($estados as $estado)
            <tr class="text-center">
                <td class="align-middle">{{ $estado->nome }}</td>
                <td class="align-middle">{{ $estado->sigla }}</td>
            </tr>
        @empty
        @endforelse
    </x-admin.table>
</x-app-layout>
