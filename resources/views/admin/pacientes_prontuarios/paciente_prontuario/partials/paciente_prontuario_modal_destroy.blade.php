<x-admin.modal-destroy
    title="Anamnese"
    subtitle="Deletar Queixa Inicial"
    target="paciente-prontuario-modal-{{ $pacienteProntuario->id }}-destroy"
    action="{{ route('admin.paciente_prontuario.paciente_prontuario.destroy', [
            $paciente, $pacienteProntuario
        ])
    }}"
    message="Deseja apagar a queixa inicial do paciente abaixo?"
    size="xl"
>
    @includeIf('admin.pacientes_prontuarios.paciente_prontuario.partials.paciente_prontuario', [
        'pacienteProntuario' => $pacienteProntuario,
    ])
</x-admin.modal-destroy>
