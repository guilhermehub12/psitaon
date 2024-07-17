<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb icon="fas fa-tachometer-alt" title="Painel" />
    </x-slot>

    <div class="row">
        <div class="col-lg-3 col-6">
            <a href="{{ route('admin.pacientes.index') }}">
                <div class="small-box bg-info">
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <div class="inner">
                        <h3>Pacientes</h3>
                        <p>Mais informações</p>
                    </div>
                </div>
            </a>
        </div>
        {{-- <div class="col-lg-3 col-6">
            <a href="{{ route('admin.home.index') }}">
                <div class="small-box bg-info">
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <div class="inner">
                        <h3>Financeiro</h3>
                        <p>Mais informações</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-6">
            <a href="{{ route('admin.home.index') }}">
                <div class="small-box bg-info">
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <div class="inner">
                        <h3>Agenda</h3>
                        <p>Mais informações</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-6">
            <a href="{{ route('admin.home.index') }}">
                <div class="small-box bg-info">
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <div class="inner">
                        <h3>Comunidade</h3>
                        <p>Mais informações</p>
                    </div>
                </div>
            </a>
        </div> --}}
    </div>
</x-app-layout>
