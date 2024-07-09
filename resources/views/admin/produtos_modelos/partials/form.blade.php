<x-admin.form
    :title="$title"
    :subtitle="$subtitle"
    :action="$action"
    :method="$method"
    :routeBack="$routeBack"
    :buttonText="$buttonText"
    :model="$produtoModelo"
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
                    placeholder="Digite o modelo"
                    value="{{ old('nome') }}"
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
                    placeholder="Digite o preço para o modelo"
                    value="{{ old('preco') }}"
                />
                <span class="text-danger">{{ $errors->first("preco") }}</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>* Descrição Resumida</label>
                <x-admin.form-textarea
                    name="descricao_resumida"
                    id="descricao_resumida"
                    class="form-control {{ $errors->has('descricao_resumida') ? 'is-invalid' : '' }}"
                    placeholder="Digite a descrição resumida"
                    value="{{ old('descricao_resumida') }}"
                />
                <span class="text-danger">{{ $errors->first("descricao_resumida") }}</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>* Descrição Completa</label>
                <x-admin.form-textarea
                    name="descricao_completa"
                    id="descricao_completa"
                    class="form-control {{ $errors->has('descricao_completa') ? 'is-invalid' : '' }}"
                    placeholder="Digite a descrição completa"
                    value="{{ old('descricao_completa') }}"
                />
                <span class="text-danger">{{ $errors->first("descricao_completa") }}</span>
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
