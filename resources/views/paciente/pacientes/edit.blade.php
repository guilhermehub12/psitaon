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

    @includeIf('admin.pacientes.partials.form', [
        "title" => "Paciente",
        "subtitle" => "Edição",
        "action" => route('admin.pacientes.update', $paciente),
        "method" => "PUT",
        "routeBack" => route('admin.pacientes.index'),
        "buttonText" => "Atualizar",
        "paciente" => $paciente
    ])
</x-app-layout>
