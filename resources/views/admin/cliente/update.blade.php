
<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between d-flex align-items-center"   >
            <span class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Visualizar Ordem de Serviço') }}
            </span>
            <a style="background-color: #ADB5BD;border: 2px solid #ADB5BD;" href="{{ route('adminCliente.index') }}" class="btn btn-primary text-dark">Voltar</a>
        </div>
       
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 col-7">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <span class="d-flex d-flex row" >
                        <h1 class="mb-0 col-10">Cadastrar Cliente</h1>
                        <button style="background-color: #198754;border: 2px solid #198754;" href="" class="btn btn-primary col-2">Pronto</button>
                        
                    </span>
                    
                    <hr />
                    @if (session()->has('error'))
                    <div>
                        {{session('error')}}
                    </div>
                    @endif
        
                    <form action="{{ route('adminCliente.update',[$cliente->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-11">
                                <label class="ms-2 mb-2" for="">Nome</label>
                                <input type="text" name="name" class="form-control" placeholder="Nome" id="name" placeholder="Nome do Cliente" value="{{$cliente->name}}" required>
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-11">
                                <label class="ms-2 mb-2" for="">Endereço</label>
                                <input type="text" name="endereco" class="form-control" placeholder="Endereço" id="endereco" placeholder="Endereço do Cliente" value="{{$cliente->endereco}}" required>
                                @error('endereco')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label class="ms-2 mb-2" for="">Telefone</label>
                                <input type="text" name="telefone" class="form-control" placeholder="Telefone" id="telefone" placeholder="Telefone do Cliente" value="{{$cliente->telefone}}" required>
                                @error('telefone')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
 
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>