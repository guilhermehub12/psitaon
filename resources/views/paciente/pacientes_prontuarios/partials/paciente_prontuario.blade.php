<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="row" style="background: #FFE699;">
                    <div class="col-12 d-flex justify-content-center align-items-center text-uppercase p-1 border border-dark">
                        <b>Análise do Ambiente (Matriz SWOT)</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 p-1 border border-dark border-top-0 d-flex justify-content-center align-items-center" style="background: #FFC000;">
                        <b>Ambiente interno</b>
                    </div>
                    <div class="col-10">
                        <div class="row">
                            <div class="col-2 p-1 border border-dark border-start-0 border-top-0 d-flex justify-content-center align-items-center" style="background: #ffd966;">
                                Fortalezas
                            </div>
                            <div class="col-10 p-1 border border-dark border-top-0 border-start-0 d-flex align-items-center" style="background: #FFF2CC;">
                                <div>
                                    {!! $atividadeAnaliseAmbiente->forca !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2 p-1 border border-dark border-start-0 border-top-0 d-flex justify-content-center align-items-center" style="background: #ffd966;">
                                Fraquezas
                            </div>
                            <div class="col-10 p-1 border border-dark border-top-0 border-start-0 d-flex align-items-center" style="background: #FFF2CC;">
                                <div>
                                    {!! $atividadeAnaliseAmbiente->fraqueza !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
