<?php

namespace App\Http\Controllers\Paciente;

use App\Http\Controllers\Controller;

use App\Models\Paciente;
use App\Models\PacienteAgenda;

use App\Repositories\PacienteAgendaRepository;
use App\Repositories\FrequenciaPagamentoRepository;

use Illuminate\Http\Request;
use App\Http\Requests\Paciente\Agenda\StoreAgendaRequest;
use App\Http\Requests\Paciente\Agenda\UpdateAgendaRequest;

class PacienteAgendaController extends Controller
{
    public function __construct(
        private PacienteAgendaRepository $pacienteAgendaRepository,
        private FrequenciaPagamentoRepository $frequenciaPagamentoRepository
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pacientes = $this->pacienteAgendaRepository->paginate(10, 'created_at', 'ASC', $request->except(['_token', 'page']));

        return view('paciente.pacientes_agendas.create', [
            'paciente' => $pacientes
        ]);
    }

    public function create(Paciente $paciente)
    {
        $frequencias = $this->frequenciaPagamentoRepository->selectOption();
        return view('paciente.pacientes_agendas.create', [
            'paciente' => $paciente,
            'frequencias' => $frequencias
        ]);
    }

    public function store(StoreAgendaRequest $request, Paciente $paciente)
    {
        $result = $this->pacienteAgendaRepository->store($paciente, $request->except(['_token']));

        if ($result === true) {
            session()->flash('success', 'Sessão cadastrada com sucesso!');
        } else {
            session()->flash('danger', 'Erro ao cadastrar a sessão. ');
        }

        return redirect()->route('paciente.pacientes.agendas.create', $paciente);
    }

    public function show(PacienteAgenda $paciente)
    {
        return view('paciente.pacientes_agendas.show', [
            'paciente' => $paciente
        ]);
    }

    public function edit(PacienteAgenda $paciente)
    {
        return view('paciente.pacientes_agendas.edit', [
            'paciente' => $paciente
        ]);
    }

    public function update(UpdateAgendaRequest $request, Paciente $paciente)
    {
        $result = $this->pacienteAgendaRepository->update($paciente, $request->except(['_token']));

        if ($result === true) {
            session()->flash('success', 'Sessão atualizada com sucesso!');
        } else {
            session()->flash('danger', 'Erro ao atualizar a sessão! ');
        }

        return redirect()->route('paciente.pacientes.agendas.index');
    }

    public function delete(Request $request, Paciente $paciente, PacienteAgenda $pacienteAgenda)
    {
        $result = $this->pacienteAgendaRepository->destroy($pacienteAgenda);

        if ($result === true) {
            flash('success','Sessão deletada com sucesso!');
        } else {
            flash('danger', 'Erro ao deletar a sessão! ');
        }

        return redirect()->route('paciente.pacientes.agendas.index');
    }
}
