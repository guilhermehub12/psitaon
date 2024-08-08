<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Paciente\Prontuario\StoreProntuarioRequest;
use App\Http\Requests\Admin\Paciente\Prontuario\UpdateProntuarioRequest;
use App\Models\Paciente;
use App\Models\Prontuario\PacienteProntuario;
use App\Repositories\Prontuario\PacienteProntuarioRepository;
use App\Repositories\Prontuario\PacienteProntuarioAlimentacaoRepository;
use App\Repositories\Prontuario\PacienteProntuarioAvaliacaoRepository;
use App\Repositories\Prontuario\PacienteProntuarioDoencaRepository;
use App\Repositories\Prontuario\PacienteProntuarioPlanejamentoRepository;
use App\Repositories\Prontuario\PacienteProntuarioQueixaRepository;
use Illuminate\Http\Request;

class PacienteProntuarioController extends Controller
{
    public function __construct(
        private PacienteProntuarioRepository $pacienteProntuarioRepository,
        private PacienteProntuarioAlimentacaoRepository $pacienteProntuarioAlimentacaoRepository,
        private PacienteProntuarioAvaliacaoRepository $pacienteProntuarioAvaliacaoRepository,
        private PacienteProntuarioDoencaRepository $pacienteProntuarioDoencaRepository,
        private PacienteProntuarioPlanejamentoRepository $pacienteProntuarioPlanejamentoRepository,
        private PacienteProntuarioQueixaRepository $pacienteProntuarioQueixaRepository
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pacientes = $this->pacienteProntuarioRepository->paginate(10, 'created_at', 'ASC', $request->except(['_token', 'page']));

        return view('admin.pacientes_prontuarios.index', [
            'pacientes' => $pacientes
        ]);
    }

    public function create(Paciente $paciente)
    {
        $prontuarios_alimentacoes = $this->pacienteProntuarioAlimentacaoRepository->selectOption();
        $prontuarios_avaliacoes = $this->pacienteProntuarioAvaliacaoRepository->selectOption();
        $prontuarios_doencas = $this->pacienteProntuarioDoencaRepository->selectOption();
        $prontuarios_planejamentos = $this->pacienteProntuarioPlanejamentoRepository->selectOption();
        $prontuarios_queixas = $this->pacienteProntuarioQueixaRepository->selectOption();

        return view('admin.pacientes_prontuarios.create', [
            'paciente' => $paciente,
            'prontuarios_alimentacoes' => $prontuarios_alimentacoes,
            'prontuarios_avaliacoes' => $prontuarios_avaliacoes,
            'prontuarios_doencas' => $prontuarios_doencas,
            'prontuarios_planejamentos' => $prontuarios_planejamentos,
            'prontuarios_queixas' => $prontuarios_queixas
        ]);
    }

    public function store(StoreProntuarioRequest $request, PacienteProntuario $paciente)
    {
        $result = $this->pacienteProntuarioRepository->store($request->except(['_token']));
        if ($result === true) {
            $request->session()->flash('success', 'Paciente cadastrado com sucesso!');
        } else {
            $request->session()->flash('danger', 'Erro ao cadastrar o paciente. '.$result);
        }

        return redirect()->route('admin.pacientes.prontuarios.index', $paciente);
    }

    public function show(PacienteProntuario $paciente)
    {
        return view('admin.pacientes_prontuarios.show', [
            'paciente' => $paciente
        ]);
    }

    public function edit(PacienteProntuario $paciente)
    {
        return view('admin.pacientes_prontuarios.edit', [
            'paciente' => $paciente
        ]);
    }

    public function update(UpdateProntuarioRequest $request, PacienteProntuario $paciente)
    {
        $result = $this->pacienteProntuarioRepository->update($paciente, $request->except(['_token']));

        if ($result === true) {
            $request->session()->flash('success', 'Paciente atualizado com sucesso!');
        } else {
            $request->session()->flash('danger', 'Erro ao atualizar o paciente! '.$result);
        }

        return redirect()->route('admin.pacientes.prontuarios.index');
    }

    public function delete(PacienteProntuario $paciente)
    {
        $result = $this->pacienteProntuarioRepository->destroy($paciente);

        if ($result === true) {
            flash('success','Paciente deletado com sucesso!');
        } else {
            flash('danger', 'Erro ao deletar o paciente! '.$result);
        }

        return redirect()->route('admin.pacientes.prontuarios.index');
    }
}
