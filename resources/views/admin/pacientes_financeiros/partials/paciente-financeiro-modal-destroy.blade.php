<x-admin.modal-destroy title="Financeiro" subtitle="Deletar"
    target="paciente-responsavel-modal-{{ $pacienteFinanceiro->id }}-destroy" :action="route('admin.pacientes.financeiros.destroy', [
        'paciente' => $paciente,
        'pacienteFinanceiro' => $pacienteFinanceiro,
    ])" size="lg">
    <div class="row mb-3">
        <div class="col-md-4">
            <p class="font-weight-bold">Nome</p>
            {{ $pacienteFinanceiro->nome }}
        </div>
    </div>
</x-admin.modal-destroy>
