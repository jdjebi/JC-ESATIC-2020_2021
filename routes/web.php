<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UI\Web\Index\IndexController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware("guest")->group(function(){

    Route::get('',[IndexController::class,'index'])->name('app.index');
    Route::get('connexion','UI\Web\Auth\AuthController@culture_login')->name('app.login');
    Route::get('inscription','UI\Web\Auth\AuthController@culture_register')->name('app.register');
    
    // Backend
    Route::post('inscription','Backend\Auth\AuthController@register')->name('backend.register.member');
  });
