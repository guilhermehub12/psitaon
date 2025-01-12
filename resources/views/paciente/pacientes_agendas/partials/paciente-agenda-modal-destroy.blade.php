<x-admin.modal-destroy title="Financeiro" subtitle="Deletar"
    target="paciente-agenda-modal-{{ $pacienteAgenda->id }}-destroy" :action="route('paciente.pacientes.agendas.destroy', [
        'paciente' => $paciente,
        'pacienteAgenda' => $pacienteAgenda,
    ])" size="lg">
    <div class="row mb-3">
        <div class="col-md-4">
            <p class="font-weight-bold">Nome</p>
            {{ $pacienteAgenda->nome }}
        </div>
    </div>
</x-admin.modal-destroy>
