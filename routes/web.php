<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';

Route::group(['namespace' => 'App\Http\Controllers', 'middleware' =>['auth']], function() {
    Route::prefix('administracao')->name('admin.')->namespace('Admin')->group(function () {
        // HOME
        Route::get('/', 'HomeController@index')->name('home.index');

        // ESTADOS
        Route::prefix('estados')->name('estados.')->group(function() {
            Route::get('/', 'EstadoController@index')->name('index');
            Route::get('/cadastro', 'EstadoController@create')->name('create');
            Route::post('/', 'EstadoController@store')->name('store');
            Route::get('/{orgao}', 'EstadoController@show')->name('show');
            Route::get('/{orgao}/edicao', 'EstadoController@edit')->name('edit');
            Route::put('/{orgao}', 'EstadoController@update')->name('update');
            Route::delete('/{orgao}', 'EstadoController@destroy')->name('destroy');
        });
    });
});
