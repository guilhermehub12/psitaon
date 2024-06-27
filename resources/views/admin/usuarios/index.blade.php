<x-app-layout>
    <x-admin.breadcrumb icon="fas fa-map" title="Usuários" />

    <div class="row mb-3">
        <div class="col-md-2 offset-md-10">
            <a href="{{  route('admin.usuarios.create') }}" class="btn btn-lila btn-block text-uppercase font-weight-bold">
                <i class="fas fa-plus-circle"></i> Usuário
            </a>
        </div>
    </div>

    <x-admin.table
        title="Usuários"
        subtitle="Listagem"
        :headers="['Nome', 'E-mail', 'Perfil', 'Ações']"
        :records="$usuarios"
    >
        @forelse ($usuarios as $usuario)
            <tr class="text-center">
                <td class="align-middle">{{ $usuario->nome }}</td>
                <td class="align-middle">{{ $usuario->email }}</td>
                <td class="align-middle">{{ $usuario->perfis->first()->nome }}</td>
                <td class="align-middle">
                    <div class="dropdown dropright">
                        <button
                            id="dropdown-{{ $usuario->id }}"
                            class="btn btn-lila dropdown-toggle"
                            type="button"
                            data-toggle="dropdown"
                            aria-expanded="false"
                        >
                            <i class="fas fa-cog"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdown-{{ $usuario->id }}">
                            <a href="{{  route('admin.usuarios.edit', $usuario) }}" class="dropdown-item">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
        @empty
        @endforelse
    </x-admin.table>
</x-app-layout>
