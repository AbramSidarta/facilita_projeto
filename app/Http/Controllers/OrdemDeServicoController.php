<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdemDeServicoController extends Controller
{
    public function index()
    {
        return view('admin.ordemdeservico.home');
    }

    public function create()
    {
        return view('admin.ordemdeservico.create');
    }
}
