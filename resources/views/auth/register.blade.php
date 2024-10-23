<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="usertype" :value="__('Função')" />
            <select id="usertype" name="usertype" class="block mt-1 w-full" required>
                <option value="" disabled selected>-- Selecione a função do usuário --</option>
                <option value="guiche" {{ old('usertype') === 'guiche' ? 'selected' : '' }}>Guichê</option>
                <option value="impressao" {{ old('usertype') === 'impressao' ? 'selected' : '' }}>Impreessão</option>
                <option value="producao" {{ old('usertype') === 'producao' ? 'selected' : '' }}>Produção</option>
                <option value="caixa" {{ old('usertype') === 'caixa' ? 'selected' : '' }}>Caixa</option>
                <option value="admin" {{ old('usertype') === 'admin' ? 'selected' : '' }}>Admin</option>
                <!-- Adicione mais opções conforme necessário -->
            </select>
            <x-input-error :messages="$errors->get('usertype')" class="mt-2" />
        </div>


        
        <!-- CPF -->
        <div class="mt-4">
            <x-input-label for="cpf" :value="__('CPF')" />
            <x-text-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" :value="old('cpf')" required autocomplete="cpf" />
            <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    
</x-guest-layout>
