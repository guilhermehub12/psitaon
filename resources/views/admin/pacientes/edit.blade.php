<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb
            icon="fas fa-box"
            title="Produtos"
            :links="[
                'Produtos',
                'Editar Produto'
            ]"
        />
    </x-slot>

    @includeIf('admin.produtos.partials.form', [
        "title" => "Produto",
        "subtitle" => "Edição",
        "action" => route('admin.produtos.update', $produto),
        "method" => "PUT",
        "routeBack" => route('admin.produtos.index'),
        "buttonText" => "Atualizar",
        "produto" => $produto
    ])
</x-app-layout>
