<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb icon="fas fa-user-plus" title="Pacientes" />
    </x-slot>

    <div class="row mb-3">
        <div class="col-md-2 offset-md-3">
            <a href="{{ route('admin.pacientes.create') }}" class="btn btn-lila btn-block text-uppercase font-weight-bold">
                <i class="fas fa-plus-circle"></i> Paciente
            </a>
        </div>
    </div>

    <x-admin.table
        title="Pacientes"
        subtitle="Listagem"
        :headers="['Nome', 'Telefone', 'Ações']"
        :records="$pacientes"
    >
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
                            <a href="{{  route('admin.pacientes.show', $paciente) }}" class="dropdown-item">
                                <i class="fas fa-info-circle"></i> Detalhes do Paciente
                            </a>
                            <a
                                href="#"
                                class="dropdown-item"
                                data-toggle="modal"
                                data-target="#paciente-modal-{{ $paciente->id }}-show"
                            >
                                <i class="fas fa-window-restore"></i> Dados Cadastrais
                            </a>

                            @push('modals')
                                @includeIf('admin.pacientes.partials.paciente-modal-show', $paciente)
                            @endpush

                            <a href="{{  route('admin.pacientes.edit', $paciente) }}" class="dropdown-item">
                                <i class="fas fa-edit"></i> Editar Dados Cadastrais
                            </a>

                        {{-- </div> --}}
                    </div>
                </td>
            </tr>
        @empty
        @endforelse
    </x-admin.table>
</x-app-layout>
