<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Paciente\StorePacienteRequest;
use App\Http\Requests\Admin\Paciente\UpdatePacienteRequest;
use App\Models\Paciente;
use App\Models\TipoResponsavel;
use App\Repositories\PacienteRepository;
use App\Repositories\TipoResponsavelRepository;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function __construct(
        private PacienteRepository $pacienteRepository,
        private TipoResponsavelRepository $tipoResponsavelRepository
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pacientes = $this->pacienteRepository->paginate(10, 'created_at', 'ASC', $request->except(['_token', 'page']));

        return view('admin.pacientes.index', [
            'pacientes' => $pacientes
        ]);
    }

    public function create(Paciente $paciente)
    {
        $tipos_responsaveis = $this->tipoResponsavelRepository->selectOption();
        return view('admin.pacientes.create', [
            'paciente' => $paciente,
            'tipos_responsaveis' => $tipos_responsaveis
        ]);
    }

    public function store(StorePacienteRequest $request, Paciente $paciente)
    {
        $result = $this->pacienteRepository->store($paciente, $request->except(['_token']));

        if ($result === true) {
            $request->session()->flash('success', 'Paciente cadastrado com sucesso!');
        } else {
            $request->session()->flash('danger', 'Erro ao cadastrar o paciente. '.$result);
        }

        return redirect()->route('admin.pacientes.index', $paciente);
    }

    public function show(Paciente $paciente)
    {
        return view('admin.pacientes.show', [
            'paciente' => $paciente
        ]);
    }

    public function edit(Paciente $paciente)
    {
        return view('admin.pacientes.edit', [
            'paciente' => $paciente
        ]);
    }

    public function update(UpdatePacienteRequest $request, Paciente $paciente)
    {
        $result = $this->pacienteRepository->update($paciente, $request->except(['_token']));

        if ($result === true) {
            $request->session()->flash('success', 'Paciente atualizado com sucesso!');
        } else {
            $request->session()->flash('danger', 'Erro ao atualizar o paciente! '.$result);
        }

        return redirect()->route('admin.pacientes.index');
    }

    public function delete(Paciente $paciente)
    {
        $result = $this->pacienteRepository->destroy($paciente);

        if ($result === true) {
            flash('success','Paciente deletado com sucesso!');
        } else {
            flash('danger', 'Erro ao deletar o paciente! '.$result);
        }

        return redirect()->route('admin.pacientes.index');
    }
}
