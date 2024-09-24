<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        return view('admin.cliente.home');
    }

    public function create()
    {
        return view('admin.cliente.create');
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'name'  => 'required',
            'endereco' => 'required',
            'telefone' => 'required',
        ]);
        $data = Cliente::create($validation);
        if ($data) {
            session()->flash('success', 'Ordem add Successfully');
            return redirect(route('adminCliente.index'));
        } else {
            session()->flash('error','Some problem occure');
            return redirect(route('adminCliente.create'));
        }
    }
}
