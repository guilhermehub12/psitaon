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
        "paciente" => $responsavel,
        "route" => route('admin.pacientes.show', $responsavel)
    ])

    @includeIf('admin.pacientes_responsaveis.partials.form', [
        "title" => "Responsável",
        "subtitle" => "Novo",
        "action" => route('admin.pacientes_responsaveis.store', $responsavel),
        "method" => "POST",
        "routeBack" => route('admin.pacientes.index'),
        "buttonText" => "Salvar",
        "produtoResponsavel" => null
    ])

    <x-admin.table
        title="Produto"
        subtitle="Adicionais"
        :headers="['Nome', 'Descrição Resumida', 'Preço', 'Observação', 'Ações']"
        :records="$responsavel->adicionais"
    >
        @forelse ($responsavel->adicionais as $pacienteResponsavel)
            <tr class="text-center">
                <td class="align-middle">{{ $pacienteResponsavel->nome }}</td>
                <td class="align-middle">{{ $pacienteResponsavel->descricao }}</td>
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
                            $responsavel,
                            $pacienteResponsavel
                        ])
                    @endpush
                </td>
            </tr>
        @empty
        @endforelse
    </x-admin.table>
</x-app-layout>
