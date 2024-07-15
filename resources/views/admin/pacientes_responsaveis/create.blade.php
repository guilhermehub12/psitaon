<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb
            icon="fas fa-box"
            title="Produtos"
            :links="[
                'Produtos',
                'Novo Adicional'
            ]"
        />
    </x-slot>

    @includeIf('admin.produtos_adicionais.partials.produto', [
        "produto" => $produto,
        "route" => route('admin.produtos.show', $produto)
    ])

    @includeIf('admin.produtos_adicionais.partials.form', [
        "title" => "Adicional",
        "subtitle" => "Novo",
        "action" => route('admin.produtos.adicionais.store', $produto),
        "method" => "POST",
        "routeBack" => route('admin.produtos.index'),
        "buttonText" => "Salvar",
        "produtoAdicional" => null
    ])
    
    <x-admin.table
        title="Produto"
        subtitle="Adicionais"
        :headers="['Nome', 'Descrição Resumida', 'Preço', 'Observação', 'Ações']"
        :records="$produto->adicionais"
    >
        @forelse ($produto->adicionais as $produtoAdicional)
            <tr class="text-center">
                <td class="align-middle">{{ $produtoAdicional->nome }}</td>
                <td class="align-middle">{{ $produtoAdicional->descricao_resumida }}</td>
                <td class="align-middle">R$ {{ $produtoAdicional->preco }}</td>
                <td class="align-middle">{{ $produtoAdicional->observacao }}</td>
                <td class="align-middle text-uppercase">
                    <button
                        type="button"
                        class="btn btn-danger text-uppercase font-weight-bold"
                        data-toggle="modal"
                        data-target="#produto-adicional-modal-{{ $produtoAdicional->id }}-destroy"
                    >
                        <i class="fas fa-trash"></i> Deletar
                    </button>

                    @push('modals')
                        @includeIf('admin.produtos_adicionais.partials.produto-adicional-modal-destroy', [
                            $produto,
                            $produtoAdicional
                        ])
                    @endpush
                </td>
            </tr>
        @empty
        @endforelse
    </x-admin.table>
</x-app-layout>
