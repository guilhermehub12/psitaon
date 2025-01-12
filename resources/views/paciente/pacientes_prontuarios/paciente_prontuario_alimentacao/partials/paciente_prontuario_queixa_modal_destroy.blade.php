<x-admin.modal-destroy
    title="Queixa"
    subtitle="Deletar"
    target="paciente-prontuario-queixa-modal-{{ $pacienteProntuario->id }}-destroy"
    action="{{ route('admin.paciente_prontuario.paciente_prontuario_queixa.destroy', [
            $pacienteProntuario, $pacienteProntuarioQueixa
        ])
    }}"
    message="Deseja apagar a queixa do paciente abaixo?"
    size="xl"
>
    @includeIf('paciente.pacientes_prontuarios.paciente_prontuario_queixa.partials.paciente_prontuario_queixa', [
        'pacienteProntuarioQueixa' => $pacienteProntuarioQueixa,
    ])
</x-admin.modal-destroy>
