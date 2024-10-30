<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;


class FuncionarioController extends Controller
{
    public function index()
    {
        $funcionarios = User::whereIn('usertype', ['guiche', 'impressao', 'producao', 'caixa','admin',])->orderByRaw("FIELD(usertype, 'guiche', 'impressao', 'producao', 'caixa','admin')")->get();
        $total = User::count();
        return view('admin.funcionario.home', compact(['funcionarios', 'total']));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $funcionarios = User::where(function ($queryBuilder) use ($query) {
            $queryBuilder->where('name', 'like', "%{$query}%")
                        ->orWhere('usertype', 'like', "%{$query}%")
                        ->orWhere('cpf', 'like', "%{$query}%")
                        ->orWhere('id', 'like', "%{$query}%");
        })
        ->orderBy('id', 'desc')
        ->get()
        ->map(function($funcionario) {
            return[
                'id' => $funcionario->id,
                'name' => $funcionario->name,
                'usertype' => $funcionario->usertype,
                'cpf' => $funcionario->cpf,
                'editUrl' => route('adminFuncionario.edit', $funcionario->id),  // URL de edição
                'deleteUrl' => route('adminFuncionario.destroy', $funcionario->id),  // URL de de
            ];
        });
       

        return response()->json($funcionarios);
    }



    public function destroy($id)
    {
        $funcionarios = User::findOrFail($id)->delete();
        if ($funcionarios) {
            session()->flash('success', 'Deletado com Sucesso');
            return redirect(route('adminFuncionario.home'));
        } else {
            session()->flash('error', 'Ocorreu algum problema');
            return redirect(route('adminFuncionario.home', ['id'=> $funcionarios->id]));
        }
    }

    public function create()
    {
        return view('admin.funcionario.create');
    }

    public function show($id)
    {
        $funcionario = User::findOrFail($id);
        return view('admin.funcionario.show', compact('funcionario'));
    }

    public function edit($id)
    {
        $funcionario = User::findOrFail($id);
        return view('admin.funcionario.update', compact('funcionario'));
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'name' => 'required',
            'cpf'  => 'required',
            'password'  => 'required',
            
        ]);

        $funcionario = User::findOrFail($id);
        $name = $request->name;
        $cpf = $request->cpf;
        $password = $request->password;
        $usertype = $request->usertype;


        $funcionario->name = $name;
        $funcionario->cpf = $cpf;
        $funcionario->password = $password;
        $funcionario->usertype = $usertype;



        $data = $funcionario->save();
        if ($data) {
            session()->flash('success', 'Funcionário Atualizado com Sucesso');
            return redirect(route('adminFuncionario.home',['id'=> $funcionario->id]));
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


        $data = User::create($validation);
        if ($data) {
            session()->flash('success', 'Ordem add Successfully');
            return redirect(route('adminFuncionario.home'));
        } else {
            session()->flash('error','Some problem occure');
            return redirect(route('adminFuncionario.create'));
        }
    }

    
}
