<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb icon="fas fa-box" title="Anamnese - Queixa Inicial" :links="['Prontuário', 'Anamnese', 'Queixa Inicial']" />
    </x-slot>

    @includeIf('admin.pacientes_prontuarios.paciente_prontuario.partials.form', [
        'title' => 'Queixa Inicial',
        'subtitle' => 'Anamnese',
        'action' => route('admin.pacientes.prontuarios.store', $paciente),
        'method' => 'POST',
        'routeBack' => route('admin.pacientes.prontuarios.index', $paciente),
        'buttonText' => 'Salvar',
        'pacienteProntuario' => null,
    ])
</x-app-layout>
