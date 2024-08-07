<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb
            icon="fas fa-user-plus"
            title="Prontuários"
            :links="[
                'Prontuários',
                'Prontuário Novo'
            ]"
        />
    </x-slot>

    {{-- @includeIf('admin.pacientes_prontuarios.partials.form', [
        "title" => "Prontuário",
        "subtitle" => "Novo",
        "action" => route('admin.pacientes.prontuarios.store'),
        "method" => "POST",
        "routeBack" => route('admin.pacientes.prontuarios.index'),
        "buttonText" => "Salvar",
        "paciente" => null
    ]) --}}
</x-app-layout>
