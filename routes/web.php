<?php

use App\Http\Controllers\ChatbotController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;


Route::get('/', function () {
    return view('pages.home');
})->name('home');


Route::get('/tentang', function () {
    return view('pages.about');
})->name('about');

Route::get('/testimoni', function () {
    return view('pages.testimoni');
})->name('testimoni');

Route::get('/kontak', function () {
    return view('pages.kontak');
})->name('kontak');

Route::get('/order', [OrderController::class, 'index'])
    ->name('order');

Route::post('/order/store', [OrderController::class, 'store'])
    ->name('order.store');

Route::get(
    '/order/confirm/{id}',
    [OrderController::class, 'confirm']
)
    ->name('order.confirm');

Route::get(
    '/order/cancel/{id}',
    [OrderController::class, 'cancel']
)
    ->name('order.cancel');

Route::get(
    '/order/send/{id}',
    [OrderController::class, 'sendWa']
)
    ->name('order.send');

Route::post('/chatbot', [ChatbotController::class, 'chat']);

Route::view('/test-chat', 'test-chat');
