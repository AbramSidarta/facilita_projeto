
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
        
                    <form action="{{ route('adminCliente.update',[$cliente->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <span class="col-12 d-flex row">
                            <h1 class="col-8">Editar Cliente</h1>
                            <div class="col-4 d-flex align-items-center">
                                <a style="background-color: #DC1C2E;border: 2px solid #DC1C2E;"  href="{{ route('adminCliente.index',['id'=> $cliente->id])}}" class="btn btn-primary me-3">Cancelar</a>
                                <div class="row">
                                    <div class="d-grid">
                                        <button style="background-color: #198754;border: 2px solid #198754;" href="" class="btn btn-primary">Pronto</button>
                                    </div>
                                </div>
                            </div>
                        </span>
                        <hr />
                       
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
                            <div class="col-6" x-data="{ telefone : ' ' }">
                                <label class="ms-2 mb-2" for="">Telefone</label>
                                <input type="text" name="telefone" class="form-control" placeholder="Telefone" x-mask="(99) 99999-9999" id="telefone" placeholder="Telefone do Cliente" value="{{$cliente->telefone}}" required>
                                @error('telefone')
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