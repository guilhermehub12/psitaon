<x-admin.form :title="$title" :subtitle="$subtitle" :action="$action" :method="$method" :routeBack="$routeBack"
    :buttonText="$buttonText" :model="$pacienteProntuario">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <x-admin.form-label for="queixa_inicial" class="form-label" name="Queixa Inicial" required />
                <x-admin.form-textarea name="queixa_inicial" id="queixa_inicial"
                    class="form-control {{ $errors->has('queixa_inicial') ? 'is-invalid' : '' }}" placeholder="Digite o que o motivou a procurar o serviço psicológico"
                    value="{{ old('queixa_inicial') }}" />
                <span class="text-danger">{{ $errors->first('queixa_inicial') }}</span>
            </div>
        </div>
    </div>

</x-admin.form>
