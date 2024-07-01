<x-admin.modal-create
    title="Data"
    subtitle="Novo"
    target="cliente-data-modal-{{ $cliente->id }}-create"
    :action="route('admin.clientes.datas.store', $cliente)"
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
</x-admin.modal-create>
