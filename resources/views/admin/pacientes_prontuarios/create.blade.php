<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb icon="fas fa-user-plus" title="Prontuários" :links="['Prontuários', 'Prontuário Novo']" />
    </x-slot>

    @includeIf('admin.pacientes_financeiros.partials.paciente', [
        'paciente' => $paciente,
        'route' => route('admin.pacientes.show', $paciente),
    ])

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title font-weight-bold text-uppercase">
                        Prontuário
                        <span class="badge badge-secondary fw-bold">Anamnese</span>
                    </h4>
                </div>
                <div class="card-body">
                    <div
                        class="row g-2 text-uppercase text-dark justify-content-center text-center row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-3 row-cols-xxl-3">
                        <div class="col">
                            @includeIf('admin.pacientes_prontuarios.partials.paciente_prontuario_card', [
                                'paciente' => $paciente,
                            ])
                        </div>
                        <div class="col">
                            @includeIf('admin.pacientes_prontuarios.partials.paciente_prontuario_queixa_card', [
                                'paciente' => $paciente,
                            ])
                        </div>
                        <div class="col">
                            @includeIf('admin.pacientes_prontuarios.partials.paciente_prontuario_alimentacao_card', [
                                'paciente' => $paciente,
                            ])
                        </div>
                        <div class="col">
                            @includeIf('admin.pacientes_prontuarios.partials.paciente_prontuario_doenca_card', [
                                'paciente' => $paciente,
                            ])
                        </div>
                        <div class="col">
                            @includeIf('admin.pacientes_prontuarios.partials.paciente_prontuario_avaliacao_card', [
                                'paciente' => $paciente,
                            ])
                        </div>
                        <div class="col">
                            @includeIf('admin.pacientes_prontuarios.partials.paciente_prontuario_planejamento_card', [
                                'paciente' => $paciente,
                            ])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
