<x-admin.modal-destroy title="Responsável" subtitle="Deletar"
    target="paciente-responsavel-modal-{{ $pacienteResponsavel->id }}-destroy" :action="route('paciente.pacientes.responsaveis.destroy', [
        'paciente' => $paciente,
        'pacienteResponsavel' => $pacienteResponsavel,
    ])" size="lg">
    <div class="row mb-3">
        <div class="col-md-4">
            <p class="font-weight-bold">Nome</p>
            {{ $pacienteResponsavel->nome }}
        </div>
        <div class="col-md-4">
            <p class="font-weight-bold">Contato</p>
            {{ $pacienteResponsavel->contato }}
        </div>
        <div class="col-md-4">
            <p class="font-weight-bold">E-mail</p>
            {{ $pacienteResponsavel->email }}
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">
            <p class="font-weight-bold">Grau de Parentesco</p>
            {{ $pacienteResponsavel->grau_parentesco }}
        </div>
        <div class="col-md-4">
            <p class="font-weight-bold">Tipo de Responsável</p>
            {{ $pacienteResponsavel->tipoResponsavel->nome }}
        </div>
    </div>
</x-admin.modal-destroy>
