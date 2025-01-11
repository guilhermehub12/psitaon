<div class="row">
    <div class="col">
        <div class="card shadow-none">
            <div class="card-body">
                <div class="row gx-1" style="background: #FFE699;">
                    <div class="col-12 fw-bold d-flex justify-content-center align-items-center text-uppercase p-1 border border-dark">
                        Queixa
                    </div>
                </div>
                <div class="row gx-1">
                    <div class="col-3 p-1 fw-bold border border-dark border-top-0 d-flex justify-content-center align-items-center" style="background: #FFC000;">
                        Início da queixa:
                    </div>
                    <div class="col-9 p-1 border border-dark border-top-0 border-start-0 d-flex align-items-center" style="background: #D9D9D9;">
                        {{ $pacienteProntuarioQueixa->inicio }}
                    </div>
                </div>
                <div class="row gx-1">
                    <div class="col-3 p-1 fw-bold border border-dark border-top-0 d-flex justify-content-center align-items-center" style="background: #FFC000;">
                        Circunstância da queixa:
                    </div>
                    <div class="col-9 p-1 border border-dark border-top-0 border-start-0 d-flex align-items-center" style="background: #D9D9D9;">
                        {{ $pacienteProntuarioQueixa->circunstancias }}
                    </div>
                </div>
                <div class="row gx-1">
                    <div class="col-3 p-1 fw-bold border border-dark border-top-0 d-flex justify-content-center align-items-center" style="background: #FFC000;">
                        Desenvolvimento da queixa:
                    </div>
                    <div class="col-9 p-1 border border-dark border-top-0 border-start-0 d-flex align-items-center" style="background: #D9D9D9;">
                        {{ $pacienteProntuarioQueixa->desenvolvimento }}
                    </div>
                </div>
                <div class="row gx-1">
                    <div class="col-3 p-1 fw-bold border border-dark border-top-0 d-flex justify-content-center align-items-center" style="background: #FFC000;">
                        Repercussão da queixa:
                    </div>
                    <div class="col-9 p-1 border border-dark border-top-0 border-start-0 d-flex align-items-center" style="background: #D9D9D9;">
                        {{ $pacienteProntuarioQueixa->repercussao }}
                    </div>
                </div>
                <div class="row gx-1">
                    <div class="col-3 p-1 fw-bold border border-dark border-top-0 d-flex justify-content-center align-items-center" style="background: #FFC000;">
                        Resumos da queixa:
                    </div>
                    <div class="col-9 p-1 border border-dark border-top-0 border-start-0 d-flex align-items-center" style="background: #D9D9D9;">
                        {{ $pacienteProntuarioQueixa->resumos }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>