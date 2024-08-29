<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdemDeServico;

class OrdemDeServicoController extends Controller
{
    public function index()
    {
        $ordemdeservicos = OrdemDeServico::orderBy('id','asc')->get();
        $total = OrdemDeServico::count();
        return view('admin.ordemdeservico.home', compact(['ordemdeservicos','total']));
    }

    public function create()
    {
        return view('admin.ordemdeservico.create');
    }
    
    public function store(Request $request)
    {
        $validation = $request->validate([
            'status' => 'required',
            'ORC_venda'  => 'required',
            'cliente'  => 'required',
            'servico'  => 'required',
            'end'  => 'required',
            'fone' => 'required',
            'valor' => 'required',
            'pago' => 'required',
            'falta' => 'nullable|string',
            'data_de_recebimento' => 'required',
            'data_de_entrega' => 'required',
            'hora_de_entrega' => 'required',
            'prazo_da_impressao_data' => 'nullable|date',
            'prazo_da_impressao_hora' => 'nullable|string',
            'dia_do_recebimento_do_controle' => 'nullable|string',
            'hora_do_recebimento_do_controle' => 'nullable|string',
            'servico_externo' => 'nullable|boolean',
            'formas_de_pagamento' => 'nullable|string',
            'observacoes_pedido' => 'nullable|string',
            'layout' => 'required',
            'embalagem' => 'required',
            'observacoes_layout' => 'nullable|string',
            'nome_funcionario' => 'required',
        ]);
        $data =  OrdemDeServico::create($validation);
        if ($data) {
            session()->flash('success', 'Ordem add Successfully');
            return redirect(route('adminOrdemDeServico.index'));
        } else {
            session()->flash('error','Some problem occure');
            return redirect(route('admin.OrdemDeServico.create'));
        }
    }
}
