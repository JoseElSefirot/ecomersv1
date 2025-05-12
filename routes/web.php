<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Livewire\Volt\Volt;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\Api\CategoryController;

Route::get('/', [ProductController::class, 'welcome'])->name('home');

Route::get('/api/categories/{category}/products', [CategoryController::class, 'products']);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
// Route::resource('products', \App\Http\Controllers\ProductController::class);
Route::get('products', [\App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
Route::get('products/create', [\App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
Route::post('products', [\App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
Route::get('products/{product}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product.show');
Route::get('products/{product}/edit', [\App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
Route::put('products/{product}', [\App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
Route::delete('products/{product}', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('product.destroy');

Route::resource('categories', \App\Http\Controllers\CategoryController::class);
// Route::resource('orders', \App\Http\Controllers\OrderController::class);
Route::get('orders', [\App\Http\Controllers\OrderController::class, 'index'])->name('orders.index');
Route::get('orders/create', [\App\Http\Controllers\OrderController::class, 'create'])->name('orders.create');
Route::post('orders', [\App\Http\Controllers\OrderController::class, 'store'])->name('orders.store');

Route::get('/users', [UserController::class, 'index'])->name('user.index');
// Crear usuarios
Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
// Guardar usuarios
Route::post('/users/create', [UserController::class, 'store'])->name('user.store');

Route::get('/users/{id}', [UserController::class, 'show'])->name('user.show');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::post('/users/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('user.destroy');



Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';

use Illuminate\Http\Request;

Route::post('/buy', function (Request $request) {
    $productId = $request->input('product_id');
    // Placeholder logic for buying a product
    // In real app, you would handle cart or purchase here

    return redirect()->back()->with('message', "Producto con ID {$productId} comprado exitosamente.");
});
