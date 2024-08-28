<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between d-flex align-items-center"   >
            <span class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Visualizar Ordem de Serviço') }}
            </span>
            <a href="{{ route('adminOrdemDeServico.index') }}" class="btn btn-primary">Go Back</a>
        </div>
       
    </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="d-flex justify-content-between d-flex align-items-center">
                            <div class="d-flex flex-row ">
                                <h3 class="">Estados da ordem de serviço:</h3>
                                <div class="row mb-3">
                                    <div class="col ">
                                        <select id="category" name="category_id" class="form-control pe-5" required >
                                            <option value="">Selecione uma Categoria</option>
                                            <option value="pendente">Pendente</option>
                                            <option value="pendente">Impressão</option>
                                            <option value="pendente">Produção</option>
                                            <option value="pendente">Concluido</option>
                                            <option value="pendente">Entregue</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <a href="{{ route('adminOrdemDeServico.index') }}" class="btn btn-primary">Go Back</a>
                                <a href="{{ route('adminOrdemDeServico.index') }}" class="btn btn-primary">Go Back</a>
                            </div>
                        </div>
                        
                        <hr />
                    
                        <form action="{{ route('admin.OrdemDeServico.create') }}" method="POST" enctype="multipart/form-data">
                            @csrf
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
                                    <input type="text" name="servico" class="form-control floatingInput" id="servico" placeholder="serviço" value="{{old('servico')}}">
                                    <label class="text-body-secondary  ms-3"for="floatingInput">Serviço</label>
                                    @error('servico')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col form-floating">
                                    <input type="text" name="endereco" class="form-control floatingInput" id="endereco" placeholder="endereço" value="{{old('endereco')}}">
                                    <label class="text-body-secondary  ms-3"for="floatingInput">Endereço</label>
                                    @error('endereco')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col form-floating">
                                    <input type="text" name="fone" class="form-control floatingInput" id="fone" placeholder="Fone" value="{{old('fone')}}">
                                    <label class="text-body-secondary  ms-3"for="floatingInput">Fone</label>
                                    @error('fone')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-6 form-floating">
                                    <input type="text" name="valor" class="form-control floatingInput" id="valor" placeholder="valor R$" value="{{old('valor')}}">
                                    <label class="text-body-secondary  ms-3"for="floatingInput">valor R$</label>
                                    @error('valor')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-6 form-floating d-flex justify-content-between d-flex align-items-center">
                                    <p>Pago</p>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">Sim</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">Não</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">50%</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col form-floating">
                                    <input type="text" name="falta" class="form-control floatingInput" id="falta" placeholder="falta" value="{{old('falta')}}">
                                    <label class="text-body-secondary  ms-3"for="floatingInput">falta</label>
                                    @error('falta')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            

                            <div class="row">
                                <div class="d-grid">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
        