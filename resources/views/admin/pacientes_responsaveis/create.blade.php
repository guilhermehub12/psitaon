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

    @includeIf('admin.pacientes_responsaveis.partials.paciente', [
        "paciente" => $paciente,
        "route" => route('admin.pacientes.show', $paciente)
    ])

    @includeIf('admin.pacientes_responsaveis.partials.form', [
        "title" => "Responsável",
        "subtitle" => "Novo",
        "action" => route('admin.pacientes.responsaveis.store', $paciente),
        "method" => "POST",
        "routeBack" => route('admin.pacientes.index'),
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
                        @includeIf('admin.pacientes_responsaveis.partials.paciente-responsavel-modal-destroy', [
                            $paciente,
                            $pacienteResponsavel
                        ])
                    @endpush
                </td>
            </tr>
        @empty
        <tr class="text-center">
            <td class="align-middle">Nenhum responsável cadastrado</td>
        </tr>
        @endforelse
    </x-admin.table>
</x-app-layout>
