<?php

use App\Livewire\Test;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

Route::get('test', Test::class)->name('test');


//Route::get('lang-toggle', function () {
//   $locale = session('locale');
//   $locale == 'fa' ? session(['locale'=>'en']) : session(['locale'=>'fa']);
//   return $locale;
//});

Route::get('lang-toggle', function ()
{
    $locale = session('locale', config('app.locale'));

    $locale = $locale == 'fa' ? 'en' : 'fa';

    session(['locale' => $locale]);

    return redirect()->back();
});

require __DIR__.'/settings.php';
