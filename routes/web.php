<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('home');
})->name('main');

Route::get('/info', [PageController::class, 'info'])->name('info');