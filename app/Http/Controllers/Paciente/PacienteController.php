<?php

namespace App\Http\Controllers\Paciente;

use App\Http\Controllers\Controller;
use App\Http\Requests\Paciente\StorePacienteRequest;
use App\Http\Requests\Paciente\UpdatePacienteRequest;
use App\Models\Paciente;
use App\Models\TipoResponsavel;
use App\Repositories\EscolaridadeRepository;
use App\Repositories\GeneroRepository;
use App\Repositories\PacienteRepository;
use App\Repositories\TipoResponsavelRepository;
use App\Repositories\EstadoCivilRepository;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function __construct(
        private PacienteRepository $pacienteRepository,
        private TipoResponsavelRepository $tipoResponsavelRepository,
        private GeneroRepository $generoRepository,
        private EscolaridadeRepository $escolaridadeRepository,
        private EstadoCivilRepository $estadoCivilRepository
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pacientes = $this->pacienteRepository->paginate(10, 'created_at', 'ASC', $request->except(['_token', 'page']));

        return view('paciente.pacientes.index', [
            'pacientes' => $pacientes
        ]);
    }

    public function create(Paciente $paciente)
    {
        // $tipos_responsaveis = $this->tipoResponsavelRepository->selectOption();
        $generos = $this->generoRepository->selectOption();
        $escolaridades = $this->escolaridadeRepository->selectOption();
        $estados_civis = $this->estadoCivilRepository->selectOption();

        return view('paciente.pacientes.create', [
            'paciente' => $paciente,
            // 'tipos_responsaveis' => $tipos_responsaveis,
            'generos' => $generos,
            'escolaridades' => $escolaridades,
            'estados_civis' => $estados_civis
        ]);
    }

    public function store(StorePacienteRequest $request, Paciente $paciente)
    {
        $result = $this->pacienteRepository->store($request->except(['_token']));
        if ($result === true) {
            session()->flash('success', 'Paciente cadastrado com sucesso!');
        } else {
            session()->flash('danger', 'Erro ao cadastrar o paciente. '.$result);
        }

        return redirect()->route('paciente.pacientes.index', $paciente);
    }

    public function show(Paciente $paciente)
    {
        return view('paciente.pacientes.show', [
            'paciente' => $paciente
        ]);
    }

    public function edit(Paciente $paciente)
    {
        return view('paciente.pacientes.edit', [
            'paciente' => $paciente
        ]);
    }

    public function update(UpdatePacienteRequest $request, Paciente $paciente)
    {
        $result = $this->pacienteRepository->update($paciente, $request->except(['_token']));

        if ($result === true) {
            session()->flash('success', 'Paciente atualizado com sucesso!');
        } else {
            session()->flash('danger', 'Erro ao atualizar o paciente! '.$result);
        }

        return redirect()->route('paciente.pacientes.index');
    }

    public function delete(Paciente $paciente)
    {
        $result = $this->pacienteRepository->destroy($paciente);

        if ($result === true) {
            flash('success','Paciente deletado com sucesso!');
        } else {
            flash('danger', 'Erro ao deletar o paciente! '.$result);
        }

        return redirect()->route('paciente.pacientes.index');
    }
}
