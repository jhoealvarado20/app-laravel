<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

// Ruta pública
Route::get('/', function () {
    return view('welcome');
});

// Rutas protegidas por login
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Redirección del dashboard a productos
    Route::get('/dashboard', function () {
        return redirect()->route('productos.index');
    })->name('dashboard');

    // CRUDs de LIMATEC
    Route::resource('productos', ProductoController::class);
    Route::resource('categories', CategoryController::class);

    // Perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';