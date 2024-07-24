<x-admin.modal-store
    title="Data"
    subtitle="Novo"
    target="paciente-responsavel-modal-{{ $responsavel->id }}-store"
    :action="route('admin.pacientes.responsaveis.store', $responsavel)"
    size="lg"
>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>* Nome</label>
                <x-admin.form-input
                    type="text"
                    name="nome"
                    id="nome"
                    class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}"
                    placeholder="Digite um nome para a data"
                    value="{{ old('nome') }}"
                />
                <span class="text-danger">{{ $errors->first("nome") }}</span>
            </div>
        </div>
    </div>
</x-admin.modal-store>

@if (
    $errors->has('nome') ||
    $errors->has('contato') ||
    $errors->has('email') ||
    $errors->has('grau_parentesco') ||
    $errors->has('tipo_responsavel_id')
)
    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function() {
                let modal = '#paciente-responsavel-modal-{{ $responsavel->id }}-store';
                $(modal).modal('show');
            });
        </script>
    @endpush
@endif
