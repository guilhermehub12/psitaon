<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb icon="fas fa-tachometer-alt" title="Dashboard" />
    </x-slot>

    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-olive">
                <div class="inner">
                    <h3>5</h3>
                    <p>Pacientes</p>
                </div>
                <div class="icon">
                    <i class="fas fa-restroom"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Ir para listagem&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>5</h3>
                    <p>Financeiro</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Ir para listagem&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>5</h3>
                    <p>Agenda</p>
                </div>
                <div class="icon">
                    <i class="fas fa-cookie"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Ir para listagem&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
