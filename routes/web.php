<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/migrar-base-de-datos', function () {
    try {
        // Esto ejecuta el comando php artisan migrate --force internamente
        Artisan::call('migrate', ['--force' => true]);
        return "¡Base de datos migrada con éxito en Railway!";
    } catch (\Exception $e) {
        return "Error al migrar: " . $e->getMessage();
    }
});

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

Route::get('/migrar-base-de-datos', function () {
    try {
        // Esto ejecuta el comando php artisan migrate --force internamente
        Artisan::call('migrate', ['--force' => true]);
        return "¡Base de datos migrada con éxito en Railway!";
    } catch (\Exception $e) {
        return "Error al migrar: " . $e->getMessage();
    }
});
/* Route::get('/init-db', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate:force');
        return "Tablas creadas con éxito: " . \Illuminate\Support\Facades\Artisan::output();
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
}); */

require __DIR__ . '/auth.php';
