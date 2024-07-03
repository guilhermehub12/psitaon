<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb icon="fas fa-tachometer-alt" title="Dashboard" />
    </x-slot>

    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-olive">
                <div class="inner">
                    <h3>{{ $clientes->total }}</h3>
                    <p>Clientes</p>
                </div>
                <div class="icon">
                    <i class="fas fa-restroom"></i>
                </div>
                <a href="{{ route('admin.clientes.index') }}" class="small-box-footer">
                    Ir para listagem&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
