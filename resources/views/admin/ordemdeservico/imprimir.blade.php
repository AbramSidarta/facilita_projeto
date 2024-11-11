<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Scripts -->    
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
        <script scr="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset
            <!-- Page Content -->
            <main>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 " >
                        <div class="d-flex justify-content-center  no-print">
                            <div class="bg-white shadow-sm sm:rounded-lg m-4 p-4 max-w-sm col-4">
                                <h2>Guia de impressão </h2>
                                <li>Tipo da Folha: A5</li>
                                <li>Escala 50%</li>
                                <li>Paginas por Folha: 1</li>
                                <li>Margens: Nenhum</li>
                                <li>Sem Cabeçalhos </li>
                            </div>
                        </div>
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                                <div class="d-flex justify-content-between d-flex align-items-center">    
                                    <div class="d-flex justify-content-between d-flex align-items-center">
                                        @if ($ordemServico->status !== 'Entregue')
                                            <a style="background-color: #ADB5BD;border: 2px solid #ADB5BD;" href="{{ route('adminOrdemDeServico.show',['id'=> $ordemServico->id])}}" class="btn btn-primary text-dark">Voltar</a>
                                        @else
                                            <a style="background-color: #ADB5BD;border: 2px solid #ADB5BD;" href="{{ route('adminOrdemDeServico.entregues') }}" class="btn btn-primary text-dark">Voltar</a>
                                        @endif
                                    </div>
                                    <button style= "background-color: #094081;border: 2px solid #094081;" class="btn btn-primary me-3" onclick="window.print()">Imprimir Página</button>
                                </div>
                                <hr />
                                <div class="row mb-3">
                                    <div class="col-12 d-flex align-items-center border border-black">
                                        <div class="col-2">
                                            <x-application-logo class="block h-20 p-2 fill-current text-gray-800 " />    
                                        </div>
                                        <div class="col-10">
                                            <div class="mt-3 d-flex flex-row d-flex justify-content-between">
                                                <h2>ordem de serviço</h2>
                                                <h3 class="me-5">1 via</h3>
                                            </div>
                                            <div class="d-flex flex-row mb-3 justify-content-between">
                                                <div class=" ml-4 d-flex flex-row mt-3 col-4">        
                                                    <label class=" pe-3 ms-3"for="floatingInput">CÓD. ARTE:</label>
                                                    <p class="m-0 border-bottom border-dark  col-4 d-flex justify-content-center">{{ $ordemServico->id }}</p>
                                                </div>
                                                <div class=" d-flex flex-row ml-4 mt-3  me-5 col-4" >    
                                                    <label class=" pe-3 ms-3"for="floatingInput">ORC DE VENDA:</label>
                                                    <p class="m-0 border-bottom border-dark  col-4 d-flex justify-content-center">{{ $ordemServico->ORC_venda }}</p>        
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="col-6  border border-black ">
                                        <div class="row mb-3 mt-4">
                                            <div class=" d-flex flex-row col align-items-center">
                                                <label class="  mx-2  "for="">Cliente:</label>
                                                <p class="m-0 border-bottom border-dark  col-10">{{ $ordemServico->cliente }}</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class=" d-flex flex-row  col d-flex align-items-center">
                                                <label class="  mx-2"for="">Serviço:</label>
                                                <p class="m-0 border-bottom border-dark  col-10">{{ $ordemServico->servico}}</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col  d-flex flex-row d-flex align-items-center">
                                                <label class="  mx-2"for="">Endereço:</label>
                                                <p class="m-0 border-bottom border-dark  col-10">{{ $ordemServico->end}}</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col d-flex align-items-center" x-data="{ telefone : ' ' }">
                                                <label class="  mx-2"for="">Fone:</label>
                                                <p class="m-0 border-bottom border-dark  col-10">{{ $ordemServico->fone}}</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col d-flex align-items-center">
                                                <label class=" mx-2">Valor R$:</label>
                                                <p class="m-0 border-bottom border-dark  col-8">{{ $ordemServico->valor}}</p>
                                            </div>
                                            <div class="col-6 form-floating d-flex justify-content-between d-flex align-items-center">
                                                <span>Pago:</span>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input  border border-black  rounded-0 opacity-100" type="radio" name="pago" id="pago_sim" value="sim" 
                                                    {{ $ordemServico->pago == 'sim' ? 'checked' : '' }} disabled>
                                                    <label class="form-check-label opacity-100" for="pago_sim">Sim</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input border border-black rounded-0 opacity-100" type="radio" name="pago" id="pago_nao" value="nao" 
                                                            {{ $ordemServico->pago == 'nao' ? 'checked' : '' }} disabled>
                                                    <label class="form-check-label opacity-100" for="pago_nao">Não</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input border border-black rounded-0 opacity-100" type="radio" name="pago" id="pago_50" value="50%" 
                                                            {{ $ordemServico->pago == '50%' ? 'checked' : '' }} disabled>
                                                    <label class="form-check-label  opacity-100" for="pago_50">50%</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col  d-flex flex-row  align-items-center">
                                                <label class="  mx-2 ">Falta:</label>
                                                <p class=" text-danger m-0 border-bottom border-dark  col-10">{{ $ordemServico->falta}}</p>   
                                            </div>
                                        </div>
                                        <div style="border: 2px solid #094081;" class="col-13 row d-flex justify-content-evenly  ">   
                                            <h5 style="background-color: #094081;" class="col-12 d-flex justify-content-center text-white">PRAZO  DE ENTREGA DO SERVIÇO</h5>
                                            <div class=" d-flex justify-content-evenly">
                                                <div class="col-5"> 
                                                    <div class="row mb-3 ">
                                                        <div class="col d-flex align-items-center">
                                                            <label class="  mx-2">D.R:</label>
                                                            <p class="m-0">{{ date('d/m/Y', strtotime($ordemServico->data_de_recebimento)) }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col d-flex  align-items-center">
                                                            <label class="  mx-2">D.E:</label>
                                                            <p class="m-0">{{ date('d/m/Y', strtotime($ordemServico->data_de_entrega)) }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3 col-6 d-flex align-items-center">
                                                    <div>
                                                        <label class="mx-2 mb-3 d-flex justify-content-center">HORA ENTREGA:</label>
                                                        <p class="d-flex justify-content-center m-0 border-bottom border-dark  ">{{ $ordemServico->hora_de_entrega}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>              
                                    <div class=" p-0 flex-wrap col-6 form-floating d-flex d-flex justify-content-evenly flex-wrap">
                                        <div class="col-12 row d-flex justify-content-evenly border border-success border-bottom-0 ">
                                            <h5 class="col-12 d-flex justify-content-center text-bg-success align-items-center">PRAZO DA IMPRESSÃO</h5>
                                            <div class="row mb-3 col-6 align-items-center">
                                                <div class="col  d-flex align-items-center justify-content-center">
                                                    <label class="  mx-2">D.E:</label>
                                                    <p class="m-0">{{ date('d/m/Y', strtotime($ordemServico->prazo_da_impressao_data)) }}</p>
                                                </div>
                                            </div>
                                            <div class="row mb-3 col-6 align-items-center d-flex justify-content-center">
                                                <div class="col">
                                                    <label class=" d-flex justify-content-center ms-3">HORA ENTREGA:</label>
                                                    <p class=" d-flex justify-content-center m-0 border-bottom border-dark">{{ $ordemServico->prazo_da_impressao_hora}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="border: 2px solid #FF8A00;" class="col-12 row d-flex justify-content-evenly border-bottom-0 ">
                                            <h5 style="background-color: #FF8A00;" class="col-12 d-flex justify-content-center text-white align-items-center">ESTA ABA É RESTRITAMENTE DO IMPRESSOR</h5>
                                            <div class="col-6 row mb-3 align-items-center">
                                                <div class="">
                                                    <label class=" d-flex justify-content-center ms-3">DIA REC. DO CONTROLE </label>
                                                    <p class= " m-0 d-flex justify-content-center">{{ date('d/m/Y', strtotime($ordemServico->dia_do_recebimento_do_controle)) }}</p>
                                                </div>
                                            </div>
                                            <div class="row mb-3 col-6 align-items-center ">
                                                <div class="">
                                                    <label class="d-flex justify-content-center ms-3" for="">HORA REC. </label>
                                                    <p class=" m-0 d-flex justify-content-center border-bottom border-dark">{{ $ordemServico->hora_do_recebimento_do_controle}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="border: 2px solid #8F00FF;" class="col-12 row d-flex justify-content-evenly  border-bottom-0 ">
                                            <h5 style="background-color: #8F00FF;" class="col-12 d-flex justify-content-center text-white align-items-center">SERVIÇO EXTERNO</h5>
                                            <div class="col-6 form-floating d-flex justify-content-between d-flex align-items-center">
                                                <div class="form-check form-check-inline ">
                                                    <input class="form-check-input border border-black  rounded-0 opacity-100" type="radio" name="servico_externo" id="servico_externo" value="1" {{ $ordemServico->servico_externo == '1' ? 'checked' : '' }} disabled>
                                                    <label class="form-check-label opacity-100" for="inlineRadio1">Sim</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input  border border-black  rounded-0 opacity-100" type="radio" name="servico_externo" id="servico_externo" value="0" {{ $ordemServico->servico_externo == '0' ? 'checked' : '' }} disabled>
                                                    <label class="form-check-label opacity-100" for="inlineRadio2">Não</label>
                                                </div>
                                            </div>
                                        </div> 
                                        <div style="border: 2px solid #D80707;"  class="col-12 row d-flex justify-content-evenly  ">
                                            <h5 style="background-color: #D80707;" class="col-12 d-flex justify-content-center text-white align-items-center">FORMAS DE PAGAMENTO SERVIÇO EXTERNO</h5>
                                            <div class=" d-flex justify-content-evenly">
                                                <div class="d-flex flex-column">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input  border border-black rounded-0 opacity-100" type="radio" name="formas_de_pagamento" id="formas_de_pagamento" value="pix"{{ $ordemServico->formas_de_pagamento == 'pix' ? 'checked' : '' }} disabled>
                                                        <label class="form-check-label opacity-100" for="inlineRadio1">PIX</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input  border border-black  rounded-0 opacity-100" type="radio" name="formas_de_pagamento" id="formas_de_pagamento" value="transfbanc./deposito" {{ $ordemServico->formas_de_pagamento == 'transfbanc./deposito' ? 'checked' : '' }} disabled>
                                                        <label class="form-check-label opacity-100" for="inlineRadio1">CARTÃO</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input  border border-black  rounded-0 opacity-100" type="radio" name="formas_de_pagamento" id="formas_de_pagamento" value="pag.naloja"  {{ $ordemServico->formas_de_pagamento == 'pag.naloja' ? 'checked' : '' }} disabled> 
                                                        <label class="form-check-label opacity-100" for="inlineRadio1">TRANSF.BANC./DEPÓSITO</label>
                                                    </div>
                                                </div>
                                                <div class=" d-flex flex-column">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input  border border-black  rounded-0 opacity-100" type="radio" name="formas_de_pagamento" id="formas_de_pagamento" value="dinheiro"  {{ $ordemServico->formas_de_pagamento == 'dinheiro' ? 'checked' : '' }} disabled>
                                                        <label class="form-check-label opacity-100" for="inlineRadio1">DINHEIRO</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input  border border-black  rounded-0 opacity-100" type="radio" name="formas_de_pagamento" id="formas_de_pagamento" value="cartao"  {{ $ordemServico->formas_de_pagamento == 'cartao' ? 'checked' : '' }} disabled>
                                                        <label class="form-check-label opacity-100" for="inlineRadio1">PAG. NA LOJA</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>   
                                    </div>
                                    <div class="p-0 ">
                                        <div class="border border-black">
                                            <h4 style="background-color: #9B9A9C;" class="d-flex justify-content-center col-12">OBSERVAÇÃO:</h4>
                                            <div class="row mb-3">
                                                <div class="col form-floating mx-2">
                                                    @foreach (explode("\n", $ordemServico->observacoes_pedido) as $linha)
                                                        <p class="m-0 border-bottom border-dark" >
                                                        {{ strtoupper(e($linha)) }}
                                                        </p>
                                                    @endforeach
                                                    @error('observacoes_pedido')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border border-dark  ">             
                                        @if (session('success'))
                                            <p>{{ session('success') }}</p>
                                            <div id="image-preview">
                                                <img src="{{ asset('storage/' . session('path')) }}" alt="Imagem carregada">
                                            </div>
                                        @endif
                                        @if ($errors->any())
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                        <div class="col d-flex flex-row  d-flex align-items-center mt-3">
                                            <h4 class="m-0 ">LAYOUT:</h4>
                                        </div>
                                        <div class="border border-dark-subtle mt-3">
                                            <div class="d-flex justify-content-center " style="height: 200px" id="layout">
                                                <img class="m-3  img-fluid" id="preview" src="{{ asset('uploads/ordemdeservico/' . $ordemServico->layout) }}" alt="Nenhuma imagem selecionada ">
                                            </div>
                                        </div>
                                        <div class="col-6 form-floating d-flex justify-content-between d-flex align-items-center mt-3">
                                            <h4 class="m-0">EMBALAGEM:</h4>
                                            <div class="form-check form-check-inline ms-2">
                                                <input class="form-check-input rounded-0  border border-black opacity-100" type="radio" name="embalagem" id="embalagem" value="sim" {{ $ordemServico->embalagem == 'sim' ? 'checked' : '' }} disabled>
                                                <label class="form-check-label opacity-100" for="inlineRadio1">SIM</label>
                                            </div>
                                            <div class="form-check form-check-inline m-2">
                                                <input class="form-check-input rounded-0 border border-black opacity-100" type="radio" name="embalagem" id="embalagem" value="nao" {{ $ordemServico->embalagem == 'nao' ? 'checked' : '' }} disabled>
                                                <label class="form-check-label opacity-100" for="inlineRadio1">NÃO</label>
                                            </div>
                                            <div class="col d-flex flex-row d-flex align-items-center ">
                                                <h4 class="d-flex align-items-center m-0 p-2">OBS:</h4>
                                                <p class="m-0 border-bottom border-dark  col-10">{{ $ordemServico->observacoes_layout }}</p>
                                                @error('observacoes_layout')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-between mt-5 ">
                                    <div class="col-9 ">
                                        <div class="col-8">
                                            <p class="m-0 border-bottom border-dark  col-12 d-flex justify-content-center mt-4"> </p>
                                        </div>
                                        <div class="col-8">
                                            <h4 class=" d-flex justify-content-center">Serviço Autorizado pelo cliente</h4>
                                            <p>Declaro Ter Lido. Corrigido Tanto Textualmente Quando Visualmante Meu Serviço</p>
                                        </div>
                                    </div>
                                    <div class="col-3 ">
                                        <p class="m-0 border-bottom border-dark  col-12 d-flex justify-content-center">{{ $ordemServico->nome_funcionario}}</p>
                                        <h4 class=" d-flex justify-content-center">Funcionario(a)</h4>
                                    </div>
                                </div>
                                <div class="col-12 d-flex align-items-center border border-black px-2 ">
                                    <div class="d-flex flex-column col-8 mb-3">
                                        <h3 class="ms-4 mt-2">2 Via</h3>
                                        <div class="row mb-3 mt-2">
                                            <div class=" d-flex flex-row col align-items-center">
                                                <label class="  mx-2  "for="">Cliente:</label>
                                                <p class="m-0 border-bottom border-dark  col-10">{{ $ordemServico->cliente }}</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class=" d-flex flex-row  col d-flex align-items-center">
                                                <label class="  mx-2"for="">Serviço:</label>
                                                <p class="m-0 border-bottom border-dark  col-10">{{ $ordemServico->servico}}</p>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row">
                                            <div class="d-flex  align-items-center">
                                                <label class="  mx-2">D.E:</label>
                                                <p class="d-flex justify-content-center m-0 border-bottom border-dark  ">{{ date('d/m/Y', strtotime ($ordemServico->data_de_entrega))}}</p>
                                            </div>
                                            <div class="d-flex flex-row ms-3">
                                                <label class=" d-flex justify-content-center">HORA ENTREGA:</label>
                                                <p class="d-flex justify-content-center m-0 border-bottom border-dark  ">{{ $ordemServico->hora_de_entrega}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class=" ml-4 d-flex flex-row mt-3 d-flex justify-content-center ">
                                            <label class=" pe-3 ms-3"for="floatingInput">CÓD. ARTE:</label>
                                            <p class="m-0 border-bottom border-dark  col-4 d-flex justify-content-center">{{ $ordemServico->id }}</p>
                                        </div>
                                        <div class="d-flex flex-row mt-3 ml-3 d-flex justify-content-center">
                                            <p>Pago:</p>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input border border-black rounded-0 opacity-100" type="radio" name="pago" id="pago_sim" value="sim" 
                                                    {{ $ordemServico->pago == 'sim' ? 'checked' : '' }} disabled>
                                                <label class="form-check-label opacity-100" for="pago_sim">Sim</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input border border-black rounded-0 opacity-100" type="radio" name="pago" id="pago_nao" value="nao" 
                                                    {{ $ordemServico->pago == 'nao' ? 'checked' : '' }} disabled>
                                                <label class="form-check-label opacity-100" for="pago_nao">Não</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input border border-black rounded-0 opacity-100" type="radio" name="pago" id="pago_50" value="50%" 
                                                    {{ $ordemServico->pago == '50%' ? 'checked' : '' }} disabled>
                                                <label class="form-check-label  opacity-100" for="pago_50">50%</label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column ">
                                            <div >
                                                <p class="m-0 border-bottom border-dark  col-12 d-flex justify-content-center" >{{ $ordemServico->nome_funcionario}}</p>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <p >Funcionario(A)</p>
                                            </div>
                                        </div>        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Alpine Plugins -->
                <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/mask@3.x.x/dist/cdn.min.js"></script>
                <!-- Alpine Core -->
                <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
                <script src="{{ asset('js/input_image.js') }}"></script>
                <script src="{{ asset('js/mascara.js') }}"></script>
            </main>
        </div>
    </body>
</html>
