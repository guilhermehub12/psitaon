@if ($paciente->pacienteProntuario)
    <div class="card shadow-none d-flex align-items-stretch h-100" style="background: #f79451;">
        <div class="card-header bg-transparent">
            <h4 class="card-title">2 -  HISTÓRIA E EVOLUÇÃO DA QUEIXA</h4>
        </div>
        <div class="card-body">
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1">
                @if (!$paciente->pacienteProntuarioQueixa)
                    <div class="col">
                        <div class="d-grid">
                            <a
                                href=""
                                class="btn btn-info waves-effect waves-light"
                            >
                                <i class="fas fa-pencil-alt"></i> Iniciar
                            </a>
                        </div>
                    </div>
                @else
                    <div class="col">
                        <div class="d-grid">
                            <a
                                class="btn btn-success waves-effect waves-light"
                                href="#"
                                data-bs-toggle="modal"
                                data-bs-target="#paciente-prontuario-queixa-modal-{{ $paciente->id }}-show"
                            >
                                <i class="fas fa-info-circle"></i> Visualizar
                                @push('modals')
                                    @includeIf('paciente.pacientes_prontuarios.paciente_prontuario_queixa.partials.paciente_prontuario_queixa_modal_show', [
                                        'paciente' => $paciente,
                                        'pacienteProntuario' => $paciente->pacienteProntuario
                                    ])
                                @endpush
                            </a>
                        </div>
                    </div>
                    {{-- @can('update', $pacienteProntuario) --}}
                    <div class="col mt-3">
                        <div class="d-grid">
                            <a
                                href="{{
                                    route('paciente.pacientes.prontuarios_queixas.edit', [
                                        $paciente,
                                        $paciente->pacienteProntuario
                                    ])
                                }}"
                                class="btn btn-info waves-effect waves-light"
                            >
                                <i class="fas fa-pencil-alt"></i> Editar
                            </a>
                        </div>
                    </div>
                    {{-- @endcan --}}
                    <div class="col mt-3">
                        <div class="d-grid">
                            <a
                                class="btn btn-danger waves-effect waves-light"
                                href="#"
                                data-bs-toggle="modal"
                                data-bs-target="#paciente-prontuario-queixa-modal-{{ $paciente->id }}-destroy"
                            >
                                <i class="fas fa-trash"></i> Deletar
                                @push('modals')
                                    @includeIf('paciente.pacientes_prontuarios.paciente_prontuario_queixa.partials.paciente_prontuario_queixa_modal_destroy', [
                                        'paciente' => $paciente,
                                        'pacienteProntuario' => $paciente->pacienteProntuario
                                    ])
                                @endpush
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@else
    <div class="card shadow-none d-flex align-items-stretch h-100" style="background: #808080; opacity: 0.5; cursor: not-allowed;">
        <div class="card-header bg-transparent">
            <h4 class="card-title">2 - HISTÓRIA E EVOLUÇÃO DA QUEIXA</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="d-grid">
                        <button
                            class="btn btn-info waves-effect waves-light text-uppercase"
                            style="cursor: not-allowed;"
                        >
                            <i class="fas fa-ban text-danger"></i> Iniciar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
