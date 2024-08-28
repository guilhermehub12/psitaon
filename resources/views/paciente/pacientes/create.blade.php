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

    @includeIf('paciente.pacientes.partials.form', [
        "title" => "Paciente",
        "subtitle" => "Novo",
        "action" => route('paciente.pacientes.store'),
        "method" => "POST",
        "routeBack" => route('paciente.pacientes.index'),
        "buttonText" => "Salvar",
        "paciente" => null
    ])
</x-app-layout>
