<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Funcionarios ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="mb-0">Lista dos funcionarios</h1>
                        <a href="{{ route('register') }}" class="btn btn-primary">Cadastrar Funcionario</a>
                    </div>
                    <hr />
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <table class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th class="text-center">Nome</th>
                                <th class="text-center">Nivel da Função</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($funcionarios as $funcionario)
                                <tr>
                                    <td class="text-center align-middle">{{ $funcionario->nome }}</td>
                                    <td class="text-center align-middle">{{ $funcionario->funcao }}</td> <!-- Corrigido para a coluna correta -->
                                    <td class="text-center align-middle">
                                        <a href="{{ route('adminFuncionario.show', $funcionario->id) }}" class="btn btn-secondary">Ver Mais</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="3">Nenhum cliente encontrado</td> <!-- Corrigido para 3 colunas -->
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
