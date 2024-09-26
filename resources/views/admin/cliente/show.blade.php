
<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between d-flex align-items-center"   >
            <span class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Cadastrar Cliente') }}
            </span>
            
            <a style="background-color: #ADB5BD;border: 2px solid #ADB5BD;" href="{{ route('adminCliente.index') }}" class="btn btn-primary text-dark">Voltar</a>
            
        </div>
       
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 col-7">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <span class=" d-flex d-flex row">
                        <h1 class="mb-0 col-10">Cadastrar Cliente</h1>
                        <a style="background-color: #ADB5BD;border: 2px solid #ADB5BD;" href="{{ route('adminCliente.edit', $cliente->id) }}" class=" col-2 btn btn-primary text-dark">Editar</a>
                    </span>
                  
                    <hr />
                    @if (session()->has('error'))
                    <div>
                        {{session('error')}}
                    </div>
                    @endif
                        <div class="row mb-3">
                            <div class="col-11">
                                <label class="ms-2 mb-2" for="">Nome</label>
                                <p class="m-0 border-bottom border-dark  col-10">{{ $cliente->name }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-11">
                                <label class="ms-2 mb-2" for="">Endereço</label>
                                <p class="m-0 border-bottom border-dark  col-10">{{ $cliente->endereco }}
                               
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label class="ms-2 mb-2" for="">Telefone</label>
                                <p class="m-0 border-bottom border-dark  col-10">{{ $cliente->telefone }}
                               
                            </div>
                        </div>
 
                      
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>