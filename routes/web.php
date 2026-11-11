<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Test;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

Route::get('test',Test::class)->name('test');

require __DIR__.'/settings.php';
