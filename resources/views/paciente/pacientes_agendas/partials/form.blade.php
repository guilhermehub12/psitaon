<x-admin.form :title="$title" :subtitle="$subtitle" :action="$action" :method="$method" :routeBack="$routeBack"
    :buttonText="$buttonText" :model="$pacienteAgenda">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>* Frequência</label>
                <x-admin.form-select name="frequencia_id" id="frequencia_id"
                    class="form-control {{ $errors->has('frequencia_id') ? 'is-invalid' : '' }}" :options="$frequencias"
                    selected="{{ old('frequencia_id') }}" />
                <span class="text-danger">{{ $errors->first('frequencia_id') }}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>* Horário</label>
                <x-admin.form-input type="time" name="horario" id="horario"
                    class="form-control mask_time {{ $errors->has('horario') ? 'is-invalid' : '' }}"
                    placeholder="Digite o horário marcado" value="{{ old('horario') }}" />
                <span class="text-danger">{{ $errors->first('horario') }}</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>* Data</label>
                <x-admin.form-input type="date" name="dia" id="dia"
                    class="form-control mask_date {{ $errors->has('dia') ? 'is-invalid' : '' }}"
                    placeholder="Digite o dia" value="{{ old('dia') }}" />
                <span class="text-danger">{{ $errors->first('dia') }}</span>
            </div>
        </div>
    </div>

</x-admin.form>
