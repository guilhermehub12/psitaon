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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::group(['namespace' => 'App\Http\Controllers', 'middleware' =>['auth']], function() {

    // HOME
    Route::get('/', 'HomeController@index')->name('home.index');

    include_once 'web_admin.php';
    include_once 'web_paciente.php';

    /*

    Route::prefix('administracao')
    ->name('admin.')
    ->namespace('Admin')
    ->group(function () {
        // HOME
        Route::get('/', 'HomeController@index')
        ->name('home.index');

        // ESTADOS
        Route::resource('estados', 'EstadoController')
        ->parameters(['estados' => 'estado']);

        // PSICOLOGAS
        Route::resource('psicologas', 'PsicologaController')
        ->parameters(['psicologas' => 'psicologa']);

        // USUARIOS
        Route::resource('usuarios', 'UsuarioController')
        ->parameters(['usuarios' => 'usuario']);
    });
    */
});
