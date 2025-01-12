<x-admin.form :title="$title" :subtitle="$subtitle" :action="$action" :method="$method" :routeBack="$routeBack"
    :buttonText="$buttonText" :model="$pacienteResponsavel">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>* Nome</label>
                <x-admin.form-input type="text" name="nome" id="nome"
                    class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}"
                    placeholder="Digite o nome do responsável" value="{{ old('nome') }}" />
                <span class="text-danger">{{ $errors->first('nome') }}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>* Contato</label>
                <x-admin.form-input type="text" name="contato" id="contato"
                    class="form-control mask_phone_with_ddd {{ $errors->has('contato') ? 'is-invalid' : '' }}"
                    placeholder="Digite o contato do responsável" value="{{ old('contato') }}" />
                <span class="text-danger">{{ $errors->first('contato') }}</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>* E-mail</label>
                <x-admin.form-input type="text" name="email" id="email"
                    class="form-control mask_email {{ $errors->has('email') ? 'is-invalid' : '' }}"
                    placeholder="Digite o e-mail do responsável" value="{{ old('email') }}" />
                <span class="text-danger">{{ $errors->first('email') }}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>* Grau de Parentesco</label>
                <x-admin.form-input type="text" name="grau_parentesco" id="grau_parentesco"
                    class="form-control {{ $errors->has('grau_parentesco') ? 'is-invalid' : '' }}"
                    placeholder="Digite o grau de parentesco do responsável" value="{{ old('grau_parentesco') }}" />
                <span class="text-danger">{{ $errors->first('grau_parentesco') }}</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>* Tipo de Responsável</label>
                <x-admin.form-select
                    name="tipo_responsavel_id"
                    id="tipo_responsavel_id"
                    class="form-control {{ $errors->has('tipo_responsavel_id') ? 'is-invalid' : '' }}"
                    :options="$tipos_responsaveis"
                    selected="{{ old('tipo_responsavel_id') }}"
                />
                <span class="text-danger">{{ $errors->first("tipo_responsavel_id") }}</span>
            </div>
        </div>
    </div>

</x-admin.form>
