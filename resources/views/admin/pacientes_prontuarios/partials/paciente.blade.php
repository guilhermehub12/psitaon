<div class="card h-100">
    <div class="card-header">
        <h3 class="card-title font-weight-bold text-uppercase">
            Paciente <span class="badge badge-secondary">Detalhes</span>
        </h3>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-6">
                <p class="font-weight-bold">Nome</p>
                {{ $paciente->nome }}
            </div>
            <div class="col-md-6">
                <p class="font-weight-bold">Contato</p>
                {{ $paciente->telefone }}
            </div>
        </div>
    </div>
    <div class="card-footer bg-transparent border-top">
        <div class="row justify-content-end">
            <div class="col-6 col-sm-6 col-md-2">
                <a href="{{ isset($route) ? $route : route('admin.pacientes.index') }}"
                    class="btn btn-dark btn-block text-uppercase font-weight-bold">
                    <i class="fas fa-backward"></i> Voltar
                </a>
            </div>
        </div>
    </div>
</div>
