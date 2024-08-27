<x-app-layout>
    <x-slot name="breadcrumb">
        <x-admin.breadcrumb icon="fas fa-box" title="Anamnese - Queixa Inicial" :links="['Prontuário', 'Anamnese', 'Queixa Inicial']" />
    </x-slot>

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
