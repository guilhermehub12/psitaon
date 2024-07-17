<x-admin.form
    :title="$title"
    :subtitle="$subtitle"
    :action="$action"
    :method="$method"
    :routeBack="$routeBack"
    :buttonText="$buttonText"
    :model="$paciente"
>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>* Nome</label>
                <x-admin.form-input
                    type="text"
                    name="nome"
                    id="nome"
                    class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}"
                    placeholder="Digite o nome do paciente"
                    value="{{ old('nome', $paciente->nome ?? null) }}"
                />
                <span class="text-danger">{{ $errors->first("nome") }}</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>* Data de Nascimento</label>
                <x-admin.form-input
                    type="text"
                    name="data_nascimento"
                    id="data_nascimento"
                    class="form-control mask_date {{ $errors->has('data_nascimento') ? 'is-invalid' : '' }}"
                    placeholder="Digite o data de nascimento do paciente"
                    value="{{ old('data_nascimento', $paciente->data_nascimento ?? null) }}"
                />
                <span class="text-danger">{{ $errors->first("data_nascimento") }}</span>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>* Gênero</label>
                <x-admin.form-input
                    type="text"
                    name="genero"
                    id="genero"
                    class="form-control {{ $errors->has('genero') ? 'is-invalid' : '' }}"
                    placeholder="Digite o genero do paciente"
                    value="{{ old('genero', $paciente->genero ?? null) }}"
                />
                <span class="text-danger">{{ $errors->first("genero") }}</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>* Escolaridade</label>
                <x-admin.form-input
                    type="text"
                    name="escolaridade"
                    id="escolaridade"
                    class="form-control {{ $errors->has('escolaridade') ? 'is-invalid' : '' }}"
                    placeholder="Digite a escolaridade do paciente"
                    value="{{ old('escolaridade', $paciente->escolaridade ?? null) }}"
                />
                <span class="text-danger">{{ $errors->first("escolaridade") }}</span>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>* Profissão</label>
                <x-admin.form-input
                    type="text"
                    name="profissao"
                    id="profissao"
                    class="form-control {{ $errors->has('profissao') ? 'is-invalid' : '' }}"
                    placeholder="Digite o profissao do paciente"
                    value="{{ old('profissao', $paciente->profissao ?? null) }}"
                />
                <span class="text-danger">{{ $errors->first("profissao") }}</span>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>* Estado Civil</label>
                <x-admin.form-input
                    type="text"
                    name="estado_civil"
                    id="estado_civil"
                    class="form-control {{ $errors->has('estado_civil') ? 'is-invalid' : '' }}"
                    placeholder="Digite a estado_civil do paciente"
                    value="{{ old('estado_civil', $paciente->estado_civil ?? null) }}"
                />
                <span class="text-danger">{{ $errors->first("estado_civil") }}</span>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>* Endereço</label>
                <x-admin.form-input
                    type="text"
                    name="endereco"
                    id="endereco"
                    class="form-control {{ $errors->has('endereco') ? 'is-invalid' : '' }}"
                    placeholder="Digite o endereço do paciente"
                    value="{{ old('endereco', $paciente->endereco ?? null) }}"
                />
                <span class="text-danger">{{ $errors->first("endereco") }}</span>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>* Contato</label>
                <x-admin.form-input
                    type="text"
                    name="telefone"
                    id="telefone"
                    class="form-control {{ $errors->has('telefone') ? 'is-invalid' : '' }}"
                    placeholder="Digite o telefone do paciente"
                    value="{{ old('telefone', $paciente->telefone ?? null) }}"
                />
                <span class="text-danger">{{ $errors->first("telefone") }}</span>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>* E-mail</label>
                <x-admin.form-input
                    type="text"
                    name="email"
                    id="email"
                    class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                    placeholder="Digite o endereço do paciente"
                    value="{{ old('email', $paciente->email ?? null) }}"
                />
                <span class="text-danger">{{ $errors->first("email") }}</span>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>* Nome do pai</label>
                <x-admin.form-input
                    type="text"
                    name="nome_pai"
                    id="nome_pai"
                    class="form-control {{ $errors->has('nome_pai') ? 'is-invalid' : '' }}"
                    placeholder="Digite o nome_pai do paciente"
                    value="{{ old('nome_pai', $paciente->nome_pai ?? null) }}"
                />
                <span class="text-danger">{{ $errors->first("nome_pai") }}</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>* Nome da mãe</label>
                <x-admin.form-input
                    type="text"
                    name="nome_mae"
                    id="nome_mae"
                    class="form-control {{ $errors->has('nome_mae') ? 'is-invalid' : '' }}"
                    placeholder="Digite o nome_mae do paciente"
                    value="{{ old('nome_mae', $paciente->nome_mae ?? null) }}"
                />
                <span class="text-danger">{{ $errors->first("nome_mae") }}</span>
            </div>
        </div>
    </div>
</x-admin.form>
