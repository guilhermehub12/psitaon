<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb
            icon="fas fa-box"
            title="Produtos"
            :links="[
                'Produtos',
                'Produto Novo'
            ]"
        />
    </x-slot>

    @includeIf('admin.produtos.partials.form', [
        "title" => "Produto",
        "subtitle" => "Novo",
        "action" => route('admin.produtos.store'),
        "method" => "POST",
        "routeBack" => route('admin.produtos.index'),
        "buttonText" => "Salvar",
        "produto" => null
    ])
</x-app-layout>
