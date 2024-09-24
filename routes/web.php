<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrdemDeServicoController;
use App\Http\Controllers\ClienteController;





Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
 
    Route::get('admin/dashboard', [HomeController::class, 'index']);
 
    // Rota para listar ordens de serviço pendentes, impressão, produção e concluído
    Route::get('/admin/ordemdeservico', [OrdemDeServicoController::class, 'index'])->name('adminOrdemDeServico.index');

    // Rota para listar ordens de serviço entregues
    Route::get('/admin/ordemdeservico/entregues', [OrdemDeServicoController::class, 'entregues'])->name('adminOrdemDeServico.entregues');

    Route::get('/admin/ordemdeservico/create', [OrdemDeServicoController::class, 'create'])->name('adminOrdemDeServico.create');
    Route::post('/admin/ordemdeservico/', [OrdemDeServicoController::class, 'store'])->name('adminOrdemDeServico.store');
    Route::get('/admin/ordemdeservico{id}', [OrdemDeServicoController::class, 'show'])->name('adminOrdemDeServico.show');
    Route::get('/admin/ordemdeservico/edit/{id}', [OrdemDeServicoController::class, 'edit'])->name('adminOrdemDeServico.edit');
    Route::put('/admin/ordemdeservico/{id}', [OrdemDeServicoController::class, 'update'])->name('adminOrdemDeServico.update');
    Route::get('/admin/ordemdeservico/{id}', [OrdemDeServicoController::class, 'destroy'])->name('adminOrdemDeServico.destroy');

    //clientes
    Route::get('/admin/cliente', [ClienteController::class, 'index'])->name('adminCliente.index');
    Route::get('/admin/cliente/create', [ClienteController::class, 'create'])->name('adminCliente.create');
    Route::post('/admin/cliente/', [ClienteController::class, 'store'])->name('adminCliente.store');

});

require __DIR__.'/auth.php';

