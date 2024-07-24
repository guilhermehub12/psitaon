<x-admin.modal-destroy
    title="Responsável"
    subtitle="Deletar"
    target="paciente-responsavel-modal-{{ $pacienteResponsavel->id }}-destroy"
    :action="route('admin.pacientes.responsaveis.destroy', ['responsavel' => $responsavel, 'pacienteResponsavel' => $pacienteResponsavel])"
    size="lg"
>
    <div class="row">
        <div class="col-md-12 text-center text-danger">
            <h5>Deseja deletar o responsável abaixo?</h5>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <p class="font-weight-bold">Nome</p>
            {{ $pacienteResponsavel->nome }}
        </div>
    </div>
</x-admin.modal-destroy>


