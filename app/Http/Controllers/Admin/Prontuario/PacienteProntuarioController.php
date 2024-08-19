<?php

namespace App\Http\Controllers\Admin\Prontuario;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Paciente\Prontuario\StoreProntuarioRequest;
use App\Http\Requests\Admin\Paciente\Prontuario\UpdateProntuarioRequest;
use App\Models\Paciente;
use App\Models\Prontuario\PacienteProntuario;
use App\Repositories\Prontuario\PacienteProntuarioRepository;
// use App\Repositories\Prontuario\PacienteProntuarioAlimentacaoRepository;
// use App\Repositories\Prontuario\PacienteProntuarioAvaliacaoRepository;
// use App\Repositories\Prontuario\PacienteProntuarioDoencaRepository;
// use App\Repositories\Prontuario\PacienteProntuarioPlanejamentoRepository;
// use App\Repositories\Prontuario\PacienteProntuarioQueixaRepository;
use Illuminate\Http\Request;

class PacienteProntuarioController extends Controller
{
    public function __construct(
        private PacienteProntuarioRepository $pacienteProntuarioRepository
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(
        Paciente $paciente
    ) {
        return view('admin.pacientes_prontuarios.index', [
            'paciente' => $paciente
        ]);
    }

    public function create(
        Paciente $paciente,
        PacienteProntuario $pacienteProntuario
    ) {
        return view('admin.pacientes_prontuarios.paciente_prontuario.create', [
            'paciente' => $paciente,
            'pacienteProntuario' => $pacienteProntuario
        ]);
    }

    public function store(
        StoreProntuarioRequest $request,
        Paciente $paciente,
        PacienteProntuario $pacienteProntuario
    ) {
        $result = $this->pacienteProntuarioRepository->store($pacienteProntuario, $request->except(['_token']));

        if ($result === true) {
            $request->session()->flash('success', 'Queixa inicial cadastrado com sucesso!');
        } else {
            $request->session()->flash('danger', 'Erro ao cadastrar a queixa inicial. ' . $result);
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
            $request->session()->flash('danger', 'Erro ao atualizar o paciente! ' . $result);
        }

        return redirect()->route('admin.pacientes.prontuarios.index');
    }

    public function delete(PacienteProntuario $paciente)
    {
        $result = $this->pacienteProntuarioRepository->destroy($paciente);

        if ($result === true) {
            flash('success', 'Paciente deletado com sucesso!');
        } else {
            flash('danger', 'Erro ao deletar o paciente! ' . $result);
        }

        return redirect()->route('admin.pacientes.prontuarios.index');
    }
}
