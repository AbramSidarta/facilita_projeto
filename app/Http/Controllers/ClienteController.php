<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::orderBy('id','desc')->get();
        $total = Cliente::count();
        return view('admin.cliente.home', compact(['clientes', 'total']));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
    
        $clientes = Cliente::where(function ($queryBuilder) use ($query) {
            $queryBuilder->where('name', 'like', "%{$query}%")
                         ->orWhere('endereco', 'like', "%{$query}%")
                         ->orWhere('telefone', 'like', "%{$query}%");
        })
        ->orderBy('id', 'desc')
        ->get()
        ->map(function($cliente) {
            return [
                'id' => $cliente->id,
                'name' => $cliente->name,
                'endereco' => $cliente->endereco,
                'telefone' => $cliente->telefone,
                'editUrl' => route('adminCliente.edit', $cliente->id),  // URL de edição
                'deleteUrl' => route('adminCliente.destroy', $cliente->id),  // URL de deleção
            ];
        });
    
        return response()->json($clientes);
    }
    
    public function destroy($id)
    {
        $clientes = Cliente::findOrFail($id)->delete();
        if ($clientes) {
            session()->flash('success', 'Deletado com Sucesso');
            return redirect(route('adminCliente.index'));
        } else {
            session()->flash('error', 'Ocorreu algum problema');
            return redirect(route('adminCliente.index', ['id'=> $clientes->id]));
        }
    }

    public function create()
    {
        return view('admin.cliente.create');
    }
    
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('admin.cliente.show', compact('cliente'));
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('admin.cliente.update', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'name' => 'required',
            'endereco'  => 'required',
            'telefone'  => 'required',
            
        ]);

        $cliente = Cliente::findOrFail($id);
        $name = $request->name;
        $endereco = $request->endereco;
        $telefone = $request->telefone;
        
        $cliente->name = $name;
        $cliente->endereco = $endereco;
        $cliente->telefone = $telefone;

        $data = $cliente->save();
        if ($data) {
            session()->flash('success', 'Funcionário Atualizado com Sucesso');
            return redirect(route('adminCliente.index',['id'=> $cliente->id]));
        } else {
            session()->flash('error', 'Ocorreu algum problema');
            return redirect(route('adminCliente.update'));
        }
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
