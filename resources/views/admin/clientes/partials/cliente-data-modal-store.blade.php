<x-admin.modal-store
    title="Data"
    subtitle="Novo"
    target="cliente-data-modal-{{ $cliente->id }}-store"
    :action="route('admin.clientes.datas.store', $cliente)"
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
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>* Data</label>
                <x-admin.form-input
                    type="text"
                    name="data"
                    id="data"
                    class="form-control mask_date {{ $errors->has('data') ? 'is-invalid' : '' }}"
                    placeholder="Digite a data"
                    value="{{ old('data') }}"
                />
                <span class="text-danger">{{ $errors->first("data") }}</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Observação</label>
                <x-admin.form-textarea
                    name="observacao"
                    id="observacao"
                    class="form-control {{ $errors->has('observacao') ? 'is-invalid' : '' }}"
                    placeholder="Digite a observação"
                    value="{{ old('observacao') }}"
                />
                <span class="text-danger">{{ $errors->first("observacao") }}</span>
            </div>
        </div>
    </div>
</x-admin.modal-store>

@if (
    $errors->has('nome') ||
    $errors->has('data') ||
    $errors->has('observacao')
)
    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function() {
                let modal = '#cliente-data-modal-{{ $cliente->id }}-store';
                $(modal).modal('show');
            });
        </script>
    @endpush
@endif

