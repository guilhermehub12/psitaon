<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Paciente;
use App\Models\PacienteAgenda;
use App\Repositories\PacienteAgendaRepository;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\Paciente\Agenda\StoreAgendaRequest;
use App\Http\Requests\Admin\Paciente\Agenda\UpdateAgendaRequest;

class PacienteAgendaController extends Controller
{
    public function __construct(
        private PacienteAgendaRepository $pacienteAgendaRepository,
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pacientes = $this->pacienteAgendaRepository->paginate(10, 'created_at', 'ASC', $request->except(['_token', 'page']));

        return view('admin.pacientes_agendas.create', [
            'pacientes' => $pacientes
        ]);
    }

    public function create(Paciente $paciente)
    {
        return view('admin.pacientes_agendas.create', [
            'paciente' => $paciente
        ]);
    }

    public function store(StoreAgendaRequest $request, Paciente $paciente)
    {
        $result = $this->pacienteAgendaRepository->store($paciente, $request->except(['_token']));

        if ($result === true) {
            $request->session()->flash('success', 'Paciente cadastrado com sucesso!');
        } else {
            $request->session()->flash('danger', 'Erro ao cadastrar o responsavel. '.$result);
        }

        return redirect()->route('admin.pacientes.responsaveis.create', $paciente);
    }

    public function show(PacienteAgenda $paciente)
    {
        return view('admin.pacientes_agendas.show', [
            'paciente' => $paciente
        ]);
    }

    public function edit(PacienteAgenda $paciente)
    {
        return view('admin.pacientes_agendas.edit', [
            'paciente' => $paciente
        ]);
    }

    public function update(UpdateAgendaRequest $request, Paciente $paciente)
    {
        $result = $this->pacienteAgendaRepository->update($paciente, $request->except(['_token']));

        if ($result === true) {
            $request->session()->flash('success', 'Paciente atualizado com sucesso!');
        } else {
            $request->session()->flash('danger', 'Erro ao atualizar o responsavel! '.$result);
        }

        return redirect()->route('admin.pacientes.responsaveis.index');
    }

    public function delete(Request $request, Paciente $paciente, PacienteAgenda $pacienteAgenda)
    {
        $result = $this->pacienteAgendaRepository->destroy($pacienteAgenda);

        if ($result === true) {
            flash('success','Paciente deletado com sucesso!');
        } else {
            flash('danger', 'Erro ao deletar o responsavel! '.$result);
        }

        return redirect()->route('admin.pacientes.responsaveis.index');
    }
}
