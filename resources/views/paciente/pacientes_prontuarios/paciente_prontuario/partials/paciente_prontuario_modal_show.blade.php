<x-admin.modal
    title="Anamnese"
    subtitle="Queixa Inicial"
    target="paciente-prontuario-modal-{{ $paciente->id }}-show"
    size="xl"
>
    @includeIf('paciente.pacientes_prontuarios.paciente_prontuario.partials.paciente_prontuario', [
        'pacienteProntuario' => $pacienteProntuario
    ])
</x-admin.modal>
