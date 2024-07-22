<x-admin.form
    :title="$title"
    :subtitle="$subtitle"
    :action="$action"
    :method="$method"
    :routeBack="$routeBack"
    :buttonText="$buttonText"
    :model="$responsavel"
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
                    placeholder="Digite o adicional"
                    value="{{ old('nome', $responsavel->nome ?? null) }}"
                />
                <span class="text-danger">{{ $errors->first("nome") }}</span>
            </div>
        </div>
        
</x-admin.form>
