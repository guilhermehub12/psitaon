<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb icon="fas fa-user-plus" title="Pacientes" />
    </x-slot>

    <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header border-0">
              <div class="d-flex justify-content-between">
                <h3 class="card-title">Online Store Visitors</h3>
                <a href="javascript:void(0);">View Report</a>
              </div>
            </div>
            <div class="card-body">
              <div class="d-flex">
                <p class="d-flex flex-column">
                  <span class="text-bold text-lg">820</span>
                  <span>Visitors Over Time</span>
                </p>
                <p class="ml-auto d-flex flex-column text-right">
                  <span class="text-success">
                    <i class="fas fa-arrow-up"></i> 12.5%
                  </span>
                  <span class="text-muted">Since last week</span>
                </p>
              </div>
              <!-- /.d-flex -->

              <div class="position-relative mb-4">
                <canvas id="visitors-chart" height="200"></canvas>
              </div>

              <div class="d-flex flex-row justify-content-end">
                <span class="mr-2">
                  <i class="fas fa-square text-primary"></i> This Week
                </span>

                <span>
                  <i class="fas fa-square text-gray"></i> Last Week
                </span>
              </div>
            </div>
          </div>
          <!-- /.card -->


          <!-- /.card -->
        </div>
        <!-- /.col-md-6 -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header border-0">
                  <h3 class="card-title">Pacientes</h3>
                  <div class="card-tools">
                    <a href="#" class="btn btn-tool btn-sm">
                      <i class="fas fa-download"></i>
                    </a>
                    <a href="#" class="btn btn-tool btn-sm">
                      <i class="fas fa-bars"></i>
                    </a>
                  </div>
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-striped table-valign-middle">
                    <thead>
                    <tr>
                      <th>Product</th>
                      <th>Price</th>
                      <th>Sales</th>
                      <th>More</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>
                        <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                        Some Product
                      </td>
                      <td>$13 USD</td>
                      <td>
                        <small class="text-success mr-1">
                          <i class="fas fa-arrow-up"></i>
                          12%
                        </small>
                        12,000 Sold
                      </td>
                      <td>
                        <a href="#" class="text-muted">
                          <i class="fas fa-search"></i>
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                        Another Product
                      </td>
                      <td>$29 USD</td>
                      <td>
                        <small class="text-warning mr-1">
                          <i class="fas fa-arrow-down"></i>
                          0.5%
                        </small>
                        123,234 Sold
                      </td>
                      <td>
                        <a href="#" class="text-muted">
                          <i class="fas fa-search"></i>
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                        Amazing Product
                      </td>
                      <td>$1,230 USD</td>
                      <td>
                        <small class="text-danger mr-1">
                          <i class="fas fa-arrow-down"></i>
                          3%
                        </small>
                        198 Sold
                      </td>
                      <td>
                        <a href="#" class="text-muted">
                          <i class="fas fa-search"></i>
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                        Perfect Item
                        <span class="badge bg-danger">NEW</span>
                      </td>
                      <td>$199 USD</td>
                      <td>
                        <small class="text-success mr-1">
                          <i class="fas fa-arrow-up"></i>
                          63%
                        </small>
                        87 Sold
                      </td>
                      <td>
                        <a href="#" class="text-muted">
                          <i class="fas fa-search"></i>
                        </a>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
        </div>
        <!-- /.col-md-6 -->
      </div>

    <div class="row mb-3">
        <div class="col-md-2 offset-md-10">
            <a href="{{  route('admin.pacientes.create') }}" class="btn btn-lila btn-block text-uppercase font-weight-bold">
                <i class="fas fa-plus-circle"></i> Novo Paciente
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <x-admin.table title="Pacientes" subtitle="Listagem" :headers="['Nome', 'Telefone', 'Ações']" :records="$pacientes">
                @forelse ($pacientes as $paciente)
                    <tr class="text-center">
                        <td class="align-middle">
                            {{ $paciente->nome }}
                        </td>
                        <td class="align-middle">
                            {{ $paciente->telefone }}
                        </td>
                        <td class="align-middle text-uppercase">
                            <div class="dropdown dropright">
                                {{-- <button
                            id="dropdown-{{ $paciente->id }}"
                            class="btn btn-lila dropdown-toggle"
                            type="button"
                            data-toggle="dropdown"
                            aria-expanded="false"
                        >
                            <i class="fas fa-cog"></i>
                        </button> --}}
                                {{-- <div class="dropdown-menu" aria-labelledby="dropdown-{{ $paciente->id }}"> --}}
                                <a href="{{ route('admin.pacientes.show', $paciente) }}" class="dropdown-item">
                                    <i class="fas fa-info-circle"></i> Detalhes do Paciente
                                </a>
                                <a href="#" class="dropdown-item" data-toggle="modal"
                                    data-target="#paciente-modal-{{ $paciente->id }}-show">
                                    <i class="fas fa-window-restore"></i> Dados Cadastrais
                                </a>

                                @push('modals')
                                    @includeIf('admin.pacientes.partials.paciente-modal-show', $paciente)
                                @endpush

                                <a href="{{ route('admin.pacientes.edit', $paciente) }}" class="dropdown-item">
                                    <i class="fas fa-edit"></i> Editar Dados Cadastrais
                                </a>

                                {{-- </div> --}}
                            </div>
                        </td>
                    </tr>
                @empty
                @endforelse
            </x-admin.table>
        </div>
    </div>
</x-app-layout>
