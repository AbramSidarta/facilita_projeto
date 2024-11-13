<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrdemDeServicoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\RegisteredUserController ;
use App\Http\Controllers\UserController;



Route::middleware(['auth', 'verified'])->group(function (){
    Route::get('/', [OrdemDeServicoController::class, 'index'])->name('adminOrdemDeServico.index');
    Route::get('/admin', [OrdemDeServicoController::class, 'index'])->name('adminOrdemDeServico.index');
    Route::get('/admin/ordemdeservico', [OrdemDeServicoController::class, 'index'])->name('adminOrdemDeServico.index');
    Route::get('/admin/ordemdeservico/entregues', [OrdemDeServicoController::class, 'entregues'])->name('adminOrdemDeServico.entregues');
    // routes/search    
    Route::get('/search-orders', [OrdemDeServicoController::class, 'search'])->name('OrdemDeServicoSearch.orders');
    Route::get('/admin/ordemdeservico/create', [OrdemDeServicoController::class, 'create'])->name('adminOrdemDeServico.create');
    Route::post('/admin/ordemdeservico/', [OrdemDeServicoController::class, 'store'])->name('adminOrdemDeServico.store');
    Route::get('/admin/ordemdeservico{id}', [OrdemDeServicoController::class, 'show'])->name('adminOrdemDeServico.show');
    Route::get('/admin/ordemdeservico/edit/{id}', [OrdemDeServicoController::class, 'edit'])->name('adminOrdemDeServico.edit');
    Route::put('/admin/ordemdeservico/{id}', [OrdemDeServicoController::class, 'update'])->name('adminOrdemDeServico.update');
    Route::get('/admin/ordemdeservico/{id}', [OrdemDeServicoController::class, 'destroy'])->name('adminOrdemDeServico.destroy');

    //clientes
    Route::get('/search-clientes', [ClienteController::class, 'search']);

    Route::get('/admin/cliente', [ClienteController::class, 'index'])->name('adminCliente.index');
    Route::get('/admin/cliente/create', [ClienteController::class, 'create'])->name('adminCliente.create');
    Route::post('/admin/cliente/', [ClienteController::class, 'store'])->name('adminCliente.store');
    Route::get('/admin/cliente/{id}', [ClienteController::class, 'show'])->name('adminCliente.show');
    Route::get('/admin/cliente/edit/{id}', [ClienteController::class, 'edit'])->name('adminCliente.edit');
    Route::put('/admin/cliente/{id}', [ClienteController::class, 'update'])->name('adminCliente.update');
    Route::get('/admin/cliente/{id}', [ClienteController::class, 'destroy'])->name('adminCliente.destroy');

});

Route::middleware(['auth', 'admin'])->group(function () {
   
    //funcionarios
    
    Route::get('/search-funcionarios', [FuncionarioController::class, 'search']);
    Route::get('/admin/funcionario', [RegisteredUserController::class, 'index'])->name('adminFuncionario.index');
    Route::get('/admin/funcionario', [FuncionarioController::class, 'index'])->name('adminFuncionario.home');
    Route::get('/admin/funcionario/create', [FuncionarioController::class, 'create'])->name('adminFuncionario.create');
    Route::post('/admin/funcionario/', [FuncionarioController::class, 'store'])->name('adminFuncionario.store');
    Route::get('/admin/funcionario/{id}', [FuncionarioController::class, 'show'])->name('adminFuncionario.show');
    Route::get('/admin/funcionario/edit/{id}', [FuncionarioController::class, 'edit'])->name('adminFuncionario.edit');
    Route::put('/admin/funcionario/{id}', [FuncionarioController::class, 'update'])->name('adminFuncionario.update');
    Route::get('/admin/funcionario/{id}', [FuncionarioController::class, 'destroy'])->name('adminFuncionario.destroy');
    // routes/web.php


   

});



require __DIR__.'/auth.php';

