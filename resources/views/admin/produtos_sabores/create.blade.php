<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb
            icon="fas fa-box"
            title="Produtos"
            :links="[
                'Produtos',
                'Novo Sabor'
            ]"
        />
    </x-slot>

    @includeIf('admin.produtos_sabores.partials.produto', [
        "produto" => $produto,
        "route" => route('admin.produtos.show', $produto)
    ])

    @includeIf('admin.produtos_sabores.partials.form', [
        "title" => "Sabor",
        "subtitle" => "Novo",
        "action" => route('admin.produtos.sabores.store', $produto),
        "method" => "POST",
        "routeBack" => route('admin.produtos.index'),
        "buttonText" => "Salvar",
        "produtoSabor" => null
    ])

    <x-admin.table
        title="Produto"
        subtitle="Sabores"
        :headers="['Nome', 'Descrição', 'Preço', 'Observação', 'Ações']"
        :records="$produto->sabores"
    >
        @forelse ($produto->sabores as $produtoSabor)
            <tr class="text-center">
                <td class="align-middle">{{ $produtoSabor->nome }}</td>
                <td class="align-middle">{{ $produtoSabor->descricao }}</td>
                <td class="align-middle">R$ {{ $produtoSabor->preco }}</td>
                <td class="align-middle">{{ $produtoSabor->observacao }}</td>
                <td class="align-middle text-uppercase">
                    <button
                        type="button"
                        class="btn btn-danger text-uppercase font-weight-bold"
                        data-toggle="modal"
                        data-target="#produto-sabor-modal-{{ $produtoSabor->id }}-destroy"
                    >
                        <i class="fas fa-trash"></i> Deletar
                    </button>

                    @push('modals')
                        @includeIf('admin.produtos_sabores.partials.produto-sabor-modal-destroy', [
                            $produto,
                            $produtoSabor
                        ])
                    @endpush
                </td>
            </tr>
        @empty
        @endforelse
    </x-admin.table>
</x-app-layout>
