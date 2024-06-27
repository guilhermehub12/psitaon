<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb
            icon="fas fa-user"
            title="Usuários"
            :links="[
                'Usuários',
                'Novo Usuário'
            ]"
        />
    </x-slot>

    @includeIf('admin.usuarios.partials.form', [
        "title" => "Usuário",
        "subtitle" => "Novo",
        "action" => route('admin.usuarios.store'),
        "method" => "POST",
        "routeBack" => route('admin.usuarios.index'),
        "buttonText" => "Salvar",
        "usuario" => null
    ])
</x-app-layout>
