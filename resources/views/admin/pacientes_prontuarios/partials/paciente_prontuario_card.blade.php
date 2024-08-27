<div class="card shadow-none d-flex align-items-stretch h-100" style="background: #B99470; padding-bottom: 8px">
    <div class="card-header bg-transparent">
        <h4 class="card-title">1 - QUEIXA INICIAL</h4>
    </div>
    <div class="card-body">
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1">
            @if (!$paciente->pacienteProntuario)
                <div class="col">
                    <div class="d-grid">
                        <a
                            href="{{ route('admin.pacientes.prontuarios.create', $paciente) }}"
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
                            data-bs-target="#paciente-prontuario-modal-{{ $paciente->id }}-show"
                        >
                            <i class="fas fa-info-circle"></i> Visualizar
                            @push('modals')
                                @includeIf('admin.pacientes_prontuarios.paciente_prontuario.partials.paciente_prontuario_modal_show.blade', [
                                    'paciente' => $paciente,
                                    'pacienteProntuario' => $paciente->pacienteProntuario
                                ])
                            @endpush
                        </a>
                    </div>
                </div>
                {{-- @can('update', $paciente) --}}
                <div class="col mt-3">
                    <div class="d-grid">
                        <a
                            href="{{
                                route('admin.pacientes.prontuarios.edit', [
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
                {{-- @can('delete', $paciente->pacienteProntuario) --}}
                <div class="col mt-3">
                    <div class="d-grid">
                        <a
                            class="btn btn-danger waves-effect waves-light"
                            href="#"
                            data-bs-toggle="modal"
                            data-bs-target="#paciente-prontuario-modal-{{ $paciente->id }}-destroy"
                        >
                            <i class="fas fa-trash-alt"></i> Deletar
                            @push('modals')
                                @includeIf('admin.pacientes_prontuarios.paciente_prontuario.partials.paciente_prontuario_modal_destroy.blade', [
                                    'paciente' => $paciente,
                                    'pacienteProntuario' => $paciente->pacienteProntuario
                                ])
                            @endpush
                        </a>
                    </div>
                </div>
                {{-- @endcan --}}
            @endif
        </div>
    </div>
</div>
