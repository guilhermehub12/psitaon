<div class="card h-100">
    <div class="card-header">
      <h3 class="card-title font-weight-bold text-uppercase">
        Paciente <span class="badge badge-secondary">Detalhes</span>
      </h3>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-4">
                <p class="font-weight-bold">Nome</p>
                {{ $paciente->nome }}
            </div>
            <div class="col-md-4">
                <p class="font-weight-bold">Data de Nascimento</p>
                {{ $paciente->data_nascimento }}
            </div>
            <div class="col-md-4">
                <p class="font-weight-bold">Gênero</p>
                {{ dd($paciente->genero) }}
                {{ $paciente->generos->nome }}
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
    </div>
    <div class="card-footer bg-transparent border-top">
        <div class="row justify-content-end">
            <div class="col-6 col-sm-6 col-md-2">
                <a href="{{ isset($route) ? $route : route('admin.pacientes.index') }}" class="btn btn-dark btn-block text-uppercase font-weight-bold">
                    <i class="fas fa-backward"></i> Voltar
                </a>
            </div>
            <div class="col-6 col-sm-6 col-md-2">
                <a href="{{  route('admin.pacientes.edit', $paciente) }}" class="btn btn-lila btn-block text-uppercase font-weight-bold">
                    <i class="fas fa-edit"></i> Editar
                </a>
            </div>
        </div>
    </div>
  </div>
