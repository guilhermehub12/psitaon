<x-admin.form
    :title="$title"
    :subtitle="$subtitle"
    :action="$action"
    :method="$method"
    :routeBack="$routeBack"
    :buttonText="$buttonText"
    :model="$produto"
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
                    placeholder="Digite o nome do produto"
                    value="{{ old('nome', $produto->nome ?? null) }}"
                />
                <span class="text-danger">{{ $errors->first("nome") }}</span>
            </div>
            <div class="form-group">
                <label>* Descrição</label>
                <x-admin.form-input
                    type="text"
                    name="descricao"
                    id="descricao"
                    class="form-control {{ $errors->has('descricao') ? 'is-invalid' : '' }}"
                    placeholder="Digite o descricao do produto"
                    value="{{ old('descricao', $produto->descricao ?? null) }}"
                />
                <span class="text-danger">{{ $errors->first("descricao") }}</span>
            </div>
        </div>
    </div>
</x-admin.form>
