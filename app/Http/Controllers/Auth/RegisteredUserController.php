<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'string', 'max:14', 'unique:'.User::class], // Adicione validação para CPF
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'usertype' => 'required|in:Guichê,Impressão,Produção,Caixa,Admin',
        ]);
        $user = User::create([
            'name' => $request->name,
            'cpf' => $request->cpf, // Armazene o CPF
            'password' => Hash::make($request->password),
            'usertype' => $request->usertype, // Adicione isso
        ]);
        event(new Registered($user));

        return redirect(route('adminFuncionario.home'));
    }
}
