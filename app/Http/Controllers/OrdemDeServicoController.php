<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdemDeServico;

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
            'falta' => 'required',
            'data_de_recebimento' => 'required',
            'data_de_entrega' => 'required',
            'hora_de_entrega' => 'required',
            'prazo_da_impressao_data' => 'required',
            'prazo_da_impressao_hora' => 'required',
            'dia_do_recebimento_do_controle' => 'required',
            'hora_do_recebimento_do_controle' => 'required',
            'servico_externo' => 'required',
            'formas_de_pagamento' => 'required',
            'observacoes_pedido' => 'required',
            'layout' => 'required',
            'embalagem' => 'required',
            'observacoes_layout' => 'required',
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
