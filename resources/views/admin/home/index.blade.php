<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb icon="fas fa-tachometer-alt" title="Painel" />
    </x-slot>

    {{-- <div class="row">
        <div class="col-lg-3 col-6">
            <a href="{{ route('admin.home.index') }}">
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
        <div class="col-lg-3 col-6">
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
        </div>
    </div> --}}

    <div
        class=" row mt-2 justify-content-center row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-2 row-cols-xxl-2">
        <div class="col">
            <div class="card border border-success">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-10 col-lg-10 col-xl-10">
                            <div class="row mb-2">
                                <div class="col">
                                    <strong>Nome:</strong> {{ Auth::user()->nome }}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <strong>Perfil:</strong>
                                    {{ Auth::user()->perfis->pluck('nome')->join(', ') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-lg-2 col-xl-2 text-center">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="fas fa-power-off text-danger fa-3x"></i>
                                    <br>
                                    <strong>Sair</strong>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center text-uppercase row-cols-2 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-4">
        <div class="col justify-content-center text-center">
            <a href="{{ route('admin.pacientes.index') }}">
                <div class="card card-module border border-success">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <div class="icon-module mb-2">
                            <i class="fas fa-user-plus fa-2x"></i>
                        </div>
                        <h5 class="card-title mb-0">Pacientes</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col justify-content-center text-center disabled">
            <a href="#">
                <div class="card card-module border border-success">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <div class="icon-module mb-2">
                            <i class="fas fa-money-bill fa-2x"></i>
                        </div>
                        <h5 class="card-title mb-0">Financeiro</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col justify-content-center text-center">
            <a href="#">
                <div class="card card-module border border-success">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <div class="icon-module mb-2">
                            <i class="fas fa-calendar fa-2x"></i>
                        </div>
                        <h5 class="card-title mb-0">Agenda</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col justify-content-center text-center">
            <a href="#">
                <div class="card card-module border border-success">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <div class="icon-module mb-2">
                            <i class="fas fa-comments fa-2x"></i>
                        </div>
                        <h5 class="card-title mb-0">Comunidade</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>


    {{-- <footer class="footer" style="left: 0; background-color: #00b5e2 !important;">
        <div class="container-fluid">
            <div class="row">
                <div class="col text-white text-center">
                    <strong>Controladoria e Ouvidoria Geral do Município - CGM</strong>
                    <br>
                    <strong>&copy; 2022 - Fortaleza no controle</strong>
                </div>
            </div>
        </div>
    </footer> --}}


</x-app-layout>
