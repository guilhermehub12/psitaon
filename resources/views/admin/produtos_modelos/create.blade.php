<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb
            icon="fas fa-box"
            title="Produtos"
            :links="[
                'Produtos',
                'Novo Modelo '
            ]"
        />
    </x-slot>

    @includeIf('admin.produtos_modelos.partials.produto', [
        "produto" => $produto,
        "route" => route('admin.produtos.show', $produto)
    ])

    @includeIf('admin.produtos_modelos.partials.form', [
        "title" => "Modelo",
        "subtitle" => "Novo",
        "action" => route('admin.produtos.modelos.store', $produto),
        "method" => "POST",
        "routeBack" => route('admin.produtos.show', $produto),
        "buttonText" => "Salvar",
        "produtoModelo" => null
    ])

    <x-admin.table
        title="Produto"
        subtitle="Modelos"
        :headers="['Nome', 'Descrição', 'Preço', 'Observação', 'Ações']"
        :records="$produto->modelos"
    >
        @forelse ($produto->modelos as $produtoModelo)
            <tr class="text-center">
                <td class="align-middle">{{ $produtoModelo->nome }}</td>
                <td class="align-middle">{{ $produtoModelo->descricao }}</td>
                <td class="align-middle">R$ {{ $produtoModelo->preco }}</td>
                <td class="align-middle">{{ $produtoModelo->observacao }}</td>
                <td class="align-middle text-uppercase">
                    <button
                        type="button"
                        class="btn btn-danger text-uppercase font-weight-bold"
                        data-toggle="modal"
                        data-target="#produto-modelo-modal-{{ $produtoModelo->id }}-destroy"
                    >
                        <i class="fas fa-trash"></i> Deletar
                    </button>

                    @push('modals')
                        @includeIf('admin.produtos_modelos.partials.produto-modelo-modal-destroy', [
                            $produto,
                            $produtoModelo
                        ])
                    @endpush
                </td>
            </tr>
        @empty
        @endforelse
    </x-admin.table>
</x-app-layout>
