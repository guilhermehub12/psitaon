<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb
            icon="fas fa-box"
            title="Produtos"
            :links="[
                'Produtos',
                'Novo Tamanho '
            ]"
        />
    </x-slot>

    @includeIf('admin.produtos_tamanhos.partials.produto', [
        "produto" => $produto
    ])

    @includeIf('admin.produtos_tamanhos.partials.form', [
        "title" => "Tamanho",
        "subtitle" => "Novo",
        "action" => route('admin.produtos.tamanhos.store', $produto),
        "method" => "POST",
        "routeBack" => route('admin.produtos.index'),
        "buttonText" => "Salvar",
        "produtoTamanho" => null
    ])

    <x-admin.table
        title="Produto"
        subtitle="Tamanhos"
        :headers="['Nome', 'Descrição', 'Observação', 'Ações']"
        :records="$produto->tamanhos"
    >
        @forelse ($produto->tamanhos as $produtoTamanho)
            <tr class="text-center">
                <td class="align-middle">{{ $produtoTamanho->nome }}</td>
                <td class="align-middle">{{ $produtoTamanho->descricao }}</td>
                <td class="align-middle">{{ $produtoTamanho->observacao }}</td>
                <td class="align-middle text-uppercase">
                    <button
                        type="button"
                        class="btn btn-danger text-uppercase font-weight-bold"
                        data-toggle="modal"
                        data-target="#produto-tamanho-modal-{{ $produtoTamanho->id }}-destroy"
                    >
                        <i class="fas fa-trash"></i> Deletar
                    </button>

                    @push('modals')
                        @includeIf('admin.clientes.partials.produto-tamanho-modal-destroy', [
                            $produto,
                            $produtoTamanho
                        ])
                    @endpush
                </td>
            </tr>
        @empty
        @endforelse
    </x-admin.table>
</x-app-layout>
