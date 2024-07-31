<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb icon="fas fa-box" title="Financeiros" :links="['Financeiros', 'Novo Financeiro']" />
    </x-slot>

    @includeIf('admin.pacientes_financeiros.partials.paciente', [
        'paciente' => $paciente,
        'route' => route('admin.pacientes.show', $paciente),
    ])

    @includeIf('admin.pacientes_financeiros.partials.form', [
        'title' => 'Financeiro',
        'subtitle' => 'Novo',
        'action' => route('admin.pacientes.financeiros.store', $paciente),
        'method' => 'POST',
        'routeBack' => route('admin.pacientes.index'),
        'buttonText' => 'Salvar',
        'pacienteFinanceiro' => null,
    ])

    <x-admin.table title="Paciente" subtitle="Financeiros" :headers="['Modalidade de Pagamento', 'Ações']" :records="$paciente">
        @forelse ($paciente->financeiros as $pacienteFinanceiro)
            <tr class="text-center">
                @if (Str::lower($pacienteFinanceiro->modalidadePagamento->nome) == 'convênio')
                    <td class="align-middle">{{ $pacienteFinanceiro->modalidadePagamento->nome  ?? '' }}</td>
                @else
                    <td class="align-middle">{{ $pacienteFinanceiro->modalidadePagamento->nome ?? '' }}</td>
                    <td class="align-middle">{{ $pacienteFinanceiro->frequenciaPagamento->nome ?? '' }}</td>
                    <td class="align-middle">{{ $pacienteFinanceiro->formaPagamento->nome ?? '' }}</td>
                @endif
                <td class="align-middle text-uppercase">
                    <button type="button" class="btn btn-danger text-uppercase font-weight-bold" data-toggle="modal"
                        data-target="#paciente-financeiro-modal-{{ $pacienteFinanceiro->id }}-destroy">
                        <i class="fas fa-trash"></i> Deletar
                    </button>

                    @push('modals')
                        @includeIf('admin.pacientes_financeiros.partials.paciente-financeiro-modal-destroy', [
                            $paciente,
                            $pacienteFinanceiro,
                        ])
                    @endpush
                </td>
            </tr>
        @empty
            <tr class="text-center">
                <td class="align-middle" colspan="4">Nenhum financeiro cadastrado</td>
            </tr>
        @endforelse
    </x-admin.table>
</x-app-layout>
