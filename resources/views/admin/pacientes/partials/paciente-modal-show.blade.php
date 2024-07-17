<x-admin.modal title="Tamanho" subtitle="Visualizar" target="paciente-modal-{{ $paciente->id }}-show">
    <div class="row mb-3">
        <div class="col-md-4">
            <p class="font-weight-bold">Nome</p>
            {{ $paciente->nome }}
        </div>
        <div class="col-md-4">
            <p class="font-weight-bold">Data de nascimento</p>
            {{ $paciente->data_nascimento }}
        </div>
        <div class="col-md-4">
            <p class="font-weight-bold">Gênero</p>
            {{ $paciente->genero }}
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">
            <p class="font-weight-bold">Escolaridade</p>
            {{ $paciente->escolaridade }}
        </div>
        <div class="col-md-4">
            <p class="font-weight-bold">Profissão</p>
            {{ $paciente->profissao }}
        </div>
        <div class="col-md-4">
            <p class="font-weight-bold">Estado Civil</p>
            {{ $paciente->estado_civil }}
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">
            <p class="font-weight-bold">Endereço</p>
            {{ $paciente->endereco }}
        </div>
        <div class="col-md-4">
            <p class="font-weight-bold">Contato</p>
            {{ $paciente->telefone }}
        </div>
        <div class="col-md-4">
            <p class="font-weight-bold">E-mail</p>
            {{ $paciente->email }}
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">
            <p class="font-weight-bold">Nome do pai</p>
            {{ $paciente->nome_pai }}
        </div>
        <div class="col-md-4">
            <p class="font-weight-bold">Nome da mãe</p>
            {{ $paciente->nome_mae }}
        </div>
    </div>
</x-admin.modal>
