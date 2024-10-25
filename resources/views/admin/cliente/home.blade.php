<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de clientes ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="mb-0">Lista dos clientes</h1>
                        <a href="{{ route('adminCliente.create') }}" class="btn btn-primary">Cadastrar Cliente</a>
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
                                <th class="text-center">Endereço</th>
                                <th class="text-center">Telefone</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($clientes as $cliente)
                                <tr>
                                    <td class="text-center align-middle">{{ $cliente->name }}</td>
                                    <td class="text-center align-middle">{{ $cliente->endereco }}</td>
                                    <td class="text-center align-middle">{{ $cliente->telefone }}</td>
                                    <td class="text-center align-middle">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <span class="p-2">
                                                <a href="{{ route('adminCliente.show', $cliente->id) }}" type="button" class="btn bg-secondary text-white fs-6">Ver Mais</a>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="4">Nenhum cliente encontrado</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
