<x-admin.form
    :title="$title"
    :subtitle="$subtitle"
    :action="$action"
    :method="$method"
    :routeBack="$routeBack"
    :buttonText="$buttonText"
    :model="$cliente"
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
                    placeholder="Digite o nome do cliente"
                    value="{{ old('nome', $cliente->nome ?? null) }}"
                />
                <span class="text-danger">{{ $errors->first("nome") }}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>* E-mail</label>
                <x-admin.form-input
                    type="text"
                    name="email"
                    id="email"
                    class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                    placeholder="Digite o e-mail do cliente"
                    value="{{  old('email', $cliente->email ?? null) }}"
                />
                <span class="text-danger">{{ $errors->first("email") }}</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Data Nascimento</label>
                <x-admin.form-input
                    type="text"
                    name="data_nascimento"
                    id="data_nascimento"
                    class="form-control mask_date {{ $errors->has('data_nascimento') ? 'is-invalid' : '' }}"
                    placeholder="Digite a data de nascimento"
                    value="{{  old('data_nascimento', $cliente->data_nascimento ?? null) }}"
                />
                <span class="text-danger">{{ $errors->first("data_nascimento") }}</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Telefone</label>
                <x-admin.form-input
                    type="text"
                    name="telefone"
                    id="telefone"
                    class="form-control mask_phone_with_ddd {{ $errors->has('telefone') ? 'is-invalid' : '' }}"
                    placeholder="Digite o telefone"
                    value="{{  old('telefone', $cliente->telefone ?? null) }}"
                />
                <span class="text-danger">{{ $errors->first("telefone") }}</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Celular</label>
                <x-admin.form-input
                    type="text"
                    name="celular"
                    id="celular"
                    class="form-control mask_phone_with_ddd {{ $errors->has('celular') ? 'is-invalid' : '' }}"
                    placeholder="Digite o celular"
                    value="{{  old('celular', $cliente->celular ?? null) }}"
                />
                <span class="text-danger">{{ $errors->first("celular") }}</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Instagram</label>
                <x-admin.form-input
                    type="text"
                    name="instagram"
                    id="instagram"
                    class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}"
                    placeholder="Digite o instagram do cliente"
                    value="{{ old('instagram', $cliente->instagram ?? null) }}"
                />
                <span class="text-danger">{{ $errors->first("instagram") }}</span>
            </div>
        </div>
    </div>
</x-admin.form>
