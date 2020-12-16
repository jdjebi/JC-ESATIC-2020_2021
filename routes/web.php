<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UI\Web\Index\IndexController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware("guest")->group(function(){

    Route::get('',[IndexController::class,'index'])->name('app.index');

});
