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

    @includeIf('admin.pacientes_agendas.partials.calendar')

    {{-- @includeIf('admin.pacientes_agendas.partials.paciente', [
        "paciente" => $paciente,
        "route" => route('admin.pacientes.show', $paciente)
    ]) --}}

    @includeIf('admin.pacientes_agendas.partials.form', [
        "title" => "Agenda",
        "subtitle" => "Novo",
        "action" => route('admin.pacientes.agendas.store', $paciente),
        "method" => "POST",
        "routeBack" => route('admin.pacientes.show', $paciente),
        "buttonText" => "Salvar",
        "pacienteAgenda" => null
    ])

    <x-admin.table
        title="Paciente"
        subtitle="Agendas"
        :headers="['Frequência', 'Horário', 'Data', 'Ações']"
        :records="$paciente"
    >
        @forelse ($paciente->agendas as $pacienteAgenda)
            <tr class="text-center">
                <td class="align-middle">{{ $pacienteAgenda->frequencia->nome }}</td>
                <td class="align-middle">{{ $pacienteAgenda->horario }}</td>
                <td class="align-middle">{{ $pacienteAgenda->dia }}</td>
                <td class="align-middle text-uppercase">
                    <button
                        type="button"
                        class="btn btn-info text-uppercase font-weight-bold"
                        data-toggle="modal"
                        data-target="#paciente-agenda-financeiro-modal-{{ $pacienteAgenda->id }}-store"
                    >
                        <i class="fas fa-file-invoice-dollar"></i> Valores
                    </button>
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
                        @includeIf('admin.pacientes_agendas.partials.paciente-agenda-financeiro-modal-store', [
                            $paciente,
                            $pacienteAgenda
                        ])
                    @endpush
                </td>
            </tr>
        @empty
        <tr class="text-center">
            <td class="align-middle" colspan="4">Nenhuma sessão cadastrada</td>
        </tr>
        @endforelse
    </x-admin.table>
</x-app-layout>
