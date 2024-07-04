<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb icon="fas fa-box" title="Produtos" />
    </x-slot>

    <div class="row mb-3">
        <div class="col-md-2 offset-md-10">
            <a href="{{ route('admin.produtos.create') }}" class="btn btn-lila btn-block text-uppercase font-weight-bold">
                <i class="fas fa-plus-circle"></i> Produto
            </a>
        </div>
    </div>

    <x-admin.table
        title="Produtos"
        subtitle="Listagem"
        :headers="['Nome', 'Descrição', 'Ações']"
        :records="$produtos"
    >
        @forelse ($produtos as $produto)
            <tr class="text-center">
                <td class="align-middle">{{ $produto->nome }}</td>
                <td class="align-middle">{{ $produto->descricao }}</td>
                <td class="align-middle text-uppercase">
                    <div class="dropdown dropright">
                        <button
                            id="dropdown-{{ $produto->id }}"
                            class="btn btn-lila dropdown-toggle"
                            type="button"
                            data-toggle="dropdown"
                            aria-expanded="false"
                        >
                            <i class="fas fa-cog"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdown-{{ $produto->id }}">
                            <a
                                href="#"
                                class="dropdown-item"
                                data-toggle="modal"
                                data-target="#produto-modal-{{ $produto->id }}-show"
                            >
                                <i class="fas fa-window-restore"></i> Visualizar
                            </a>

                            @push('modals')
                                @includeIf('admin.produtos.partials.cliente-modal-show', $produto)
                            @endpush

                            <a href="{{  route('admin.produtos.tamanhos.create', $produto) }}" class="dropdown-item">
                                <i class="fas fa-plus-circle"></i> Tamanhos
                            </a>

                            <a href="{{  route('admin.produtos.edit', $produto) }}" class="dropdown-item">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <a href="{{  route('admin.produtos.show', $produto) }}" class="dropdown-item">
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
