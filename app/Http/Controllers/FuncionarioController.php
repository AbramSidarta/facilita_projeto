<?php

namespace App\Http\Controllers;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function index()
    {
        $funcionarios = Funcionario::whereIn('funcao', ['1', '2', '3', '4'])->orderBy('id','desc')->get();
        $total = Funcionario::count();
        return view('admin.funcionario.home', compact(['funcionarios', 'total']));
    }

    public function create()
    {
        return view('admin.funcionario.create');
    }

    public function show($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        return view('admin.funcionario.show', compact('funcionario'));
    }

    public function edit($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        return view('admin.funcionario.update', compact('funcionario'));
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'nome' => 'required',
            'cpf'  => 'required',
            'senha'  => 'required',
            
        ]);

        $funcionario = Funcionario::findOrFail($id);
        $nome = $request->nome;
        $cpf = $request->cpf;
        $senha = $request->senha;
        $funcao = $request->funcao;


        $funcionario->nome = $nome;
        $funcionario->cpf = $cpf;
        $funcionario->senha = $senha;
        $funcionario->funcao = $funcao;



        $data = $funcionario->save();
        if ($data) {
            session()->flash('success', 'Funcionário Atualizado com Sucesso');
            return redirect(route('adminFuncionario.show',['id'=> $funcionario->id]));
        } else {
            session()->flash('error', 'Ocorreu algum problema');
            return redirect(route('adminFuncionario.update'));
        }
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'nome'  => 'required',
            'cpf' => 'required',
            'senha' => 'required',
            'funcao' => 'required',
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
