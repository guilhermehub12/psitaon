<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb
            icon="fas fa-user"
            title="Usuários"
            :links="[
                'Usuários',
                'Editar Usuário'
            ]"
        />
    </x-slot>

    @includeIf('admin.usuarios.partials.form', [
        "title" => "Usuário",
        "subtitle" => "Edição",
        "action" => route('admin.usuarios.update', $usuario),
        "method" => "PUT",
        "routeBack" => route('admin.usuarios.index'),
        "buttonText" => "Atualizar",
        "usuario" => $usuario
    ])
</x-app-layout>
