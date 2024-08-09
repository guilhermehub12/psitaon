<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb icon="fas fa-user-plus" title="Pacientes" />
    </x-slot>

    {{-- Gráfico --}}
    <div class="row">
        <div class="col-lg-6">
            <div class="card zoom-card">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Atendimento</h3>
                        <a href="javascript:void(0);">Ver Relatório</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex">
                        <p class="d-flex flex-column">
                            <span class="text-bold text-lg">150</span>
                            <span>Atendimentos este ano</span>
                        </p>
                        <p class="ml-auto d-flex flex-column text-right">
                            <span class="text-success">
                                <i class="fas fa-arrow-up"></i> 10%
                            </span>
                            <span class="text-muted">Comparado ao ano passado</span>
                        </p>
                    </div>

                    <div class="position-relative mb-4">
                        <canvas id="atendimentos-chart" height="200"></canvas>
                    </div>

                    <div class="d-flex flex-row justify-content-end">
                        <span class="mr-2">
                            <i class="fas fa-square text-primary"></i> 2024
                        </span>
                        <span>
                            <i class="fas fa-square text-gray"></i> 2023
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col-md-6 -->
        <div class="col-lg-6">
            <div class="card zoom-card">
                <div class="card-header border-0">
                    <h3 class="card-title">Sessões</h3>
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
                                <th>Paciente</th>
                                <th>Última Sessão</th>
                                <th>Próxima Sessão</th>
                                <th>Detalhes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>João Silva</td>
                                <td>10/07/2024</td>
                                <td>20/07/2024</td>
                                <td>
                                    <a href="#" class="text-muted">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Maria Oliveira</td>
                                <td>05/07/2024</td>
                                <td>25/07/2024</td>
                                <td>
                                    <a href="#" class="text-muted">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Pedro Santos</td>
                                <td>01/07/2024</td>
                                <td>30/07/2024</td>
                                <td>
                                    <a href="#" class="text-muted">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Ana Costa</td>
                                <td>15/07/2024</td>
                                <td>20/07/2024</td>
                                <td>
                                    <a href="#" class="text-muted">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Ana Costa</td>
                                <td>15/07/2024</td>
                                <td>20/07/2024</td>
                                <td>
                                    <a href="#" class="text-muted">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Ana Costa</td>
                                <td>15/07/2024</td>
                                <td>20/07/2024</td>
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
    {{-- Fim do Gráfico --}}


    <div class="row mb-3">
        <div class="col-md-3 offset-md-9">
            <a href="{{ route('admin.pacientes.create') }}"
                class="btn btn-lila btn-block text-uppercase font-weight-bold">
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
                    <tr>
                        <td>Vazio</td>
                    </tr>
                @endforelse
            </x-admin.table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('atendimentos-chart').getContext('2d');
        var atendimentosChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho'],
                datasets: [{
                        label: 'Atendimentos 2024',
                        data: [50, 60, 70, 80, 90, 100, 150],
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        fill: false
                    },
                    {
                        label: 'Atendimentos 2023',
                        data: [36, 23, 53, 75, 33, 96, 141],
                        borderColor: '#6C757D',
                        borderWidth: 1,
                        fill: false
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</x-app-layout>
