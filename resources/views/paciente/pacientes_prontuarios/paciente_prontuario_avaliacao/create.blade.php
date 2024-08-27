<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb icon="fas fa-box" title="Anamnese - Queixa" :links="['Prontuário', 'Anamnese', 'Queixa']" />
    </x-slot>

    {{-- @includeIf('gestao_risco.atividades.partials.atividade', [
        'atividade' => $atividade,
        'route' => route('admin.paciente_prontuario.paciente_prontuario_queixa.index', $atividade),
    ]) --}}

    @includeIf('admin.pacientes_prontuarios.paciente_prontuario_queixa.partials.form', [
        'title' => 'Queixa',
        'subtitle' => 'Anamnese',
        'action' => route('admin.pacientes.prontuarios_queixas.store', $paciente),
        'method' => 'POST',
        'routeBack' => route('admin.pacientes.show', $paciente),
        'buttonText' => 'Salvar',
        'pacienteProntuarioQueixa' => null,
    ])
</x-app-layout>
