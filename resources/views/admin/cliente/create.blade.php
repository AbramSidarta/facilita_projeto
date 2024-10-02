
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
                    <h1 class="mb-0">Cadastrar Cliente</h1>
                    <hr />
                    @if (session()->has('error'))
                    <div>
                        {{session('error')}}
                    </div>
                    @endif
        
                    <form action="{{ route('adminCliente.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-8 d-flex flex-row d-flex align-items-center">
                                <label class="mx-2" for="">Nome:</label>
                                <input type="text" name="name" class="form-control" placeholder="Nome">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6 d-flex flex-row d-flex align-items-center">
                           
                                <label class="mx-2" for="">Endereço:</label>
                                <input type="text" name="endereco" class="form-control" placeholder="Endereço">
                                @error('endereco')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6 d-flex flex-row d-flex align-items-center" x-data="{ telefone : ' ' }">
                              
                                <label class="mx-2" for="">Telefone:</label>
                                <input type="text" name="telefone" class="form-control" placeholder="Telefone"  x-mask="(99) 99999-9999" >
                                @error('telefone')
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