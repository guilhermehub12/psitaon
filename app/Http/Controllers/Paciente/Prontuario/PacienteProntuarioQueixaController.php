<?php

namespace App\Http\Controllers\Paciente\Prontuario;

use App\Http\Controllers\Controller;
// use App\Http\Requests\Paciente\Prontuario\StoreProntuarioRequest;
// use App\Http\Requests\Paciente\Prontuario\UpdateProntuarioRequest;
use App\Models\Paciente;
use App\Models\Prontuario\PacienteProntuarioQueixa;
use App\Repositories\Prontuario\PacienteProntuarioQueixaRepository;
use Illuminate\Http\Request;

class PacienteProntuarioQueixaController extends Controller
{
    public function __construct(
        private PacienteProntuarioQueixaRepository $pacienteProntuarioQueixaRepository
    ) {}

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(
        Paciente $paciente,
        PacienteProntuarioQueixa $pacienteProntuarioQueixa
    ) {
        return view('paciente.pacientes_prontuarios.paciente_prontuario_queixa.create', [
            'paciente' => $paciente,
            'pacienteProntuarioQueixa' => $pacienteProntuarioQueixa
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        Paciente $paciente,
        PacienteProntuarioQueixa $pacienteProntuarioQueixa
    ) {
        $result = $this->pacienteProntuarioQueixaRepository->store(
            $pacienteProntuarioQueixa,
            $request->except(['_token'])
        );

        if ($result === true) {
            flash('Análise do risco cadastrada com sucesso!')->success();

            return redirect()->route('paciente.pacientes.prontuarios.index', $paciente);
        }

        flash('Erro ao cadastrar a análise do risco!')->error();

        return redirect()->route('paciente.pacientes.prontuarios_queixas.create', [
            $paciente,
            $pacienteProntuarioQueixa
        ]);
    }
}
