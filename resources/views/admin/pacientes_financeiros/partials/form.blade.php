<x-admin.form :title="$title" :subtitle="$subtitle" :action="$action" :method="$method" :routeBack="$routeBack"
    :buttonText="$buttonText" :model="$pacienteFinanceiro">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>* Modalidade de Pagamento</label>
                <x-admin.form-select
                    name="modalidade_pagamento_id"
                    id="modalidade_pagamento_id"
                    class="form-control {{ $errors->has('modalidade_pagamento_id') ? 'is-invalid' : '' }}"
                    :options="$modalidades_pagamentos"
                    selected="{{ old('modalidade_pagamento_id') }}"
                />
                <span class="text-danger">{{ $errors->first("modalidade_pagamento_id") }}</span>
            </div>
        </div>
    </div>

</x-admin.form>
