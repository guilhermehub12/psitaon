<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb
            icon="fas fa-user-plus"
            title="Pacientes"
            :links="[
                'Pacientes',
                'Paciente Novo'
            ]"
        />
    </x-slot>

    @includeIf('admin.pacientes.partials.form', [
        "title" => "Paciente",
        "subtitle" => "Novo",
        "action" => route('admin.pacientes.store'),
        "method" => "POST",
        "routeBack" => route('admin.pacientes.index'),
        "buttonText" => "Salvar",
        "produto" => null
    ])
</x-app-layout>
