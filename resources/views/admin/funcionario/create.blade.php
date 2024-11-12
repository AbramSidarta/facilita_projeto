
<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between d-flex align-items-center"   >
            <span class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Cadastrar Funcionário') }}
            </span>
            <a style="background-color: #ADB5BD;border: 2px solid #ADB5BD;" href="{{ route('adminFuncionario.index') }}" class="btn btn-primary text-dark">Voltar</a>
        </div>
       
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 col-7">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-0">Cadastrar Funcionario</h1>
                  
                    @if (session()->has('error'))
                    <div>
                        {{session('error')}}
                    </div>
                    @endif
        
                    <form action="{{ route('adminFuncionario.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                       
                        <div class="d-flex flex-row d-flex align-items-center d-flex justify-content-end mt-4" >
                            <h6 class="m-0">Niveis de acesso:</h6>
                            <div class="row ms-1">
                                <div class="col ">
                                    <select id="funcao" name="funcao" class="form-control pe-5" required >
                                    <option value="">Selecione um nivel</option>
                                    <option value="1" {{ old('funcao') === '1' ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ old('funcao') === '2' ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ old('funcao') === '3' ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ old('funcao') === '4' ? 'selected' : '' }}>4</option>
                                    </select>
                                </div>
                                @error('funcao')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <hr />
                        <div class="d-flex flex-row  mb-3 mt-4">
                            <div class="col-8 d-flex flex-row d-flex align-items-center">
                                <label class="mx-2" for="">Nome:</label>
                                <input type="text" name="nome" class="form-control" placeholder="Nome">
                                @error('nome')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        
                        
                        <div class="row mb-3">
                            <div class="col-6 d-flex flex-row d-flex align-items-center">
                           
                                <label class="mx-2" for="">CPF:</label>
                                <input type="text" name="cpf" class="form-control" id="cpf"placeholder="CPF">
                              

                                @error('cpf')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6 d-flex flex-row d-flex align-items-center">
                              
                                <label class="mx-2" for="">Senha:</label>
                                <input type="password" name="senha" class="form-control" placeholder="Senha"   >
                                @error('senha')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
 
                        <div class="row">
                            <div class="d-grid col-12 d-flex justify-content-end">
                                <button style="background-color: #1F2937;border: 2px solid #1F2937;" class="col-3 btn btn-primary">Cadastrar</button>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/mask@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Alpine Core -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script src="{{ asset('js/input_image.js') }}"></script>
    <script src="{{ asset('js/mascara.js') }}"></script>
</x-app-layout>