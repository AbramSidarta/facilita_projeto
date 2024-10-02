
<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between d-flex align-items-center"   >
            <span class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Visualizar Ordem de Serviço') }}
            </span>
           
        </div>
       
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 col-7">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                 
                    
                    @if (session()->has('error'))
                    <div>
                        {{session('error')}}
                    </div>
                    @endif
        
                    <form action="{{ route('adminFuncionario.update',[$funcionario->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <span class="col-12 d-flex row">
                            <h1 class="col-8">Editar Funcionario</h1>
                            <div class="col-4 d-flex align-items-center">
                                <a style="background-color: #DC1C2E;border: 2px solid #DC1C2E;"  href="{{ route('adminFuncionario.show',['id'=> $funcionario->id])}}" class="btn btn-primary me-3">Cancelar</a>
                                <div class="row">
                                    <div class="d-grid">
                                        <button style="background-color: #198754;border: 2px solid #198754;" href="" class="btn btn-primary">Pronto</button>
                                    </div>
                                </div>
                            </div>
                        </span>
                        <hr />
                        <div class="d-flex flex-row d-flex align-items-center  d-flex justify-content-end">
                            <h6 class="m-0">Niveis de acesso:</h6>
                            <div class="row ms-1">
                                <div class="col ">
                                    <select id="funcao" name="funcao" class="form-control pe-5" required >
                                    <option value="">Selecione uma Categoria</option>
                                    <option value="1" {{ $funcionario->funcao === '1' ? 'selected' : '' }}>1</option>
                                    <option value="2" {{  $funcionario->funcao === '2' ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ $funcionario->funcao === '3' ? 'selected' : '' }}>3</option>
                                    <option value="4" {{  $funcionario->funcao === '4' ? 'selected' : '' }}>4</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-11">
                                <label class="ms-2 mb-2" for="">Nome</label>
                                <input type="text" name="nome" class="form-control" placeholder="Nome" id="nome" placeholder="Nome do Cliente" value="{{$funcionario->nome}}" required>
                                @error('nome')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-11">
                                <label class="ms-2 mb-2" for="">CPF</label>
                                <input type="text" name="cpf" class="form-control" placeholder="Endereço" id="cpf" placeholder="Endereço do Cliente" value="{{$funcionario->cpf}}" required>
                                @error('cpf')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6" >
                                <label class="ms-2 mb-2" for="">senha</label>
                                <input type="text" name="senha" class="form-control" placeholder="Telefone" id="senha" placeholder="Telefone do Cliente" value="{{$funcionario->senha}}" required>
                                @error('senha')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
 
                        
                   
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