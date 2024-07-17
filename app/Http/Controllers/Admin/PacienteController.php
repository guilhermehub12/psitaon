<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Paciente\StorePacienteRequest;
use App\Models\Paciente;
use App\Repositories\PacienteRepository;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function __construct(
        private PacienteRepository $pacienteRepository
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pacientes = $this->pacienteRepository->paginate(10, 'nome', 'ASC', $request->except(['_token', 'page']));

        return view('admin.pacientes.index', [
            'pacientes' => $pacientes
        ]);
    }

    public function create(Paciente $paciente)
    {
        return view('admin.pacientes.create', [
            'paciente' => $paciente
        ]);
    }

    public function store(StorePacienteRequest $request)
    {
        $result = $this->pacienteRepository->store($request->except(['_token']));

        if ($result === true) {
            $request->session()->flash('success', 'Paciente cadastrado com sucesso!');
        } else {
            $request->session()->flash('danger', 'Erro ao cadastrar o paciente. '.$result);
        }

        return redirect()->route('admin.pacientes.index');
    }
}
