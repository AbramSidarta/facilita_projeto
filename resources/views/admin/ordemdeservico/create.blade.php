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
                        <form action="{{ route('admin.OrdemDeServico.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="d-flex justify-content-between d-flex align-items-center">
                                <div class="d-flex flex-row ">
                                    <h3 class="">Estados da ordem de serviço:</h3>
                                    <div class="row mb-3">
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
                                <div class="col form-floating">
                                    <input type="text" name="cliente" class="form-control floatingInput" id="cliente" placeholder="Cliente" value="{{old('cliente')}}">
                                    <label class="text-body-secondary  ms-3"for="floatingInput">Cliente</label>
                                    @error('cliente')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col form-floating">
                                    <input type="text" name="servico" class="form-control floatingInput" id="servico" placeholder="Serviço" value="{{old('servico')}}">
                                    <label class="text-body-secondary  ms-3"for="floatingInput">Serviço</label>
                                    @error('servico')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col form-floating">
                                    <input type="text" name="end" class="form-control floatingInput" id="end" placeholder="Endereço" value="{{old('end')}}">
                                    <label class="text-body-secondary  ms-3"for="floatingInput">Endereço</label>
                                    @error('end')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col form-floating">
                                    <input type="text" name="fone" class="form-control floatingInput" id="fone" placeholder="Fone" value="{{old('fone')}}">
                                    <label class="text-body-secondary  ms-3"for="floatingInput">Fone:</label>
                                    @error('fone')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-6 form-floating">
                                    <input type="text" name="valor" class="form-control floatingInput" id="valor" placeholder="Valor R$" value="{{old('valor')}}">
                                    <label class="text-body-secondary  ms-3"for="floatingInput">valor R$:</label>
                                    @error('valor')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-6 form-floating d-flex justify-content-between d-flex align-items-center">
                                    <p>Pago:</p>
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
                                <div class="col form-floating">
                                    <input type="text" name="falta" class="form-control floatingInput" id="falta" placeholder="Falta" value="{{old('falta')}}">
                                    <label class="text-body-secondary  ms-3"for="floatingInput">falta</label>
                                    @error('falta')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col form-floating">
                                    <input type="date" name="data_de_recebimento" class="form-control floatingInput" id="data_de_recebimento" placeholder="Data de recebimento" value='<?php echo date("Y-m-d"); ?>'>
                                    <label class="text-body-secondary  ms-3"for="floatingInput">D.R:</label>
                                    @error('data_de_recebimento')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col form-floating">
                                    <input type="date" name="data_de_entrega" class="form-control floatingInput" id="data_de_entrega" placeholder="Data de entrega" value="{{old('data_de_entrega')}}">
                                    <label class="text-body-secondary  ms-3"for="floatingInput">D.E:</label>
                                    @error('data_de_entrega')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col form-floating">
                                    <input type="text" name="hora_de_entrega" class="form-control floatingInput" id="hora_de_entrega" placeholder="Hora de entrega" value="{{old('hora_de_entrega')}}">
                                    <label class="text-body-secondary  ms-3"for="floatingInput">HORA ENTREGA:</label>
                                    @error('hora_de_entrega:')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <h3>PRAZO DA IMPRESSÃO</h3>
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
                            <h3>ESTA ABA É RESTRITAMENTE DO IMPRESSOR</h3>
                            <div class="row mb-3">
                                <div class="col form-floating">
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
                            <h4>SERVIÇO EXTERNO</h4>
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
                            <h4>FORMAS DE PAGAMENTO SERVIÇO EXTERNO</h4>
                                <div class="col-6 form-floating d-flex justify-content-between d-flex align-items-center">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="formas_de_pagamento" id="formas_de_pagamento" value="pix">
                                        <label class="form-check-label" for="inlineRadio1">PIX</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="formas_de_pagamento" id="formas_de_pagamento" value="cartao">
                                        <label class="form-check-label" for="inlineRadio1">CARTÃO</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="formas_de_pagamento" id="formas_de_pagamento" value="transfbanc./deposito">
                                        <label class="form-check-label" for="inlineRadio1">TRANSF.BANC. /DEPÓSITO</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="formas_de_pagamento" id="formas_de_pagamento" value="dinheiro">
                                        <label class="form-check-label" for="inlineRadio1">DINHEIRO</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="formas_de_pagamento" id="formas_de_pagamento" value="pag.naloja">
                                        <label class="form-check-label" for="inlineRadio1">PAG. NA LOJA</label>
                                    </div>
                                </div>
                            <h4>OBSERVAÇÃO:</h4>
                            <div class="row mb-3">
                                <div class="col form-floating">
                                    <input type="text" name="observacoes_pedido" class="form-control floatingInput" id="observacoes_pedido" placeholder="Observacoes da ordem" value="{{old('observacoes_pedido')}}">
                                    <label class="text-body-secondary  ms-3"for="floatingInput">OBSERVAÇÕES</label>
                                    @error('observacoes_pedido')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col form-floating">
                                    <input type="text" name="observacoes_pedido" class="form-control floatingInput" id="observacoes_pedido" placeholder="Observacoes da ordem" value="{{old('observacoes_pedido')}}">
                                    <label class="text-body-secondary  ms-3"for="floatingInput">OBSERVAÇÕES </label>
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
                            <h4>EMBALAGEM:</h4>
                            <div class="col-6 form-floating d-flex justify-content-between d-flex align-items-center">
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
                            <div class="col-6 form-floating d-flex justify-content-between d-flex justify-content-around">
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
        