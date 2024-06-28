<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb
            icon="fas fa-restroom"
            title="Clientes"
            :links="[
                'Clientes',
                'Cliente Edição'
            ]"
        />
    </x-slot>

    @includeIf('admin.clientes.partials.form', [
        "title" => "Cliente",
        "subtitle" => "Edição",
        "action" => route('admin.clientes.update', $cliente),
        "method" => "PUT",
        "routeBack" => route('admin.clientes.index'),
        "buttonText" => "Atualizar",
        "cliente" => $cliente
    ])
</x-app-layout>
