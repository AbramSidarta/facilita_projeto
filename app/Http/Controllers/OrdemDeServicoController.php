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
    public function Impressao()
    {
        $ordemdeservicos = OrdemDeServico::where('status', 'Impressão')
            ->orderBy('id', 'desc')
            ->get();

        $ordensVencidas = OrdemDeServico::whereRaw("STR_TO_DATE(CONCAT(data_de_entrega, ' ', hora_de_entrega), '%Y-%m-%d %H:%i:%s') < ?", [now()])
        ->where('status', 'Impressão') // flitra as com status "Impressão"
        ->get();

        $total = OrdemDeServico::count();
        
        return view('admin.ordemdeservico.Impressao', compact(['ordemdeservicos', 'total', 'ordensVencidas']));
    }


    public function producao()
    {
        $ordemdeservicos = OrdemDeServico::where('status', 'Produção')
            ->orderBy('id', 'desc')
            ->get();

        $ordensVencidas = OrdemDeServico::whereRaw("STR_TO_DATE(CONCAT(data_de_entrega, ' ', hora_de_entrega), '%Y-%m-%d %H:%i:%s') < ?", [now()])
        ->where('status', 'Produção') // flitra as com status "Produção"
        ->get();

        $total = OrdemDeServico::count();
        
        return view('admin.ordemdeservico.producao', compact(['ordemdeservicos', 'total', 'ordensVencidas']));
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

    // Verifica se o usuário digitou uma data no formato dd/mm/yyyy ou dd/mm
    $dataCompletaFormatada = null;
    $diaMesFormatado = null;

    if (preg_match('/\d{2}\/\d{2}\/\d{4}/', $query)) {
        // Formato dd/mm/yyyy
        $partes = explode('/', $query);
        $dataCompletaFormatada = "{$partes[2]}-{$partes[1]}-{$partes[0]}"; // Converte para yyyy-mm-dd
    } elseif (preg_match('/\d{2}\/\d{2}/', $query)) {
        // Formato dd/mm (sem ano)
        $partes = explode('/', $query);
        $diaMesFormatado = "{$partes[1]}-{$partes[0]}"; // Formato mm-dd
    }

    // Inicia a consulta base
    $ordens = OrdemDeServico::where(function ($queryBuilder) use ($query, $dataCompletaFormatada, $diaMesFormatado) {
        $queryBuilder->where('cliente', 'like', "%{$query}%")
                     ->orWhere('servico', 'like', "%{$query}%")
                     ->orWhere('status', 'like', "%{$query}%")
                     ->orWhere('id', 'like', "%{$query}%"); // Adiciona a busca pelo Cód.Arte (id)

        // Adiciona o filtro para data completa, se estiver disponível
        if ($dataCompletaFormatada) {
            $queryBuilder->orWhere('data_de_entrega', 'like', "%{$dataCompletaFormatada}%");
        }

        // Adiciona o filtro para dia e mês, se estiver disponível
        if ($diaMesFormatado) {
            $queryBuilder->orWhereRaw("DATE_FORMAT(data_de_entrega, '%m-%d') = ?", [$diaMesFormatado]);
        }
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
    } elseif ($page === 'concluidas') {
        $ordens = $ordens->where('status', 'Concluido');
    } elseif ($page === 'impressao') {
        $ordens = $ordens->where('status', 'Impressão');
    } elseif ($page === 'producao') {
        $ordens = $ordens->where('status', 'Produção');
    } else {
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

    // Atualiza os outros campos
    $ordemServico->status = $request->status;
    $ordemServico->ORC_venda = $request->ORC_venda;
    $ordemServico->cliente = $request->cliente;
    $ordemServico->servico = $request->servico;
    $ordemServico->end = $request->end;
    $ordemServico->fone = $request->fone;
    $ordemServico->valor = $request->valor;
    $ordemServico->pago = $request->pago;
    $ordemServico->falta = $request->falta;
    $ordemServico->data_de_recebimento = $request->data_de_recebimento;
    $ordemServico->data_de_entrega = $request->data_de_entrega;
    $ordemServico->hora_de_entrega = $request->hora_de_entrega;
    $ordemServico->prazo_da_impressao_data = $request->prazo_da_impressao_data;
    $ordemServico->prazo_da_impressao_hora = $request->prazo_da_impressao_hora;
    $ordemServico->dia_do_recebimento_do_controle = $request->dia_do_recebimento_do_controle;
    $ordemServico->hora_do_recebimento_do_controle = $request->hora_do_recebimento_do_controle;
    $ordemServico->servico_externo = $request->servico_externo;
    $ordemServico->formas_de_pagamento = $request->formas_de_pagamento;
    $ordemServico->observacoes_pedido = $request->observacoes_pedido;
    $ordemServico->embalagem = $request->embalagem;
    $ordemServico->observacoes_layout = $request->observacoes_layout;
    $ordemServico->nome_funcionario = $request->nome_funcionario;

    // Verifica se a checkbox de remover imagem foi marcada
    if ($request->has('remover_imagem') && $request->remover_imagem == '1') {
        // Remove a imagem antiga, se houver
        if ($ordemServico->layout) {
            $oldFilePath = public_path('uploads/ordemdeservico/' . $ordemServico->layout);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath); // Deleta a imagem antiga
            }
        }
        $ordemServico->layout = null; // Remove o caminho da imagem no banco de dados
    }

    // Verifica se um novo arquivo de imagem foi enviado
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

    // Salva as alterações no banco de dados
    $ordemServico->save();

    // Retorna o usuário para a página de visualização com uma mensagem de sucesso
    session()->flash('success', 'Ordem Atualizada com Sucesso');
    return redirect(route('adminOrdemDeServico.show', ['id' => $ordemServico->id]));
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

   
