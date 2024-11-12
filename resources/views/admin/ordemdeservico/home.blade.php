<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pagina das Ordens de Serviço') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h1 class="mb-0">Lista das Ordens de Serviços</h1>
                        <input type="text" id="search" data-page="home" placeholder="Buscar Status, Clientes ou Serviços" class="form-control w-25" />
                        <a href="{{ route('adminOrdemDeServico.create') }}" class="btn btn-primary">Adicionar Ordem</a>
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
                                {{ date('d/m/Y', strtotime($ordemdeservico->data_de_entrega)) }} 
                                {{ $ordemdeservico->hora_de_entrega }}
                                </td>
                                <td class="align-middle">
                                    @php
                                        $statusClass = '';
                                        $statusTextClass = '';
                                        switch($ordemdeservico->status) {
                                            case 'Pendente':
                                                $statusClass = 'bg-danger';
                                                $statusTextClass = 'text-white'; // Bootstrap text color for better contrast
                                                break;
                                            case 'Impressão':
                                                $statusClass = 'bg-warning';
                                                $statusTextClass = 'text-dark';
                                                break;
                                            case 'Produção':
                                                $statusClass = 'bg-primary';
                                                $statusTextClass = 'text-white';
                                                break;
                                            case 'Concluido':
                                                $statusClass = 'bg-success';
                                                $statusTextClass = 'text-white';
                                                break;
                                            default:
                                                $statusClass = 'bg-secondary';
                                                $statusTextClass = 'text-white';
                                        }
                                    @endphp

                                    <span class="px-3 py-2 rounded {{ $statusClass }} {{ $statusTextClass }}">
                                            {{ ucfirst($ordemdeservico->status) }}
                                    </span>
                                </td>

                                

                                <td class="align-middle">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <spam class="p-2 ">
                                            <a href="{{route('adminOrdemDeServico.show', $ordemdeservico->id) }} " type="button" class="btn bg-secondary text-white fs-6">Ver Mais</a>
                                        </spam>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="6">Nenhuma Ordem Encontrada</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @if ($ordensVencidas->isNotEmpty())
        <div class="modal fade" id="ordensVencidasModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ordens de Serviço Vencidas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>CÓD.Arte</th>
                                    <th>Cliente</th>
                                    <th>Serviços</th>
                                    <th>Data e Hora de Entrega</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ordensVencidas as $ordem)
                                    <tr>
                                        <td>{{ $ordem->id }}</td>
                                        <td>{{ $ordem->cliente }}</td>
                                        <td>{{ $ordem->servico }}</td>
                                        <td>{{ date('d/m/Y H:i', strtotime($ordem->data_de_entrega . ' ' . $ordem->hora_de_entrega)) }}</td>
                                        <td>{{ ucfirst($ordem->status) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif

    
    <!-- Script para abrir o modal automaticamente -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if ($ordensVencidas->isNotEmpty())
                $('#ordensVencidasModal').modal('show');
            @endif
        });
    </script>
    
    <script src="{{ asset('js/input_search.js') }}"></script>
    
</x-app-layout>
