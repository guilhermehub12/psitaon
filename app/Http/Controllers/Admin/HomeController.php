<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }
}
