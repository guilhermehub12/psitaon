<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb icon="fas fa-tachometer-alt" title="Painel" />
    </x-slot>

    <div class="container">
        {{-- <div class="row justify-content-center mb-2">
            <div style="background-color: #B99470; border-radius: 15px;">
                <img src="{{ Vite::asset('resources/images/logo_grande.png') }}" alt="">
            </div>
        </div> --}}
        <div class="row justify-content-center text-uppercase row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2">
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center mb-3">
                <a href="{{ route('admin.pacientes.index') }}">
                    <div class="card card-module border border-success" style="width: 100%; aspect-ratio: 1;">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center">
                            <div class="icon-module mb-2">
                                <img src="{{ Vite::asset('resources/images/paciente.png') }}" class="card-img-top img-fluid mx-auto d-block mt-2" style="width: 50%;">
                            </div>
                            <h5 class="card-title mb-0">Pacientes</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center mb-3">
                <a href="#">
                    <div class="card card-module border border-success" style="width: 100%; aspect-ratio: 1;">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center">
                            <div class="icon-module mb-2">
                                <img src="{{ Vite::asset('resources/images/financa.png') }}" class="card-img-top img-fluid mx-auto d-block mt-2" style="width: 50%;">
                            </div>
                            <h5 class="card-title mb-0">Financeiro</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center mb-3">
                <a href="#">
                    <div class="card card-module border border-success" style="width: 100%; aspect-ratio: 1;">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center">
                            <div class="icon-module mb-2">
                                <img src="{{ Vite::asset('resources/images/schedule.png') }}" class="card-img-top img-fluid mx-auto d-block mt-2" style="width: 50%;">
                            </div>
                            <h5 class="card-title mb-0">Agenda</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center mb-3">
                <a href="#">
                    <div class="card card-module border border-success" style="width: 100%; aspect-ratio: 1;">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center">
                            <div class="icon-module mb-2">
                                <img src="{{ Vite::asset('resources/images/comunidade.png') }}" class="card-img-top img-fluid mx-auto d-block mt-2" style="width: 50%;">
                            </div>
                            <h5 class="card-title mb-0">Comunidade</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
