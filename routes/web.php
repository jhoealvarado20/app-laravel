<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

// 1. Ruta pública
Route::get('/', function () {
    return view('welcome');
});

// 2. Rutas para cualquier usuario logueado (Admin o User)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 3. Rutas exclusivas para el Administrador (Taller Reto Final)
// Solo los administradores pueden entrar aquí 
Route::middleware(['auth', 'es_admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return "Bienvenido, Administrador";
    });
    // El Dashboard ahora muestra la lista de usuarios (Parte 3 del taller)
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');

    // Ruta para eliminar usuarios (Módulo 4)
    Route::delete('/admin/usuarios/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    // CRUDs de productos y categorías
    Route::resource('productos', ProductoController::class);
    Route::resource('categories', CategoryController::class);
});

require __DIR__ . '/auth.php';
