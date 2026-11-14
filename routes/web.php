<?php

use App\Livewire\Test;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

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

Route::post('/test-birthday', function (Request $request)
{
    $birthday = $request->birthday;

    if (app()->getLocale() == 'fa')
    {
        $birthday = Jalalian::fromFormat('Y/m/d', $birthday)
            ->toCarbon()
            ->format('Y-m-d');
    }

    $validator = Validator::make(
        ['birthday' => $birthday],
        [
            'birthday' => ['required', 'date', 'before_or_equal:today'],
        ],

    );

    if ($validator->fails())
    {
        return back()->withErrors($validator)->withInput();
    }

})->name('test.birthday');

require __DIR__.'/settings.php';
