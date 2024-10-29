
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
                                <a style="background-color: #DC1C2E;border: 2px solid #DC1C2E;"  href="{{ route('adminFuncionario.home',['id'=> $funcionario->id])}}" class="btn btn-primary me-3">Cancelar</a>
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
                                    <select id="usertype" name="usertype" class="form-control pe-5" required >
                                    <option value="" disabled selected>Selecione uma Categoria</option>
                                    <option value="guiche" {{ $funcionario->usertype === 'guiche' ? 'selected' : '' }}>guiche</option>
                                    <option value="impressao" {{  $funcionario->usertype === 'impressao' ? 'selected' : '' }}>impressao</option>
                                    <option value="producao" {{ $funcionario->usertype === 'producao' ? 'selected' : '' }}>producao</option>
                                    <option value="caixa" {{  $funcionario->usertype === 'caixa' ? 'selected' : '' }}>caixa</option>
                                    <option value="admin" {{  $funcionario->usertype === 'admin' ? 'selected' : '' }}>admin</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-11">
                                <label class="ms-2 mb-2" for="">Nome</label>
                                <input type="text" name="name" class="form-control"  id="name" placeholder="Nome do Funcionario" value="{{$funcionario->name}}" required>
                                @error('nome')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-11">
                                <label class="ms-2 mb-2" for="">CPF</label>
                                <input type="text" name="cpf" class="form-control" id="cpf" placeholder="CPF do Cliente" value="{{$funcionario->cpf}}" required>
                                @error('cpf')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6" >
                                <label class="ms-2 mb-2" for="">senha</label>
                                <input type="text" name="password" class="form-control" id="password" placeholder="Senha" value="{{$funcionario->password}}" required>
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