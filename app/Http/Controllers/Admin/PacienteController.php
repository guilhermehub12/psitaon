<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
}
