<x-admin.modal
    title="Prontuário"
    subtitle="Queixas"
    target="paciente-prontuario-queixa-modal-{{ $pacienteProntuario->id }}-show"
    size="xl"
>
    @includeIf('paciente.pacientes_prontuarios.paciente_prontuario_queixa.partials.paciente_prontuario_queixa', [
        'pacienteProntuarioQueixa' => $pacienteProntuarioQueixa
    ])
</x-admin.modal>
