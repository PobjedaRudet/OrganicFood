<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Models\Product;
use Laravel\Mcp\Facades\Mcp;
use App\Mcp\Servers\OrderServer;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/product', function () {
    $products = Product::all();
    return view('product', compact('products'));
});

Route::resource('products', ProductController::class);

Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('cart/clear', [CartController::class, 'clear'])->name('cart.clear');

Route::get('/order', function () {
    return view('order');
})->name('order');

Route::post('/chatbot/message', [\App\Http\Controllers\ChatbotController::class, 'message']);

Mcp::local('order-server', OrderServer::class);
