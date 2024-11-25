<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdemDeServico;
use Carbon\Carbon;


class OrdemDeServicoController extends Controller
{
    public function index()
    {
        // Filtrando as ordens de serviço para exibir na página
        $ordemdeservicos = OrdemDeServico::whereIn('status', ['Pendente', 'Impressão', 'Produção'])
            ->orderBy('id', 'asc')
            ->get();
    
        // Filtrando apenas ordens de serviço vencidas considerando data e hora
        $ordensVencidas = OrdemDeServico::whereRaw("STR_TO_DATE(CONCAT(data_de_entrega, ' ', hora_de_entrega), '%Y-%m-%d %H:%i:%s') < ?", [now()])
            ->whereNotIn('status', ['Entregue', 'Concluido']) // Exclui as com status "Entregue" e "Concluido"
            ->get();
    
        $total = OrdemDeServico::count();
    
        return view('admin.ordemdeservico.home', compact(['ordemdeservicos', 'total', 'ordensVencidas']));
    }
    

    // Método para listar ordens de serviço concluidas
    public function concluidas()
    {
        $ordemdeservicos = OrdemDeServico::where('status', 'Concluido')
            ->orderBy('id', 'desc')
            ->get();
        $total = OrdemDeServico::count();
        
        return view('admin.ordemdeservico.concluidas', compact(['ordemdeservicos', 'total']));
    }

    // Método para listar ordens de serviço entregues
    public function entregues()
    {
        $ordemdeservicos = OrdemDeServico::where('status', 'Entregue')
            ->orderBy('id', 'desc')
            ->get();
        $total = OrdemDeServico::count();
        
        return view('admin.ordemdeservico.entregues', compact(['ordemdeservicos', 'total']));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $page = $request->input('page');
    
        // Inicia a consulta base
        $ordens = OrdemDeServico::where(function ($queryBuilder) use ($query) {
            $queryBuilder->where('cliente', 'like', "%{$query}%")
                        ->orWhere('servico', 'like', "%{$query}%")
                        ->orWhere('status', 'like', "%{$query}%")
                        ->orWhere('id', 'like', "%{$query}%"); // Adiciona a busca pelo Cód.Arte (id)
        });
    
        // Verifica se a busca é por "atrasado"
        $ordens->orWhere(function ($queryBuilder) use ($query) {
            if (str_contains(strtolower($query), 'atrasado')) {
                $queryBuilder->whereRaw("
                    STR_TO_DATE(CONCAT(data_de_entrega, ' ', hora_de_entrega), '%Y-%m-%d %H:%i:%s') < ?
                ", [now()])
                ->where('status', '<>', 'Entregue');
            }
        });
        
    
        // Filtra por status se necessário
        if ($page === 'entregues') {
            $ordens = $ordens->where('status', 'Entregue');
        }elseif ($page === 'concluidas'){
            $ordens = $ordens->where('status', 'Concluido');
        }else {
            $ordens = $ordens->whereIn('status', ['Pendente', 'Impressão', 'Produção']);
        }
    
        // Aplica a ordenação e a paginação
        $ordens = $ordens->orderBy('id', 'asc')->paginate(10); // 10 resultados por página
    
        // Retorna a resposta em JSON
        return response()->json($ordens);
    }
    

    public function create()
    {
        return view('admin.ordemdeservico.create');
    }
    
    public function imprimir($id)
    {
        $ordemServico = OrdemDeServico::findOrFail($id);
        return view('admin.ordemdeservico.imprimir', compact('ordemServico'));
    }
    
    public function show($id)
    {
        $ordemServico = OrdemDeServico::findOrFail($id);
        return view('admin.ordemdeservico.show', compact('ordemServico'));
    }

    public function edit($id)
    {
        $ordemServico = OrdemDeServico::findOrFail($id);
        return view('admin.ordemdeservico.update', compact('ordemServico'));
    }

    public function destroy($id)
    {
        $ordemServico = OrdemDeServico::findOrFail($id)->delete();
        if ($ordemServico) {
            session()->flash('success', 'Deletado com Sucesso');
            return redirect(route('adminOrdemDeServico.index'));
        } else {
            session()->flash('error', 'Ocorreu algum problema');
            return redirect(route('adminOrdemDeServico.show', ['id'=> $ordemServico->id]));
        }
    }


    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'status' => 'required|in:Pendente,Impressão,Produção,Concluido,Entregue',
            'ORC_venda'  => 'nullable',
            'cliente'  => 'required',
            'servico'  => 'required',
            'end'  => 'nullable',
            'fone' => 'nullable',
            'valor' => 'required',
            'pago' => 'required|in:sim,nao,50%',
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
            'layout' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg',
            'embalagem' => 'nullable',
            'observacoes_layout' => 'nullable|string',
            'nome_funcionario' => 'required',
        ]);
            
        $ordemServico = OrdemDeServico::findOrFail($id);
        $status = $request->status;
        $ORC_venda = $request->ORC_venda;
        $cliente = $request->cliente;
        $servico = $request->servico;
        $end = $request->end;
        $fone = $request->fone;
        $valor = $request->valor;
        $pago = $request->pago;
        $falta = $request->falta;
        $data_de_recebimento = $request->data_de_recebimento;
        $data_de_entrega = $request->data_de_entrega;
        $hora_de_entrega = $request->hora_de_entrega;
        $prazo_da_impressao_data = $request->prazo_da_impressao_data;
        $prazo_da_impressao_hora = $request->prazo_da_impressao_hora;
        $dia_do_recebimento_do_controle = $request->dia_do_recebimento_do_controle;
        $hora_do_recebimento_do_controle = $request->hora_do_recebimento_do_controle;
        $servico_externo = $request->servico_externo;
        $formas_de_pagamento = $request->formas_de_pagamento;
        $observacoes_pedido = $request->observacoes_pedido;

        $embalagem = $request->embalagem;
        $observacoes_layout = $request->observacoes_layout;
        $nome_funcionario = $request->nome_funcionario;
        
        $ordemServico->status = $status;
        $ordemServico->ORC_venda = $ORC_venda;
        $ordemServico->cliente = $cliente;
        $ordemServico->servico = $servico;
        $ordemServico->end = $end;
        $ordemServico->fone = $fone;
        $ordemServico->valor = $valor;
        $ordemServico->pago = $pago;
        $ordemServico->falta = $falta;
        $ordemServico->data_de_recebimento = $data_de_recebimento;
        $ordemServico->data_de_entrega = $data_de_entrega;
        $ordemServico->hora_de_entrega = $hora_de_entrega;
        $ordemServico->prazo_da_impressao_data = $prazo_da_impressao_data;
        $ordemServico->prazo_da_impressao_hora = $prazo_da_impressao_hora;
        $ordemServico->dia_do_recebimento_do_controle = $dia_do_recebimento_do_controle;
        $ordemServico->hora_do_recebimento_do_controle = $hora_do_recebimento_do_controle;
        $ordemServico->servico_externo = $servico_externo;
        $ordemServico->formas_de_pagamento = $formas_de_pagamento;
        $ordemServico->observacoes_pedido = $observacoes_pedido;

        $ordemServico->embalagem = $embalagem;
        $ordemServico->observacoes_layout = $observacoes_layout;
        $ordemServico->nome_funcionario = $nome_funcionario;

        if ($request->hasFile('layout')) {
            // Remove a imagem antiga, se necessário
            if ($ordemServico->layout) {
                $oldFilePath = public_path('uploads/ordemdeservico/' . $ordemServico->layout);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath); // Deleta a imagem antiga
                }
            }
    
            // Salva a nova imagem
            $file = $request->file('layout');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/ordemdeservico'), $filename);
            $ordemServico->layout = $filename; // Atualiza o campo layout
        }
    
        $data = $ordemServico->save();
        if ($data) {
            session()->flash('success', 'Ordem Atualizada com Sucesso');
            return redirect(route('adminOrdemDeServico.show',['id'=> $ordemServico->id]));
        } else {
            session()->flash('error', 'Ocorreu algum problema');
            return redirect(route('adminOrdemDeServico.update'));
        }
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'status' => 'required|in:Pendente,Impressão,Produção,Concluido,Entregue',
            'ORC_venda'  => 'nullable',
            'cliente'  => 'required',
            'servico'  => 'required',
            'end'  => 'nullable',
            'fone' => 'nullable',
            'valor' => 'required',
            'pago' => 'required|in:sim,nao,50%',
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
            'observacoes_pedido' => 'required',
            'layout' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg',
            'embalagem' => 'nullable',
            'observacoes_layout' => 'nullable|string',
            'nome_funcionario' => 'required',
        ]);
     
        // Defina $layoutFile como null por padrão
        $layoutFile = null;
    
        // Verifique se o arquivo foi enviado
        if ($request->hasFile('layout')) {
            $file = $request->file('layout');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/ordemdeservico'), $filename);
            $layoutFile = $filename;
        }
    
        // Criar os dados da ordem de serviço
        $data = OrdemDeServico::create(array_merge($request->all(), ['layout' => $layoutFile]));
    
        // Redirecionar com mensagem de sucesso ou erro
        if ($data) {
            session()->flash('success', 'Pedido adicionado com sucesso');
            return redirect(route('adminOrdemDeServico.index'));
        } else {
            session()->flash('error', 'Algum problema ocorreu');
            return redirect(route('admin.OrdemDeServico.create'));
        }
    }
    
}

   
