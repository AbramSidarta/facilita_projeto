<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between d-flex align-items-center"   >
            <span class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Visualizar Ordem de Serviço') }}
            </span>
            <a style="background-color: #ADB5BD;border: 2px solid #ADB5BD;" href="{{ route('adminOrdemDeServico.index') }}" class="btn btn-primary text-dark">Voltar</a>
        </div>
       
    </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                            <div class="d-flex justify-content-between d-flex align-items-center">
                                <div class="d-flex flex-row d-flex align-items-center">
                                    <h3 class="m-0">Estados da ordem de serviço:</h3>
                                    <div class="row ms-1">
                                        <div class="col border-2 rounded ms-3" style="border: 2px solid ##dee2e6;">
                                            <h4 class="m-0 p-1 ">{{ $ordemServico->status}}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between d-flex align-items-center">
                                    <a style="background-color: #094081;border: 2px solid #094081;"  href="#" class="btn btn-primary me-3">Imprimir</a>
                                    <div class="row">
                                        <div class="d-grid">
                                            <button style="background-color: #FF8A00;border: 2px solid #FF8A00;" class="btn btn-primary">Editar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />
                            <div class="row mb-3">
                                <div class="col-12 d-flex justify-content-between align-items-center border border-black">
                                    <div class="col-4">
                                        <x-application-logo class="block h-20 p-2 fill-current text-gray-800 " />
                                    </div>
                                    <div class=" ml-4 d-flex flex-row mt-3 col-4">
                                        
                                        <label class=" pe-3 ms-3"for="floatingInput">CÓD. ARTE:</label>
                                        <p class="m-0 border-bottom border-dark  col-4 d-flex justify-content-center">{{ $ordemServico->id }}</p>
                                    </div>
                                    <div class=" d-flex flex-row ml-4 mt-3  me-5 col-4" >
                                       
                                        <label class=" pe-3 ms-3"for="floatingInput">ORC DE VENDA:</label>
                                        <p class="m-0 border-bottom border-dark  col-4 d-flex justify-content-center">{{ $ordemServico->ORC_venda }}</p>
                                        
                                    </div>
                                </div>
                               
                                <div class="col-6 mt-4 border border-black ">
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
                                                <input class="form-check-input  border border-black  rounded-0" type="radio" name="pago" id="pago" value="sim">
                                                <label class="form-check-label " for="inlineRadio1 ">Sim</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input  border border-black   rounded-0" type="radio" name="pago" id="pago" value="nao">
                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input  border border-black   rounded-0" type="radio" name="pago" id="pago" value="50%">
                                                <label class="form-check-label" for="inlineRadio2">50%</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col  d-flex flex-row  align-items-center">
                                            <label class="  mx-2">Falta:</label>
                                            <p class="m-0 border-bottom border-dark  col-10">{{ $ordemServico->falta}}</p>
                                            
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
                            <div class="mt-4 p-0 flex-wrap col-6 form-floating d-flex d-flex justify-content-evenly flex-wrap">
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
                                            <input class="form-check-input border border-black  rounded-0" type="radio" name="servico_externo" id="servico_externo" value="1">
                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input  border border-black  rounded-0" type="radio" name="servico_externo" id="servico_externo" value="0">
                                            <label class="form-check-label" for="inlineRadio2">Não</label>
                                        </div>
                                    </div>
                                </div> 
                                <div style="border: 2px solid #D80707;"  class="col-12 row d-flex justify-content-evenly  ">
                                    <h5 style="background-color: #D80707;" class="col-12 d-flex justify-content-center text-white align-items-center">FORMAS DE PAGAMENTO SERVIÇO EXTERNO</h5>
                                    <div class=" d-flex justify-content-evenly">
                                        <div class="d-flex flex-column">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input  border border-black rounded-0" type="radio" name="formas_de_pagamento" id="formas_de_pagamento" value="pix">
                                                <label class="form-check-label" for="inlineRadio1">PIX</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input  border border-black  rounded-0" type="radio" name="formas_de_pagamento" id="formas_de_pagamento" value="transfbanc./deposito">
                                                <label class="form-check-label" for="inlineRadio1">CARTÃO</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input  border border-black  rounded-0" type="radio" name="formas_de_pagamento" id="formas_de_pagamento" value="pag.naloja">
                                                <label class="form-check-label" for="inlineRadio1">TRANSF.BANC./DEPÓSITO</label>
                                            </div>
                                        </div>
                                        <div class=" d-flex flex-column">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input  border border-black  rounded-0" type="radio" name="formas_de_pagamento" id="formas_de_pagamento" value="dinheiro">
                                                <label class="form-check-label" for="inlineRadio1">DINHEIRO</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input  border border-black  rounded-0" type="radio" name="formas_de_pagamento" id="formas_de_pagamento" value="cartao">
                                                <label class="form-check-label" for="inlineRadio1">PAG. NA LOJA</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                            </div>
                            <div class="p-0 mt-4">
                                <div class="border border-black">
                                    <h4  style="background-color: #9B9A9C;" class="d-flex justify-content-center col-12 ">OBSERVAÇÃO:</h4>
                                    <div class="row mb-3">
                                        <div class="col form-floating">
                                            <textarea type="text" name="observacoes_pedido" class="form-control floatingInput" style="height: 100px" id="observacoes_pedido" placeholder="Observacoes da ordem" value="{{old('observacoes_pedido')}}"></textarea>
                                            <label class="  ms-3"for="floatingInput">OBSERVAÇÕES</label>
                                            @error('observacoes_pedido')
                                                <span class="text-danger">{{$message}}</span>
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
                                    <div class="row">
                                        <div class="col ms-3">
                                            <input type="file" name="layout" class="form-control" id="layout" placeholder="Layout" value="{{old('layout')}}">
                                            @error('layout')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="border border-dark-subtle mt-3">
                                    <div class="d-flex justify-content-center " id="layout">
                                        <img class="m-3 " id="preview" src="" alt="Nenhuma imagem selecionada ">
                                    </div>
                                </div>
                                
                                <div class="col-6 form-floating d-flex justify-content-between d-flex align-items-center mt-3">
                                    <h4 class="m-0">EMBALAGEM:</h4>
                                    <div class="form-check form-check-inline ms-2">
                                        <input class="form-check-input rounded-0  border border-black " type="radio" name="embalagem" id="embalagem" value="sim">
                                        <label class="form-check-label" for="inlineRadio1">SIM</label>
                                    </div>
                                    <div class="form-check form-check-inline m-2">
                                        <input class="form-check-input rounded-0 border border-black" type="radio" name="embalagem" id="embalagem" value="nao">
                                        <label class="form-check-label" for="inlineRadio1">NÃO</label>
                                    </div>
                                    <div class="col d-flex flex-row ">
                                            <h4 class="d-flex align-items-center m-0 p-2">OBS:</h4>
                                            <input type="text" name="observacoes_layout" class="form-control " id="observacoes_layout" placeholder="Observacoes" value="{{old('observacoes_layout')}}">
                                            @error('observacoes_layout')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                </div>
                                    <div class="row mb-3">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 form-floating d-flex justify-content-end mt-5 me-4">
                                <div class="row mb-3">
                                    <div class="col me-5">
                                      
                                        <label class="  ms-3"for="floatingInput"></label>
                                        <p>{{ $ordemServico->nome_funcionario}}</p>
                                        <h2>Funcionario</h2>
                                     
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
</x-app-layout>
        