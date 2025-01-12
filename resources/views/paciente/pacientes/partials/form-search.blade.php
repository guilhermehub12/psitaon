<x-admin.form
    :title="$title"
    :subtitle="$subtitle"
    :action="$action"
    :method="$method"
    :routeBack="$routeBack"
    :buttonText="$buttonText"
    :icon="$icon"
    :model="$model"
>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nome do paciente</label>
                <x-admin.form-input
                    type="text"
                    name="nome"
                    id="nome"
                    class="form-control"
                    placeholder="Digite o nome do paciente"
                    value="{{ request()->query('nome') }}"
                />
            </div>
        </div>
    </div>
</x-admin.form>
