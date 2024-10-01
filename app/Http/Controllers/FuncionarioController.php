<?php

namespace App\Http\Controllers;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function index()
    {
        $funcionarios = Funcionario::orderBy('id','desc')->get();
        $total = Funcionario::count();
        return view('admin.funcionario.home', compact(['funcionarios', 'total']));
    }

    public function create()
    {
        return view('admin.funcionario.create');
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'nome'  => 'required',
            'cpf' => 'required',
            'senha' => 'required',
        ]);


        $data = Funcionario::create($validation);
        if ($data) {
            session()->flash('success', 'Ordem add Successfully');
            return redirect(route('adminFuncionario.index'));
        } else {
            session()->flash('error','Some problem occure');
            return redirect(route('adminFuncionario.create'));
        }
    }
}
