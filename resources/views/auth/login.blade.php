<x-guest-layout>
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <x-application-logo class="w-30 h-20 fill-current text-gray-500" />
                </a>
            </div>
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <!-- resources/views/buscar_usuario.blade.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Usuário</title>
    <script>
        // Função para buscar o nome do usuário via Ajax
        function buscarUsuario() {
            const usuarioId = document.getElementById("usuarioId").value;

            // Verificar se o ID é um número válido
            if (!usuarioId) {
                document.getElementById("resultadoNome").textContent = "Digite um ID válido!";
                return;
            }

            // Usar Fetch API para fazer a requisição
            fetch(`/login/${usuarioId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Usuário não encontrado!');
                    }
                    return response.json();
                })
                .then(data => {
                    document.getElementById("resultadoNome").textContent = data.name;
                })
                .catch(error => {
                    document.getElementById("resultadoNome").textContent = error.message;
                });
        }
    </script>
</head>
<body>
    <h1>Buscar Nome de Usuário</h1>

    <label for="usuarioId">Digite o ID do Usuário:</label>
    <input type="number" id="usuarioId" oninput="buscarUsuario()">
    
    <p>Nome do Usuário: <span id="resultadoNome"></span></p>

</body>
</html>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- id Address -->
        <div>
            <label for="id">Codigo:</label>
            <input id="id" type="text" name="id" class="w-50" required autofocus>
        </div>
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="d-flex justify-content-center">
            <x-primary-button class="m-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
    </div>
    </div>
</x-guest-layout>
