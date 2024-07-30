<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Paciente\Responsavel\StoreResponsavelRequest;
use App\Http\Requests\Admin\Paciente\Responsavel\UpdateResponsavelRequest;
use App\Models\Paciente;
use App\Models\PacienteResponsavel;
use App\Repositories\PacienteResponsavelRepository;
use App\Repositories\TipoResponsavelRepository;
use Illuminate\Http\Request;

class PacienteResponsavelController extends Controller
{
    public function __construct(
        private PacienteResponsavelRepository $pacienteResponsavelRepository,
        private TipoResponsavelRepository $tipoResponsavelRepository
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pacientes = $this->pacienteResponsavelRepository->paginate(10, 'created_at', 'ASC', $request->except(['_token', 'page']));

        return view('admin.pacientes_responsaveis.create', [
            'pacientes' => $pacientes
        ]);
    }

    public function create(Paciente $paciente)
    {
        $tipos_responsaveis = $this->tipoResponsavelRepository->selectOption();

        return view('admin.pacientes_responsaveis.create', [
            'paciente' => $paciente,
            'tipos_responsaveis' => $tipos_responsaveis
        ]);
    }

    public function store(StoreResponsavelRequest $request, Paciente $paciente)
    {
        $result = $this->pacienteResponsavelRepository->store($paciente, $request->except(['_token']));

        if ($result === true) {
            $request->session()->flash('success', 'Paciente cadastrado com sucesso!');
        } else {
            $request->session()->flash('danger', 'Erro ao cadastrar o responsavel. '.$result);
        }

        return redirect()->route('admin.pacientes.responsaveis.create', $paciente);
    }

    public function show(PacienteResponsavel $paciente)
    {
        return view('admin.pacientes_responsaveis.show', [
            'paciente' => $paciente
        ]);
    }

    public function edit(PacienteResponsavel $paciente)
    {
        return view('admin.pacientes_responsaveis.edit', [
            'paciente' => $paciente
        ]);
    }

    public function update(UpdateResponsavelRequest $request, Paciente $paciente)
    {
        $result = $this->pacienteResponsavelRepository->update($paciente, $request->except(['_token']));

        if ($result === true) {
            $request->session()->flash('success', 'Paciente atualizado com sucesso!');
        } else {
            $request->session()->flash('danger', 'Erro ao atualizar o responsavel! '.$result);
        }

        return redirect()->route('admin.pacientes.responsaveis.index');
    }

    public function delete(Request $request, Paciente $paciente, PacienteResponsavel $pacienteResponsavel)
    {
        $result = $this->pacienteResponsavelRepository->destroy($pacienteResponsavel);

        if ($result === true) {
            flash('success','Paciente deletado com sucesso!');
        } else {
            flash('danger', 'Erro ao deletar o responsavel! '.$result);
        }

        return redirect()->route('admin.pacientes.responsaveis.index');
    }
}
