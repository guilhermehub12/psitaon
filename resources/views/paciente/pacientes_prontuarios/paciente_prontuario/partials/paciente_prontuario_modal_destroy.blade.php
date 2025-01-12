<x-admin.modal-destroy
    title="Anamnese"
    subtitle="Deletar Queixa Inicial"
    target="paciente-prontuario-modal-{{ $paciente->id }}-destroy"
    action="{{ route('paciente.pacientes.prontuarios.destroy', [
            $paciente, $pacienteProntuario
        ])
    }}"
    message="Deseja apagar a queixa inicial do paciente abaixo?"
    size="xl"
>
    @includeIf('paciente.pacientes_prontuarios.paciente_prontuario.partials.paciente_prontuario', [
        'pacienteProntuario' => $pacienteProntuario,
    ])
</x-admin.modal-destroy>
