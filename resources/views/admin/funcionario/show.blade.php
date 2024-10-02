
<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between d-flex align-items-center"   >
            <span class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Vizualizar Funcionario') }}
            </span>
            
            <a style="background-color: #ADB5BD;border: 2px solid #ADB5BD;" href="{{ route('adminFuncionario.index') }}" class="btn btn-primary text-dark">Voltar</a>
            
        </div>
       
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 col-7">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <span class="col-12 d-flex d-flex row d-flex align-items-center">
                        <h1 class="mb-0 col-10">Vizualizar Funcionario</h1>
                        <a style=" background-color: #FF8A00;border: 2px solid #FF8A00;" href="{{ route('adminFuncionario.edit', $funcionario->id) }}" class="  col-2 btn text-white ">Editar</a>
                    </span>
                  
                    <hr />
                    @if (session()->has('error'))
                    <div>
                        {{session('error')}}
                    </div>
                    @endif
                
                        <div class="d-flex flex-row d-flex align-items-center d-flex justify-content-end">
                            <h4 class="m-0">Niveis de acesso:</h4>
                            <div class="row ms-1">
                                <div class="col border-2 rounded ms-3" style="border: 2px solid ##dee2e6;">
                                    <h4 class="m-0 p-1 ">{{ $funcionario->funcao}}</h4>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3 mt-3">
                            <div class="col-8 d-flex flex-row d-flex align-items-center">
                                <label class="mx-2" for="">Nome:</label>
                                <p class="m-0 border-bottom border-dark  col-10">{{ $funcionario->nome }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6 d-flex flex-row d-flex align-items-center">
                                <label class="mx-2" for="">CPF:</label>
                                <p class="m-0 border-bottom border-dark  col">{{ $funcionario->cpf }}
                               
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6 d-flex flex-row d-flex align-items-center">
                                <label class="mx-2" for="">Senha:</label>
                                <p class="m-0 border-bottom border-dark  col">{{ $funcionario->senha }}
                               
                            </div>
                        </div>
                    
                      
                 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>