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

/* Administration */

Route::prefix('/v1/admin')->group(function (){

    Route::get('connexion','UI\admin\Auth\AuthController@login')->name('admin')->middleware('admin.guest');
  
    Route::middleware('admin.login')->group(function (){
  
      Route::namespace("UI\admin")->group(function (){
        Route::get('','AdminController@index')->name('admin_index');
        Route::get('users','User\UserController@index')->name('admin.users.index');
        Route::get('user/action/','AdminController@delete_user')->name('admin_delete_user');
        Route::get('users/{id}','User\UserController@show')->where('id', '[0-9]+')->name('admin_user_profil');
        Route::get('users/{id}/compte','User\UserController@account')->where('id', '[0-9]+')->name('admin.users.account');
        Route::get('roles-permissions/','User\RolesAndPermissionsController@index')->name('admin.user.roles');
        Route::get('roles-permissions/roles/{id}/','User\RolesAndPermissionsController@show')->where('id', '[0-9]+')->name('admin.roles.show');
      });
  
      Route::get('deconnexion','Backend\Auth\AuthController@admin_logout')->name('admin.logout');
  
      Route::namespace("Resac")->group(function (){
        Route::get('rechercher',"SearchController@admin")->name('admin_search');
      });
  
    });
  
  });
  
  Route::name('admin.')->group(function () {
  
    // Frontend
    Route::namespace('UI\admin')->group(function () {
    
      Route::middleware('admin.login')->group(function (){
        Route::prefix('/v1/admin/')->group(function () {
  
          /* Index de recherche utilisateur */
          Route::get('webengine/index','WebEngineIndexController@show')->name('webengine.show');
          Route::get('webengine/index/generate','WebEngineIndexController@generate_index')->name('webengine.generate_index');
          Route::get('webengine/index/clear','WebEngineIndexController@clear_index')->name('webengine.clear_index');
        });
  
        Route::prefix('/v1/admin/')->group(function () {
          Route::get('dev/flash/creator','DevController@create_flash')->name('dev.create_flash');
        });
  
      });
  
    });
  
  });

