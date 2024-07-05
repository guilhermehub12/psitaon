<x-admin.form
    :title="$title"
    :subtitle="$subtitle"
    :action="$action"
    :method="$method"
    :routeBack="$routeBack"
    :buttonText="$buttonText"
    :model="$produtoTamanho"
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
                    placeholder="Digite o tamanho"
                    value="{{ old('nome', $produtoTamanho->nome ?? null) }}"
                />
                <span class="text-danger">{{ $errors->first("nome") }}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>* Preço</label>
                <x-admin.form-input
                    type="text"
                    name="preco"
                    id="preco"
                    class="form-control mask_decimal {{ $errors->has('preco') ? 'is-invalid' : '' }}"
                    placeholder="Digite o preço para o tamanho"
                    value="{{ old('preco', $produtoTamanho->preco ?? null) }}"
                />
                <span class="text-danger">{{ $errors->first("preco") }}</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>* Descrição</label>
                <x-admin.form-textarea
                    name="descricao"
                    id="descricao"
                    class="form-control {{ $errors->has('descricao') ? 'is-invalid' : '' }}"
                    placeholder="Digite a descrição"
                    value="{{ old('descricao') }}"
                />
                <span class="text-danger">{{ $errors->first("descricao") }}</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Observação</label>
                <x-admin.form-textarea
                    name="observacao"
                    id="observacao"
                    class="form-control {{ $errors->has('observacao') ? 'is-invalid' : '' }}"
                    placeholder="Digite a observação"
                    value="{{ old('observacao') }}"
                />
                <span class="text-danger">{{ $errors->first("observacao") }}</span>
            </div>
        </div>
    </div>
</x-admin.form>
