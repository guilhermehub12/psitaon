<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb
            icon="fas fa-box"
            title="Responsáveis"
            :links="[
                'Responsáveis',
                'Novo Responsável'
            ]"
        />
    </x-slot>

    @includeIf('paciente.pacientes_responsaveis.partials.paciente', [
        "paciente" => $paciente,
        "route" => route('paciente.pacientes.show', $paciente)
    ])

    @includeIf('paciente.pacientes_responsaveis.partials.form', [
        "title" => "Responsável",
        "subtitle" => "Novo",
        "action" => route('paciente.pacientes.responsaveis.store', $paciente),
        "method" => "POST",
        "routeBack" => route('paciente.pacientes.show', $paciente),
        "buttonText" => "Salvar",
        "pacienteResponsavel" => null
    ])

    <x-admin.table
        title="Paciente"
        subtitle="Responsáveis"
        :headers="['Nome', 'Tipo de Responsável', 'Grau de Parentesco', 'Ações']"
        :records="$paciente"
    >
        @forelse ($paciente->responsaveis as $pacienteResponsavel)
            <tr class="text-center">
                <td class="align-middle">{{ $pacienteResponsavel->nome }}</td>
                <td class="align-middle">{{ $pacienteResponsavel->tipoResponsavel->nome }}</td>
                <td class="align-middle">{{ $pacienteResponsavel->grau_parentesco }}</td>
                <td class="align-middle text-uppercase">
                    <button
                        type="button"
                        class="btn btn-danger text-uppercase font-weight-bold"
                        data-toggle="modal"
                        data-target="#paciente-responsavel-modal-{{ $pacienteResponsavel->id }}-destroy"
                    >
                        <i class="fas fa-trash"></i> Deletar
                    </button>

                    @push('modals')
                        @includeIf('paciente.pacientes_responsaveis.partials.paciente-responsavel-modal-destroy', [
                            $paciente,
                            $pacienteResponsavel
                        ])
                    @endpush
                </td>
            </tr>
        @empty
        <tr class="text-center">
            <td class="align-middle" colspan="4">Nenhum responsável cadastrado</td>
        </tr>
        @endforelse
    </x-admin.table>
</x-app-layout>
