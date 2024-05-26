<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\HelpCenterController;
use App\Http\Controllers\CartController;

// Redirect root URL to the dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [TicketController::class, 'index'])
    ->name('dashboard');

Route::get('/tickets/{id}', [TicketController::class, 'show'])
    ->name('tickets.show');

Route::get('/search', [TicketController::class, 'search'])
    ->name('search');

Route::middleware(['auth'])->group(function () {

    Route::get('/my-selling', [SellController::class, 'mySelling'])
        ->name('sell.mySelling');
    Route::post('/sell/store', [SellController::class, 'store'])
        ->name('sell.store');
    Route::get('/sell/{id}/edit', [SellController::class, 'edit'])
        ->name('sell.edit');
    Route::post('/sell/{id}/update', [SellController::class, 'update'])
        ->name('sell.update');
    Route::delete('/sell/{id}', [SellController::class, 'destroy'])
        ->name('sell.destroy');

    Route::get('/my-selling-orders', [OrderController::class, 'mySellingOrders'])
        ->name('orders.mySellingOrders');

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::post('/tickets/buy/{id}', [TicketController::class, 'buy'])
        ->name('tickets.buy');

    Route::get('/payment', [PaymentController::class, 'index'])
        ->name('payment.index');

    Route::get('/cart', [CartController::class, 'index'])
        ->name('cart.index');
    Route::post('/cart/{ticket}', [CartController::class, 'store'])
        ->name('cart.store');
    Route::patch('/cart/{ticket}', [CartController::class, 'update'])
        ->name('cart.update');
    Route::delete('/cart/{ticket}', [CartController::class, 'destroy'])
        ->name('cart.destroy');
    Route::get('/cart/checkout', [CartController::class, 'checkout'])
        ->name('cart.checkout');
    Route::get('/cart/removeAll', [CartController::class, 'removeAll'])
        ->name('cart.removeAll');

    Route::get('/orders', [OrderController::class, 'index'])
        ->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'details'])
        ->name('orders.details');
    Route::get('/orders/cancel/{id}', [OrderController::class, 'cancelOrder'])
        ->name('orders.cancel');
    Route::get('/orders/received/{id}', [OrderController::class, 'markAsReceived'])
        ->name('orders.received');

    Route::get('/help-center', [HelpCenterController::class, 'index'])
        ->name('help-center');

});

require __DIR__.'/auth.php';
