<?php

use App\Http\Controllers\TelefonoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;

Route::get('/', [TelefonoController::class, 'index'])->name('home');
Route::get('/catalogo', [TelefonoController::class, 'index']);
Route::get('/telefonos/{id}', [TelefonoController::class, 'show'])->name('telefonos.show');

Route::middleware('auth')->group(function () {

    Route::get('/carrito', [CarritoController::class, 'index'])
        ->name('carrito.index');

    Route::post('/carrito/add/{idTelefono}', [CarritoController::class, 'add'])
        ->name('carrito.add');

    Route::post('/carrito/remove-units/{idCarrito}', [CarritoController::class, 'removeUnits'])
        ->name('carrito.removeUnits');

    Route::delete('/carrito/remove/{idCarrito}', [CarritoController::class, 'remove'])
        ->name('carrito.remove');
});

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->name('password.request');
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->name('password.email');

Route::fallback(function () {
    return redirect()->route('home');
});

