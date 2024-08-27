<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Paciente;
use App\Models\PacienteFinanceiro;

use App\Repositories\PacienteFinanceiroRepository;
use App\Repositories\ModalidadePagamentoRepository;
use App\Repositories\FrequenciaPagamentoRepository;
use App\Repositories\FormaPagamentoRepository;
use App\Repositories\StatusPagamentoRepository;
use App\Repositories\StatusPresencaRepository;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\Paciente\Financeiro\StoreFinanceiroRequest;
use App\Http\Requests\Admin\Paciente\Financeiro\UpdateFinanceiroRequest;

class PacienteFinanceiroController extends Controller
{
    private $pacienteFinanceiroRepository;
    private $modalidadePagamentoRepository;
    private $frequenciaPagamentoRepository;
    private $formaPagamentoRepository;
    private $statusPagamentoRepository;
    private $statusPresencaRepository;

    public function __construct(
        PacienteFinanceiroRepository $pacienteFinanceiroRepository,
        ModalidadePagamentoRepository $modalidadePagamentoRepository,
        FrequenciaPagamentoRepository $frequenciaPagamentoRepository,
        FormaPagamentoRepository $formaPagamentoRepository,
        StatusPagamentoRepository $statusPagamentoRepository,
        StatusPresencaRepository $statusPresencaRepository
    ) {
        $this->pacienteFinanceiroRepository = $pacienteFinanceiroRepository;
        $this->modalidadePagamentoRepository = $modalidadePagamentoRepository;
        $this->frequenciaPagamentoRepository = $frequenciaPagamentoRepository;
        $this->formaPagamentoRepository = $formaPagamentoRepository;
        $this->statusPagamentoRepository = $statusPagamentoRepository;
        $this->statusPresencaRepository = $statusPresencaRepository;
    }

    public function create(Paciente $paciente)
    {
        $modalidades_pagamentos = $this->modalidadePagamentoRepository->selectOption();
        $frequencias_pagamentos = $this->frequenciaPagamentoRepository->selectOption();
        $formas_pagamentos = $this->formaPagamentoRepository->selectOption();
        $status_pagamentos = $this->statusPagamentoRepository->selectOption();
        $status_presencas = $this->statusPresencaRepository->selectOption();

        return view('admin.pacientes_financeiros.create', [
            'paciente' => $paciente,
            'modalidades_pagamentos' => $modalidades_pagamentos,
            'frequencias_pagamentos' => $frequencias_pagamentos,
            'formas_pagamentos' => $formas_pagamentos,
            'status_pagamentos' => $status_pagamentos,
            'status_presencas' => $status_presencas
        ]);
    }

    public function store(StoreFinanceiroRequest $request, Paciente $paciente)
    {
        // dd($paciente);
        $result = $this->pacienteFinanceiroRepository->store($paciente, $request->except(['_token']));
        // dd($result);
        if ($result === true) {
            $request->session()->flash('success', 'Paciente cadastrado com sucesso!');
        } else {
            $request->session()->flash('danger', 'Erro ao cadastrar o responsavel. '.$result);
        }

        return redirect()->route('admin.pacientes.financeiros.create', $paciente);
    }

    public function show(PacienteFinanceiro $paciente)
    {
        return view('admin.pacientes_financeiros.show', [
            'paciente' => $paciente
        ]);
    }

    public function edit(PacienteFinanceiro $paciente)
    {
        return view('admin.pacientes_financeiros.edit', [
            'paciente' => $paciente
        ]);
    }

    public function update(UpdateFinanceiroRequest $request, Paciente $paciente)
    {
        $result = $this->pacienteFinanceiroRepository->update($paciente, $request->except(['_token']));

        if ($result === true) {
            $request->session()->flash('success', 'Paciente atualizado com sucesso!');
        } else {
            $request->session()->flash('danger', 'Erro ao atualizar o responsavel! '.$result);
        }

        return redirect()->route('admin.pacientes.financeiros.index');
    }

    public function delete(Request $request, Paciente $paciente, PacienteFinanceiro $pacienteFinanceiro)
    {
        $result = $this->pacienteFinanceiroRepository->destroy($pacienteFinanceiro);

        if ($result === true) {
            flash('success','Paciente deletado com sucesso!');
        } else {
            flash('danger', 'Erro ao deletar o responsavel! '.$result);
        }

        return redirect()->route('admin.pacientes.financeiros.index');
    }
}
