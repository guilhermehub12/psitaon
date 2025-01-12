<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb icon="fas fa-box" title="Anamnese - Queixa" :links="['Prontuário', 'Anamnese', 'Queixa']" />
    </x-slot>

    {{-- @includeIf('gestao_risco.atividades.partials.atividade', [
        'atividade' => $atividade,
        'route' => route('admin.paciente_prontuario.paciente_prontuario_queixa.index', $atividade),
    ]) --}}

    @includeIf('paciente.pacientes_prontuarios.paciente_prontuario_queixa.partials.form', [
        'title' => 'Queixa',
        'subtitle' => 'Anamnese',
        'action' => route('paciente.pacientes.prontuarios_queixas.store', $paciente),
        'method' => 'POST',
        'routeBack' => route('paciente.pacientes.show', $paciente),
        'buttonText' => 'Salvar',
        'pacienteProntuarioQueixa' => null,
    ])
</x-app-layout>
