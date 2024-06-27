<x-app-layout>
    <x-admin.breadcrumb
        icon="fas fa-user"
        title="Usuários"
        :links="[
            'Usuários',
            'Novo Usuário'
        ]"
    />

    @includeIf('admin.usuarios.partials.form', [
        "title" => "Usuário",
        "subtitle" => "Novo",
        "action" => route('admin.usuarios.store'),
        "method" => "POST",
        "routeBack" => route('admin.usuarios.index'),
        "buttonText" => "Salvar",
        "model" => null
    ])
</x-app-layout>
