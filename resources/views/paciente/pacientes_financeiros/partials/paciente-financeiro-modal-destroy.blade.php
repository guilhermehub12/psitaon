<x-admin.modal-destroy title="Financeiro" subtitle="Deletar"
    target="paciente-financeiro-modal-{{ $pacienteFinanceiro->id }}-destroy" :action="route('paciente.pacientes.financeiros.destroy', [
        'paciente' => $paciente,
        'pacienteFinanceiro' => $pacienteFinanceiro,
    ])" size="lg">
    <div class="row mb-3">
        <div class="col-md-4">
            <p class="font-weight-bold">Modalidade de Pagamento</p>
            {{ $pacienteFinanceiro->modalidadePagamento->nome ?? '' }}
        </div>
        <div class="col-md-4">
            <p class="font-weight-bold">Valor da Sessão</p>
            {{ $pacienteFinanceiro->valor_sessao }}
        </div>
        <div class="col-md-4">
            <p class="font-weight-bold">Frequência de Pagamento</p>
            {{ $pacienteFinanceiro->frequenciaPagamento->nome ?? '' }}
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">
            <p class="font-weight-bold">Forma de Pagamento</p>
            {{ $pacienteFinanceiro->formaPagamento->nome ?? '' }}
        </div>
        <div class="col-md-4">
            <p class="font-weight-bold">Modalidade de Pagamento</p>
            {{ $pacienteFinanceiro->statusPagamento->nome ?? '' }}
        </div>
        <div class="col-md-4">
            <p class="font-weight-bold">Status de Presença</p>
            {{ $pacienteFinanceiro->statusPresenca->nome ?? '' }}
        </div>
    </div>
</x-admin.modal-destroy>
