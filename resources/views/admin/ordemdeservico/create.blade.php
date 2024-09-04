<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between d-flex align-items-center"   >
            <span class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Visualizar Ordem de Serviço') }}
            </span>
            <a href="{{ route('adminOrdemDeServico.index') }}" class="btn btn-primary">Voltar</a>
        </div>
       
    </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        @if (session()->has('error'))
                            <div>
                                {{session('error')}}
                            </div>
                        @endif                
                        <form action="{{ route('adminOrdemDeServico.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="d-flex justify-content-between d-flex align-items-center">
                                <div class="d-flex flex-row ">
                                    <h3 class="">Estados da ordem de serviço:</h3>
                                    <div class="row mb-3 ms-1">
                                        <div class="col ">
                                            <select id="status" name="status" class="form-control pe-5" required >
                                                <option value="">Selecione uma Categoria</option>
                                                <option value="pendente">Pendente</option>
                                                <option value="impressão">Impressão</option>
                                                <option value="produção">Produção</option>
                                                <option value="concluido">Concluido</option>
                                                <option value="entregue">Entregue</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between d-flex align-items-center">
                                    <a href="#" class="btn btn-primary me-3">Imprimir</a>
                                    <div class="row">
                                        <div class="d-grid">
                                            <button class="btn btn-primary">Enviar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />
                            <div class="row mb-3">
                                <div class="col-10 d-flex justify-content-between align-items-center">
                                    <x-application-logo class="block h-20 fill-current text-gray-800" />
                                    <div class=" form-floating ml-4">
                                        <input type="text" name="" class="form-control floatingInput" id="" placeholder="CÓD. ARTE" value="{{old('')}}"  disabled="disabled">
                                        <label class="text-body-secondary  ms-3"for="floatingInput">CÓD. ARTE</label>
                                        @error('ORC_venda')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class=" form-floating ml-4">
                                        <input type="text" name="ORC_venda" class="form-control floatingInput" id="ORC_venda" placeholder="ORC de venda" value="{{old('ORC_venda')}}" required>
                                        <label class="text-body-secondary  ms-3"for="floatingInput">ORC DE VENDA</label>
                                        @error('ORC_venda')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                               
                                <div class="col-6 mt-4">
                                    <div class="row mb-3">
                                        <div class="col d-flex justify-content-between align-items-center">
                                            <label class="text-body-secondary  mx-2"for="">Cliente:</label>
                                            <input type="text" name="cliente" class="form-control " id="cliente" placeholder="Nome do Cliente" value="{{old('cliente')}}" required>
                                            @error('cliente')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col d-flex justify-content-between align-items-center">
                                            <label class="text-body-secondary  mx-2"for="">Serviço:</label>
                                            <input type="text" name="servico" class="form-control " id="servico" placeholder="Serviço" value="{{old('servico')}}" required>
                                            @error('servico')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col d-flex justify-content-between align-items-center">
                                            <label class="text-body-secondary  mx-2"for="">Endereço:</label>
                                            <input type="text" name="end" class="form-control" id="end" placeholder="Endereço" value="{{old('end')}}" required>
                                            @error('end')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col d-flex justify-content-between align-items-center">
                                            <label class="text-body-secondary  mx-2"for="">Fone:</label>
                                            <input type="text" name="fone" class="form-control " id="fone" placeholder="Fone" value="{{old('fone')}}">
                                            @error('fone')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 d-flex justify-content-between align-items-center">
                                            <label class="text-body-secondary  mx-2">Valor R$:</label>
                                            <input type="text" name="valor" class="form-control " id="valor" placeholder="Valor R$" value="{{old('valor')}}" required>
                                            @error('valor')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="col-6 form-floating d-flex justify-content-between d-flex align-items-center">
                                            <span>Pago:</span>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="pago" id="pago" value="sim">
                                                <label class="form-check-label" for="inlineRadio1">Sim</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="pago" id="pago" value="nao">
                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="pago" id="pago" value="50%">
                                                <label class="form-check-label" for="inlineRadio2">50%</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col d-flex justify-content-between align-items-center">
                                            <label class="text-body-secondary  mx-2">Falta:</label>
                                            <input type="text" name="falta" class="form-control " id="falta" placeholder="Falta" value="{{old('falta')}}">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center col-12">
                                        <h5 class="">Prazo De Entrega Do Serviço</h5>
                                    </div>
                                    <div class=" d-flex justify-content-between">
                                        
                                        <div class="col-5"> 
                                            <div class="row mb-3">
                                                <div class="col d-flex justify-content-between align-items-center">
                                                    <label class="text-body-secondary  mx-2">D.R:</label>
                                                    <input type="date" name="data_de_recebimento" class="form-control " id="data_de_recebimento" placeholder="Data de recebimento" value='<?php echo date("Y-m-d"); ?>'>
                                                    @error('data_de_recebimento')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col d-flex justify-content-between align-items-center">
                                                    <label class="text-body-secondary  mx-2">D.E:</label>
                                                    <input type="date" name="data_de_entrega" class="form-control " id="data_de_entrega" placeholder="Data de entrega" value="{{old('data_de_entrega')}}">
                                                    @error('data_de_entrega')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-3 col-6">
                                            <div>
                                                <label class="text-body-secondary  mx-2">HORA ENTREGA:</label>
                                                <input type="text" name="hora_de_entrega" class="form-control " id="hora_de_entrega" placeholder="Hora de entrega" value="{{old('hora_de_entrega')}}">
                                                @error('hora_de_entrega:')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            <div class="mt-4 d-flex align-content-start flex-wrap col-6 form-floating d-flex d-flex justify-content-evenly d-flex align-items-center align-content-around flex-wrap">
                                <h5 class="col-12 d-flex justify-content-center">PRAZO DA IMPRESSÃO</h5>
                                <div class="row mb-3">
                                    <div class="col form-floating">
                                        <input type="date" name="prazo_da_impressao_data" class="form-control floatingInput" id="prazo_da_impressao_data" placeholder="Data de entrega da impressão" value="{{old('prazo_da_impressao_data')}}">
                                        <label class="text-body-secondary  ms-3"for="floatingInput">D.E:</label>
                                        @error('prazo_da_impressao_data')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col form-floating">
                                        <input type="text" name="prazo_da_impressao_hora" class="form-control floatingInput" id="prazo_da_impressao_hora" placeholder="Hora de entrega da impressão" value="{{old('prazo_da_impressao_hora')}}">
                                        <label class="text-body-secondary  ms-3"for="floatingInput">HORA ENTREGA:</label>
                                        @error('prazo_da_impressao_hora')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <h5 class="col-12 d-flex justify-content-center">ESTA ABA É RESTRITAMENTE DO IMPRESSOR</h5>
                                <div class="col-5 row mb-3">
                                    <div class=" form-floating">
                                        <input type="date" name="dia_do_recebimento_do_controle" class="form-control floatingInput" id="dia_do_recebimento_do_controle" placeholder="Rec. do controle" value="{{old('dia_do_recebimento_do_controle')}}">
                                        <label class="text-body-secondary  ms-3"for="floatingInput">DIA REC. DO CONTROLE </label>
                                        @error('dia_do_recebimento_do_controle')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col form-floating">
                                        <input type="text" name="hora_do_recebimento_do_controle" class="form-control floatingInput" id="hora_do_recebimento_do_controle" placeholder="Hora do recebimento do controle" value="{{old('hora_do_recebimento_do_controle')}}">
                                        <label class="text-body-secondary  ms-3"for="floatingInput">HORA REC. </label>
                                        @error('hora_do_recebimento_do_controle')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <h5 class="col-12 d-flex justify-content-center">SERVIÇO EXTERNO</h5>
                                <div class="col-6 form-floating d-flex justify-content-between d-flex align-items-center">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="servico_externo" id="servico_externo" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Sim</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="servico_externo" id="servico_externo" value="0">
                                        <label class="form-check-label" for="inlineRadio2">Não</label>
                                    </div>
                                </div>
                                <h5 class="col-12 d-flex justify-content-center">FORMAS DE PAGAMENTO SERVIÇO EXTERNO</h5>
                                <div class="col-6 form-floating d-flex justify-content-between d-flex align-items-center d-flex align-content-stretch flex-wrap">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="formas_de_pagamento" id="formas_de_pagamento" value="pix">
                                        <label class="form-check-label" for="inlineRadio1">PIX</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="formas_de_pagamento" id="formas_de_pagamento" value="cartao">
                                        <label class="form-check-label" for="inlineRadio1">PAG. NA LOJA</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="formas_de_pagamento" id="formas_de_pagamento" value="transfbanc./deposito">
                                        <label class="form-check-label" for="inlineRadio1">CARTÃO</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="formas_de_pagamento" id="formas_de_pagamento" value="dinheiro">
                                        <label class="form-check-label" for="inlineRadio1">DINHEIRO</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="formas_de_pagamento" id="formas_de_pagamento" value="pag.naloja">
                                        <label class="form-check-label" for="inlineRadio1">TRANSF.BANC./DEPÓSITO</label>
                                    </div>
                                </div>
                            </div>
                            <h4 class="d-flex justify-content-center col-12">OBSERVAÇÃO:</h4>
                            <div class="row mb-3">
                                <div class="col form-floating">
                                    <input type="text" name="observacoes_pedido" class="form-control floatingInput" id="observacoes_pedido" placeholder="Observacoes da ordem" value="{{old('observacoes_pedido')}}">
                                    <label class="text-body-secondary  ms-3"for="floatingInput">OBSERVAÇÕES</label>
                                    @error('observacoes_pedido')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <h4>LAYOUT</h4>
                            <div class="row mb-3">
                                <div class="col form-floating">
                                    <input type="text" name="layout" class="form-control floatingInput" id="layout" placeholder="Layout" value="{{old('layout')}}">
                                    <label class="text-body-secondary  ms-3"for="floatingInput"></label>
                                    @error('layout')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-6 form-floating d-flex justify-content-between d-flex align-items-center">
                                <h4>EMBALAGEM:</h4>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="embalagem" id="embalagem" value="sim">
                                    <label class="form-check-label" for="inlineRadio1">SIM</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRembalagemadioOptions" id="embalagem" value="nao">
                                    <label class="form-check-label" for="inlineRadio1">NÃO</label>
                                </div>
                                <h4>OBS:</h4>
                                <div class="row mb-3">
                                    <div class="col form-floating">
                                        <input type="text" name="observacoes_layout" class="form-control floatingInput" id="observacoes_layout" placeholder="Observacoes" value="{{old('observacoes_layout')}}">
                                        <label class="text-body-secondary  ms-3"for="floatingInput"></label>
                                        @error('observacoes_layout')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 form-floating d-flex justify-content-end justify-content-around mt-5">
                                <div class="row mb-3">
                                    <div class="col form-floating me-5">
                                        <input type="text" name="nome_funcionario" class="form-control floatingInput" id="nome_funcionario" placeholder="Nome do funcionario" value="nome_funcionario">
                                        <label class="text-body-secondary  ms-3"for="floatingInput"></label>
                                        <h2>Funcionario</h2>
                                        @error('nome_funcionario')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                    
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
        