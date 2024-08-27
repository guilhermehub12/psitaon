<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb icon="fas fa-tachometer-alt" title="Painel" />
    </x-slot>

    <div class="container d-flex justify-content-center align-items-center min-vh-80">
        <div class="row row-cols-1">
            <div class="col">
                <a href="#">
                    <div class="card text-center border border-success zoom-card">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <img src="{{ Vite::asset('resources/images/paciente.png') }}" style="width: 150px; height: 150px;" class="card-img-top mx-auto" alt="Pacientes">
                            <h5 class="card-title mt-2">Estados</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <style>
        .zoom-card {
            transition: transform 0.3s ease;
        }
        .zoom-card:hover {
            transform: scale(1.05);
        }
    </style>

</x-app-layout>
