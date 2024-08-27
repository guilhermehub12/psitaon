<x-app-layout>
    @section('breadcrumb')
        <x-admin.breadcrumb title="Prontuário - Anamnese - Queixa" />
    @endsection

    @section('content')
        @includeIf('gestao_risco.atividades.partials.atividade', [
            'atividade' => $atividade,
            'route' => route('gestao_risco.atividades_analises_riscos.index', $atividade)
        ])
        @includeIf('gestao_risco.atividades_identificacoes_riscos.partials.atividade_identificacao_risco', $atividadeIdentificacaoRisco)
        <div class="row">
            <div class="col-lg-12">
                <x-admin.form
                    title="Risco"
                    subtitle="Análise do Risco"
                    :action="route('gestao_risco.atividades_analises_riscos.update', [
                        $atividade,
                        $atividadeIdentificacaoRisco,
                        $atividadeAnaliseRisco
                    ])"
                    method="put"
                    :routeBack="route('gestao_risco.atividades_analises_riscos.index', $atividade)"
                    buttonText="Atualizar"
                >
                    @include('gestao_risco.atividades_analises_riscos.partials.form')
                </x-admin.form>
            </div>
        </div>
    @endsection
</x-app-layout>
