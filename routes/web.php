<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrdemDeServicoController;



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

require __DIR__.'/auth.php';

Route::middleware(['auth', 'admin'])->group(function () {
 
    Route::get('admin/dashboard', [HomeController::class, 'index']);
 
    Route::get('/admin/ordemdeservico', [OrdemDeServicoController::class, 'index'])->name('adminOrdemDeServico.index');
    Route::get('/admin/ordemdeservico/create', [OrdemDeServicoController::class, 'create'])->name('admin.OrdemDeServico.create');
    Route::post('/admin/ordemdeservico/', [OrdemDeServicoController::class, 'store'])->name('admin.OrdemDeServico.store');
});



