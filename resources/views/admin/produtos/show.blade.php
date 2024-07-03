<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb
            icon="fas fa-box"
            title="Produtos"
            :links="[
                'Produtos',
                'Produto Detalhe'
            ]"
        />
    </x-slot>

    @includeIf('admin.produtos.partials.produto', [
        "produto" => $produto
    ])
</x-app-layout>
