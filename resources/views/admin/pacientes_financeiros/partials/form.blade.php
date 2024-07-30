<x-admin.form :title="$title" :subtitle="$subtitle" :action="$action" :method="$method" :routeBack="$routeBack"
    :buttonText="$buttonText" :model="$pacienteFinanceiro">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>* Modalidade de Pagamento</label>
                <x-admin.form-select name="modalidade_pagamento_id" id="modalidade_pagamento_id"
                    class="form-control {{ $errors->has('modalidade_pagamento_id') ? 'is-invalid' : '' }}"
                    :options="$modalidades_pagamentos" selected="{{ old('modalidade_pagamento_id') }}" />
                <span class="text-danger">{{ $errors->first('modalidade_pagamento_id') }}</span>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>* Frequência de Pagamento</label>
            <x-admin.form-select name="frequencias_pagamentos_id" id="frequencias_pagamentos_id"
                class="form-control {{ $errors->has('frequencias_pagamentos_id') ? 'is-invalid' : '' }}"
                :options="$frequencias_pagamentos" selected="{{ old('frequencias_pagamentos_id') }}" />
            <span class="text-danger">{{ $errors->first('frequencias_pagamentos_id') }}</span>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>* Forma de Pagamento</label>
                <x-admin.form-select name="formas_pagamentos_id" id="formas_pagamentos_id"
                    class="form-control {{ $errors->has('formas_pagamentos_id') ? 'is-invalid' : '' }}"
                    :options="$formas_pagamentos" selected="{{ old('formas_pagamentos_id') }}" />
                <span class="text-danger">{{ $errors->first('formas_pagamentos_id') }}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>* Status de Pagamento</label>
                <x-admin.form-select name="status_pagamentos_id" id="status_pagamentos_id"
                    class="form-control {{ $errors->has('status_pagamentos_id') ? 'is-invalid' : '' }}"
                    :options="$status_pagamentos" selected="{{ old('status_pagamentos_id') }}" />
                <span class="text-danger">{{ $errors->first('status_pagamentos_id') }}</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>* Status de Presença</label>
                <x-admin.form-select name="status_presencas_id" id="status_presencas_id"
                    class="form-control {{ $errors->has('status_presencas_id') ? 'is-invalid' : '' }}"
                    :options="$status_presencas" selected="{{ old('status_presencas_id') }}" />
                <span class="text-danger">{{ $errors->first('status_presencas_id') }}</span>
            </div>
        </div>
    </div>

</x-admin.form>
