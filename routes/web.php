<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

Route::middleware("guest")->group(function(){

    Route::get('/',[IndexController::class,'index'])->name('app.index');

});
