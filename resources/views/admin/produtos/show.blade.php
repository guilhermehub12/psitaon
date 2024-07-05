<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb
            icon="fas fa-box"
            title="Produtos"
            :links="[
                'Produtos',
                'Produto Detalhe'
            ]"
        />
    </x-slot>

    @includeIf('admin.produtos.partials.produto', [
        "produto" => $produto
    ])

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4">
        <div class="col mb-4">
            <div class="card h-100">
                <img src="{{ Vite::asset('resources/images/measure.png') }}" class="card-img-top img-fluid mx-auto d-block mt-2" style="width: 25%;">
                <div class="card-body text-uppercase">
                    <p class="card-text text-center font-weight-bold">
                        Tamanhos
                    </p>
                    <p class="card-text text-center">
                        Adicione os tamanhos
                    </p>
                    <p class="card-text text-center">
                        <a href="{{  route('admin.produtos.tamanhos.create', $produto) }}" class="btn btn-lila btn-block">
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
                        Sabores
                    </p>
                    <p class="card-text text-center">
                        Adicione os sabores
                    </p>
                    <p class="card-text text-center">
                        <a href="{{  route('admin.produtos.sabores.create', $produto) }}" class="btn btn-lila btn-block">
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
                        Modelos
                    </p>
                    <p class="card-text text-center">
                        Adicione os modelos
                    </p>
                    <p class="card-text text-center">
                        <a href="{{  route('admin.produtos.sabores.create', $produto) }}" class="btn btn-lila btn-block">
                            <i class="fas fa-plus-circle"></i> Adicionar
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card h-100">
                <img src="{{ Vite::asset('resources/images/add.png') }}" class="card-img-top img-fluid mx-auto d-block mt-2" style="width: 25%;">
                <div class="card-body text-uppercase">
                    <p class="card-text text-center font-weight-bold">
                        Adicionais
                    </p>
                    <p class="card-text text-center">
                        Extras
                    </p>
                    <p class="card-text text-center">
                        <a href="{{  route('admin.produtos.sabores.create', $produto) }}" class="btn btn-lila btn-block">
                            <i class="fas fa-plus-circle"></i> Adicionar
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
