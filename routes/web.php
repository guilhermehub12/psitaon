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

    Route::get('/', 'Admin\HomeController@index')->name('home.index');

    Route::prefix('administracao')->name('admin.')->namespace('Admin')->group(function () {
        // HOME
        Route::get('/', 'HomeController@index')->name('home.index');

        // USUARIOS
        // Route::prefix('usuarios')->name('usuarios.')->group(function() {
        //     Route::get('/', 'UsuarioController@index')->name('index');
        //     Route::get('/cadastro', 'UsuarioController@create')->name('create');
        //     Route::post('/', 'UsuarioController@store')->name('store');
        //     Route::get('/{usuario}', 'UsuarioController@show')->name('show');
        //     Route::get('/{usuario}/edicao', 'UsuarioController@edit')->name('edit');
        //     Route::put('/{usuario}', 'UsuarioController@update')->name('update');
        //     Route::delete('/{usuario}', 'UsuarioController@destroy')->name('destroy');
        // });

        // ESTADOS
        Route::resource('estados', 'EstadoController')->parameters(['estados' => 'estado']);

        // USUARIOS
        Route::resource('usuarios', 'UsuarioController')->parameters(['usuarios' => 'usuario']);
    });
});
