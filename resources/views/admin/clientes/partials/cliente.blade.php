<div class="card h-100">
    <div class="card-header">
      <h3 class="card-title font-weight-bold text-uppercase">
        Cliente <span class="badge badge-secondary">Detalhes</span>
      </h3>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-6">
                <p class="font-weight-bold">Nome</p>
                {{ $cliente->nome }}
            </div>
            <div class="col-md-6">
                <p class="font-weight-bold">E-mail</p>
                {{ $cliente->email }}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <p class="font-weight-bold">Data Nascimento</p>
                {{ $cliente->data_nascimento }}
            </div>
            <div class="col-md-4">
                <p class="font-weight-bold">Telefone</p>
                {{ $cliente->telefone }}
            </div>
            <div class="col-md-4">
                <p class="font-weight-bold">Celular</p>
                {{ $cliente->celular }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="font-weight-bold">Instagram</p>
                {{ $cliente->instagram }}
            </div>
        </div>
    </div>
    <div class="card-footer bg-transparent border-top">
        <div class="row justify-content-end">
            <div class="col-6 col-sm-6 col-md-2">
                <a href="{{ isset($route) ? $route : route('admin.clientes.index') }}" class="btn btn-dark btn-block text-uppercase font-weight-bold">
                    <i class="fas fa-backward"></i> Voltar
                </a>
            </div>
            <div class="col-6 col-sm-6 col-md-2">
                <a href="{{  route('admin.clientes.edit', $cliente) }}" class="btn btn-primary btn-block text-uppercase font-weight-bold">
                    <i class="fas fa-edit"></i> Editar
                </a>
            </div>
        </div>
    </div>
  </div>
