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

        // ESTADOS
        Route::resource('estados', 'EstadoController')->parameters(['estados' => 'estado']);

        // CLIENTES
        Route::resource('clientes', 'ClienteController')->parameters(['clientes' => 'cliente']);

        // CLIENTES DATAS
        Route::resource('clientes.datas', 'ClienteDataController')->parameters([
            'clientes' => 'cliente',
            'datas' => 'clienteData'
        ]);

        // PRODUTOS
        Route::resource('produtos', 'ProdutoController')->parameters(['produtos' => 'produto']);

        // PRODUTOS TAMANHOS
        Route::resource('produtos.tamanhos', 'ProdutoTamanhoController')->parameters([
            'produtos' => 'produto',
            'tamanhos' => 'produtoTamanho'
        ]);

        // PRODUTOS SABORES
        Route::resource('produtos.sabores', 'ProdutoSaborController')->parameters([
            'produtos' => 'produto',
            'sabores' => 'produtoSabor'
        ]);

        // USUARIOS
        Route::resource('usuarios', 'UsuarioController')->parameters(['usuarios' => 'usuario']);
    });
});
