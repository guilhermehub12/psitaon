<x-admin.form :title="$title" :subtitle="$subtitle" :action="$action" :method="$method" :routeBack="$routeBack"
    :buttonText="$buttonText" :model="$pacienteFinanceiro">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>* Modalidade de Pagamento</label>
                <select name="modalidade_pagamento_id"
                        id="modalidade_pagamento_id"
                        class="form-control {{ $errors->has('modalidade_pagamento_id') ? 'is-invalid' : '' }}">
                    @foreach ($modalidades_pagamentos as $name)
                        <option value="{{ $name }}"
                            {{ old('modalidade_pagamento_id') == $name ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
                <span class="text-danger">{{ $errors->first('modalidade_pagamento_id') }}</span>
            </div>
        </div>
    </div>

    <div id="optional-fields" style="display: none;">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>* Frequência de Pagamento</label>
                    <x-admin.form-select name="frequencia_pagamento_id" id="frequencia_pagamento_id"
                        class="form-control {{ $errors->has('frequencia_pagamento_id') ? 'is-invalid' : '' }}"
                        :options="$frequencias_pagamentos" selected="{{ old('frequencia_pagamento_id') }}" />
                    <span class="text-danger">{{ $errors->first('frequencia_pagamento_id') }}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>* Forma de Pagamento</label>
                    <x-admin.form-select name="forma_pagamento_id" id="forma_pagamento_id"
                        class="form-control {{ $errors->has('forma_pagamento_id') ? 'is-invalid' : '' }}"
                        :options="$formas_pagamentos" selected="{{ old('forma_pagamento_id') }}" />
                    <span class="text-danger">{{ $errors->first('forma_pagamento_id') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>* Status de Pagamento</label>
                    <x-admin.form-select name="status_pagamento_id" id="status_pagamento_id"
                        class="form-control {{ $errors->has('status_pagamento_id') ? 'is-invalid' : '' }}"
                        :options="$status_pagamentos" selected="{{ old('status_pagamento_id') }}" />
                    <span class="text-danger">{{ $errors->first('status_pagamento_id') }}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>* Status de Presença</label>
                    <x-admin.form-select name="status_presenca_id" id="status_presenca_id"
                        class="form-control {{ $errors->has('status_presenca_id') ? 'is-invalid' : '' }}"
                        :options="$status_presencas" selected="{{ old('status_presenca_id') }}" />
                    <span class="text-danger">{{ $errors->first('status_presenca_id') }}</span>
                </div>
            </div>
        </div>
    </div>
</x-admin.form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#modalidade_pagamento_id').change(function() {
            toggleFields();
        });

        function toggleFields() {
            const modalidade = $('#modalidade_pagamento_id').val();

            if (modalidade.toLowerCase() === 'convênio') { // Ajuste para o valor legível
                $('#optional-fields').show();
            } else {
                $('#optional-fields').hide();
            }
        }

        // Inicializa o estado dos campos
        toggleFields();
    });
</script>
