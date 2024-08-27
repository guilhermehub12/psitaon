<x-admin.form :title="$title" :subtitle="$subtitle" :action="$action" :method="$method" :routeBack="$routeBack"
    :buttonText="$buttonText" :model="$pacienteProntuarioQueixa">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <x-admin.form-label for="inicio" class="form-label" name="Início" required />
                <x-admin.form-textarea name="inicio" id="inicio"
                    class="form-control {{ $errors->has('inicio') ? 'is-invalid' : '' }}" placeholder="Digite a inicio"
                    value="{{ old('inicio') }}" />
                <span class="text-danger">{{ $errors->first('inicio') }}</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <x-admin.form-label for="circunstancias" class="form-label" name="Circunstâncias" required />
                <x-admin.form-textarea name="circunstancias" id="circunstancias"
                    class="form-control {{ $errors->has('circunstancias') ? 'is-invalid' : '' }}"
                    placeholder="Digite a circunstancias" value="{{ old('circunstancias') }}" />
                <span class="text-danger">{{ $errors->first('circunstancias') }}</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <x-admin.form-label for="desenvolvimento" class="form-label" name="Desenvolvimento" required />
                <x-admin.form-textarea name="desenvolvimento" id="desenvolvimento"
                    class="form-control {{ $errors->has('desenvolvimento') ? 'is-invalid' : '' }}"
                    placeholder="Digite a desenvolvimento" value="{{ old('desenvolvimento') }}" />
                <span class="text-danger">{{ $errors->first('desenvolvimento') }}</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <x-admin.form-label for="repercussao" class="form-label" name="Repercussão" required />
                <x-admin.form-textarea name="repercussao" id="repercussao"
                    class="form-control {{ $errors->has('repercussao') ? 'is-invalid' : '' }}"
                    placeholder="Digite a repercussao" value="{{ old('repercussao') }}" />
                <span class="text-danger">{{ $errors->first('repercussao') }}</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <x-admin.form-label for="resumos" class="form-label" name="Resumos" required />
                <x-admin.form-textarea name="resumos" id="resumos"
                    class="form-control {{ $errors->has('resumos') ? 'is-invalid' : '' }}"
                    placeholder="Digite a resumos" value="{{ old('resumos') }}" />
                <span class="text-danger">{{ $errors->first('resumos') }}</span>
            </div>
        </div>
    </div>

</x-admin.form>
