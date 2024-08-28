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
                        <h1 class="mb-0">Lista de Produtos</h1>
                        <a href="ordemdeservico" class="btn btn-primary">Acessar ordem de serviço</a>
                    </div>
                    <hr />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
