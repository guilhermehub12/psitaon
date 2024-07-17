<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb
            icon="fas fa-box"
            title="Pacientes"
            :links="[
                'Pacientes',
                'Produto Detalhe'
            ]"
        />
    </x-slot>

    @includeIf('admin.pacientes.partials.paciente', [
        "paciente" => $paciente
    ])

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4">
        <div class="col mb-4">
            <div class="card h-100">
                <img src="{{ Vite::asset('resources/images/ingredient.png') }}" class="card-img-top img-fluid mx-auto d-block mt-2" style="width: 25%;">
                <div class="card-body text-uppercase">
                    <p class="card-text text-center font-weight-bold">
                        Responsáveis
                    </p>
                    <p class="card-text text-center">
                        <a href="{{  route('admin.pacientes.adicionais.create', $paciente) }}" class="btn btn-lila btn-block">
                            <i class="fas fa-plus-circle"></i> Adicionar
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card h-100">
                <img src="{{ Vite::asset('resources/images/baking.png') }}" class="card-img-top img-fluid mx-auto d-block mt-2" style="width: 25%;">
                <div class="card-body text-uppercase">
                    <p class="card-text text-center font-weight-bold">
                        Prontuários
                    </p>
                    <p class="card-text text-center">
                        <a href="{{  route('admin.pacientes.modelos.create', $paciente) }}" class="btn btn-lila btn-block">
                            <i class="fas fa-plus-circle"></i> Adicionar
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card h-100">
                <img src="{{ Vite::asset('resources/images/candy.png') }}" class="card-img-top img-fluid mx-auto d-block mt-2" style="width: 25%;">
                <div class="card-body text-uppercase">
                    <p class="card-text text-center font-weight-bold">
                        Agenda
                    </p>
                    <p class="card-text text-center">
                        <a href="{{  route('admin.pacientes.sabores.create', $paciente) }}" class="btn btn-lila btn-block">
                            <i class="fas fa-plus-circle"></i> Adicionar
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card h-100">
                <img src="{{ Vite::asset('resources/images/measure.png') }}" class="card-img-top img-fluid mx-auto d-block mt-2" style="width: 25%;">
                <div class="card-body text-uppercase">
                    <p class="card-text text-center font-weight-bold">
                        Financeiro
                    </p>
                    <p class="card-text text-center">
                        <a href="{{  route('admin.pacientes.tamanhos.create', $paciente) }}" class="btn btn-lila btn-block">
                            <i class="fas fa-plus-circle"></i> Adicionar
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
