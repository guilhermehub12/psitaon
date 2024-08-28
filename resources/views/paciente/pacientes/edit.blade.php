<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb
            icon="fas fa-user-plus"
            title="Pacientes"
            :links="[
                'Pacientes',
                'Editar Paciente'
            ]"
        />
    </x-slot>

    @includeIf('paciente.pacientes.partials.form', [
        "title" => "Paciente",
        "subtitle" => "Edição",
        "action" => route('paciente.pacientes.update', $paciente),
        "method" => "PUT",
        "routeBack" => route('paciente.pacientes.index'),
        "buttonText" => "Atualizar",
        "paciente" => $paciente
    ])
</x-app-layout>
