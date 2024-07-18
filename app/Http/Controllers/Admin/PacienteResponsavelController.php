<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Paciente\StorePacienteResponsavelRequest;
use App\Http\Requests\Admin\Paciente\UpdatePacienteResponsavelRequest;
use App\Models\PacienteResponsavel;
use App\Repositories\PacienteResponsavelRepository;
use Illuminate\Http\Request;

class PacienteResponsavelController extends Controller
{
    public function __construct(
        private PacienteResponsavelRepository $pacienteResponsavelRepository
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $responsaveis = $this->pacienteResponsavelRepository->paginate(10, 'created_at', 'ASC', $request->except(['_token', 'page']));

        return view('admin.pacientes_responsaveis.index', [
            'responsaveis' => $responsaveis
        ]);
    }

    public function create(PacienteResponsavel $pacienteResponsavel)
    {
        return view('admin.pacientes_responsaveis.create', [
            'responsavel' => $pacienteResponsavel
        ]);
    }

    public function store(StorePacienteResponsavelRequest $request)
    {
        $result = $this->pacienteResponsavelRepository->store($request->except(['_token']));

        if ($result === true) {
            $request->session()->flash('success', 'Paciente cadastrado com sucesso!');
        } else {
            $request->session()->flash('danger', 'Erro ao cadastrar o responsavel. '.$result);
        }

        return redirect()->route('admin.pacientes_responsaveis.index');
    }

    public function show(PacienteResponsavel $pacienteResponsavel)
    {
        return view('admin.pacientes_responsaveis.show', [
            'responsavel' => $pacienteResponsavel
        ]);
    }

    public function edit(PacienteResponsavel $pacienteResponsavel)
    {
        return view('admin.pacientes_responsaveis.edit', [
            'responsavel' => $pacienteResponsavel
        ]);
    }

    public function update(UpdatePacienteResponsavelRequest $request, PacienteResponsavel $pacienteResponsavel)
    {
        $result = $this->pacienteResponsavelRepository->update($pacienteResponsavel, $request->except(['_token']));

        if ($result === true) {
            $request->session()->flash('success', 'Paciente atualizado com sucesso!');
        } else {
            $request->session()->flash('danger', 'Erro ao atualizar o responsavel! '.$result);
        }

        return redirect()->route('admin.pacientes_responsaveis.index');
    }

    public function delete(PacienteResponsavel $pacienteResponsavel)
    {
        $result = $this->pacienteResponsavelRepository->destroy($pacienteResponsavel);

        if ($result === true) {
            flash('success','Paciente deletado com sucesso!');
        } else {
            flash('danger', 'Erro ao deletar o responsavel! '.$result);
        }

        return redirect()->route('admin.pacientes_responsaveis.index');
    }
}
