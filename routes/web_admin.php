<?php

use Illuminate\Support\Facades\Route;

Route::prefix('administracao')->name('admin.')->namespace('Admin')->group(function () {
    Route::get('/', 'HomeController@index')->name('home.index');
});
