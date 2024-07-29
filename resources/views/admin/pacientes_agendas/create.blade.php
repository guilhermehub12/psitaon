<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb
            icon="fas fa-box"
            title="Agendas"
            :links="[
                'Agendas',
                'Nova Agenda'
            ]"
        />
    </x-slot>

    @includeIf('admin.pacientes_agendas.partials.paciente', [
        "paciente" => $paciente,
        "route" => route('admin.pacientes.show', $paciente)
    ])

    @includeIf('admin.pacientes_agendas.partials.form', [
        "title" => "Agenda",
        "subtitle" => "Novo",
        "action" => route('admin.pacientes.agendas.store', $paciente),
        "method" => "POST",
        "routeBack" => route('admin.pacientes.index'),
        "buttonText" => "Salvar",
        "pacienteAgenda" => null
    ])

    <x-admin.table
        title="Paciente"
        subtitle="Agendas"
        :headers="['Nome', 'Tipo de Agenda', 'Ações']"
        :records="$paciente"
    >
        @forelse ($paciente->agendas as $pacienteAgenda)
            <tr class="text-center">
                <td class="align-middle">{{ $pacienteAgenda->nome }}</td>
                <td class="align-middle text-uppercase">
                    <button
                        type="button"
                        class="btn btn-danger text-uppercase font-weight-bold"
                        data-toggle="modal"
                        data-target="#paciente-agenda-modal-{{ $pacienteAgenda->id }}-destroy"
                    >
                        <i class="fas fa-trash"></i> Deletar
                    </button>

                    @push('modals')
                        @includeIf('admin.pacientes_agendas.partials.paciente-agenda-modal-destroy', [
                            $paciente,
                            $pacienteAgenda
                        ])
                    @endpush
                </td>
            </tr>
        @empty
        <tr class="text-center">
            <td class="align-middle">Nenhum financeiro cadastrado</td>
        </tr>
        @endforelse
    </x-admin.table>
</x-app-layout>
