<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb
            icon="fas fa-restroom"
            title="Clientes"
            :links="[
                'Clientes',
                'Cliente Data'
            ]"
        />
    </x-slot>

    @includeIf("admin.clientes.partials.cliente", [
        "cliente" => $cliente,
        "route" => route('admin.clientes.show', $cliente)
    ])

    @includeIf('admin.clientes.datas.partials.form', [
        "title" => "Cliente Data",
        "subtitle" => "Novo",
        "action" => route('admin.clientes.datas.store', $cliente),
        "method" => "POST",
        "routeBack" => route('admin.clientes.show', $cliente),
        "buttonText" => "Salvar",
        "clienteData" => null
    ])
</x-app-layout>
