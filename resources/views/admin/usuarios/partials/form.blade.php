<x-admin.form
    :title="$title"
    :subtitle="$subtitle"
    :action="$action"
    :method="$method"
    :routeBack="$routeBack"
    :buttonText="$buttonText"
    :model="$model"
>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>* Nome</label>
                <x-admin.form-input
                    type="text"
                    name="nome"
                    id="nome"
                    class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}"
                    placeholder="Digite o nome do usuário"
                    value="{{ old('nome', $usuario->nome ?? null) }}"
                />
                <span class="text-danger">{{ $errors->first("nome") }}</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>* E-mail</label>
                <x-admin.form-input
                    type="text"
                    name="email"
                    id="email"
                    class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                    placeholder="Digite o e-mail do usuário"
                    value="{{  old('email', $usuario->email ?? null) }}"
                />
                <span class="text-danger">{{ $errors->first("email") }}</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>* Perfil</label>
                <x-admin.form-select
                    name="perfil_id"
                    id="perfil_id"
                    class="form-control {{ $errors->has('perfil_id') ? 'is-invalid' : '' }}"
                    :options="$perfis"
                    selected="{{ old('perfil_id', isset($usuario) ? $usuario->perfis->first()->id : '') }}"
                />
                <span class="text-danger">{{ $errors->first("perfil_id") }}</span>
            </div>
        </div>
    </div>
</x-admin.form>
