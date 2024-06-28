<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb
            icon="fas fa-restroom"
            title="Clientes"
            :links="[
                'Clientes',
                'Cliente Novo'
            ]"
        />
    </x-slot>

    @includeIf('admin.clientes.partials.form', [
        "title" => "Cliente",
        "subtitle" => "Novo",
        "action" => route('admin.clientes.store'),
        "method" => "POST",
        "routeBack" => route('admin.clientes.index'),
        "buttonText" => "Salvar",
        "cliente" => null
    ])
</x-app-layout>
