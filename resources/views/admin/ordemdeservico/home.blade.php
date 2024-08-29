<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pagina das Ordens admin ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="mb-0">Lista das Ordens de Serviços</h1>
                        <a href="{{route('adminOrdemDeServico.create') }}" class="btn btn-primary">Adicionar ordem</a>
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
                                <th>CÓD.Arte</th>
                                <th>Cliente</th>
                                <th>Serviços</th>
                                <th>Data e Hora de Entrega</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($ordemdeservicos as $ordemdeservico)
                            <tr>
                                <td class="align-middle">{{ $ordemdeservico->id }}</td>
                                <td class="align-middle">{{ $ordemdeservico->cliente }}</td>
                                <td class="align-middle">{{ $ordemdeservico->servico }}</td>
                                <td class="align-middle">
                                    {{ $ordemdeservico->data_de_entrega }} {{ $ordemdeservico->hora_de_entrega }}
                                </td>
                                <td class="align-middle">{{ $ordemdeservico->status }}</td>

                                <td class="align-middle">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <spam class="p-2 ">
                                            <a href="{{ route('adminOrdemDeServico.index')}}" type="button" class="btn btn-warning fs-6">Ver Mais</a>
                                        </spam>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="5">Produto não encontrado</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
