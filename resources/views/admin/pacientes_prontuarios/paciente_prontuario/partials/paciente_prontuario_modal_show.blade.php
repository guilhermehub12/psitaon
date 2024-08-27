<x-admin.modal
    title="Anamnese"
    subtitle="Queixa Inicial"
    target="paciente-prontuario-modal-{{ $pacienteProntuario->id }}-show"
    size="xl"
>
    @includeIf('admin.pacientes_prontuarios.paciente_prontuario.partials.paciente_prontuario', [
        'pacienteProntuario' => $pacienteProntuario
    ])
</x-admin.modal>
