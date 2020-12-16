<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

// Auth
Route::post('backend/login','Backend\Auth\AuthController@login')->name('api.login');
Route::post('backend/login/admin','Backend\Auth\AuthController@login')->name('api.admin.login');

Route::middleware("guest")->group(function(){

    Route::get('/',[IndexController::class,'index'])->name('app.index');

    Route::get('connexion','UI\Web\Auth\AuthController@culture_login')->name('app.login');

    Route::get('inscription','UI\Web\Auth\AuthController@culture_register')->name('app.register');

    // Backend
    Route::post('/inscription','Backend\Auth\AuthController@register')->name('backend.register.member');

});

Route::middleware("auth")->group(function(){

    Route::get('activités','UI\Web\Activites\ActivitesController@index')->name('app.activites.index'); 

    Route::get('/deconnexion','Backend\Auth\AuthController@logout')->name('logout');
  
});

