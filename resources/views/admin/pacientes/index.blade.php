<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb icon="fas fa-box" title="Pacientes" />
    </x-slot>

    <div class="row mb-3">
        <div class="col-md-2 offset-md-10">
            <a href="{{ route('admin.pacientes.create') }}" class="btn btn-lila btn-block text-uppercase font-weight-bold">
                <i class="fas fa-plus-circle"></i> Paciente
            </a>
        </div>
    </div>

    <x-admin.table
        title="Pacientes"
        subtitle="Listagem"
        :headers="['Nome', 'Data de Nascimento', 'Gênero', 'Profissão', 'Telefone', 'Ações']"
        :records="$pacientes"
    >
        @forelse ($pacientes as $paciente)
            <tr class="text-center">
                <td class="align-middle">
                    {{ $paciente->nome }}
                </td>
                <td class="align-middle">
                    {{ $paciente->data_nascimento }}
                </td>
                <td class="align-middle">
                    {{ $paciente->genero }}
                </td>
                <td class="align-middle">
                    {{ $paciente->profissao }}
                </td>
                <td class="align-middle">
                    {{ $paciente->telefone }}
                </td>
                <td class="align-middle text-uppercase">
                    <div class="dropdown dropright">
                        <button
                            id="dropdown-{{ $paciente->id }}"
                            class="btn btn-lila dropdown-toggle"
                            type="button"
                            data-toggle="dropdown"
                            aria-expanded="false"
                        >
                            <i class="fas fa-cog"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdown-{{ $paciente->id }}">
                            <a
                                href="#"
                                class="dropdown-item"
                                data-toggle="modal"
                                data-target="#paciente-modal-{{ $paciente->id }}-show"
                            >
                                <i class="fas fa-window-restore"></i> Visualizar
                            </a>

                            @push('modals')
                                @includeIf('admin.pacientes.partials.paciente-modal-show', $paciente)
                            @endpush

                            <a href="{{  route('admin.pacientes.edit', $paciente) }}" class="dropdown-item">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <a href="{{  route('admin.pacientes.show', $paciente) }}" class="dropdown-item">
                                <i class="fas fa-info-circle"></i> Detalhes
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
        @empty
        @endforelse
    </x-admin.table>
</x-app-layout>
