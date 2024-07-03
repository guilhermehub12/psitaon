<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ClienteRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(
        private ClienteRepository $clienteRepository
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.home.index', [
            'clientes' => $this->clienteRepository->dashboard()
        ]);
    }
}
