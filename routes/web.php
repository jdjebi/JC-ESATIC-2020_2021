<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\SearchUserIndex;

use Illuminate\Support\Facades\Http;


Route::prefix('/t')->group(function (){

Route::get('/deconnexion','Backend\Auth\AuthController@logout')->name('logout');

Route::middleware("guest")->group(function(){
  Route::get('/','UI\Web\Index\IndexController');
  Route::get('/demo','UI\Web\Index\IndexController@index2')->name('home');
  Route::get('/connexion','UI\Web\Auth\AuthController@login')->name('login');
  Route::get('/inscription','UI\Web\Auth\AuthController@register')->name('register');

  Route::namespace("Backend\Auth\Password")->group(function () {
    Route::get('reinitialiser/mot-de-passe','ForgotPasswordController')->name('app.reset.email');
    Route::post('reinitialiser/mot-de-passe','ValidatePasswordRequest');
    Route::get('password/reset/{token}','ResetPasswordController@get')->name('password.reset');
    Route::post('password/reset','ResetPasswordController@post')->name('app.reinit.password');
  });

  // Backend
  Route::post('/inscription','Backend\Auth\AuthController@register')->name('backend.register.member');
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


/* API */

// User
Route::get('user/connected/main_data','Backend\User\GetDataController@main_for_user_connected')->name('backend.user.connected.main_data');
Route::get('user/all/manage_data','Backend\User\GetDataController@manage_data')->name('backend.api.user.all.manage_data');
Route::get('users/{id}/roles','Backend\User\RolesPermissions@get_roles')->where('id', '[0-9]+')->name('backend.users.roles.get');
Route::put('users/{id}/roles','Backend\User\RolesPermissions@put_roles')->where('id', '[0-9]+')->name('backend.users.roles.put');


// Auth
Route::post('backend/login','Backend\Auth\AuthController@login')->name('api.login');
Route::post('backend/login/admin','Backend\Auth\AuthController@login')->name('api.admin.login');

/* Routes de test */

});

Route::middleware("guest")->group(function(){

  Route::get('','UI\Web\Index\IndexController@index')->name('app.index');
  Route::get('connexion','UI\Web\Auth\AuthController@culture_login')->name('app.login');
  Route::get('inscription','UI\Web\Auth\AuthController@culture_register')->name('app.register');
  
  // Backend
  Route::post('inscription','Backend\Auth\AuthController@register')->name('backend.register.member');
});

Route::middleware("auth")->group(function(){

  Route::get('activités','UI\Web\Activites\ActivitesController@index')->name('app.activites.index'); 

});

Route::middleware('admin.login')->group(function (){ Route::prefix('admin/')->group(function () {

  Route::get('users/create','UI\admin\User\CreateUserController')->name('admin.users.create');
  Route::post('backend/users/create','Backend\User\Create\AdminCreateUserController@create')->name('backend.admin.users.create');

  Route::get('codes/','UI\admin\Code\CodeController@index')->name('admin.codes.index');
  Route::get('codes/generate','UI\admin\Code\CodeController@generate')->name('admin.codes.generate');
  Route::get('codes/verifications','UI\admin\Code\CodeController@verif')->name('admin.codes.verif');
  Route::get('codes/pdf','UI\admin\Code\CodeController@pdf')->name('admin.codes.pdf');


  Route::post('backend/codes/','Backend\Code\ApiCodeController@get')->name('backend.admin.codes.verif');


});});

// Gestion des rôles
Route::post('backend/roles/update/','Backend\Role\RoleController@update_jc_role')->name('backend.admin.roles.update');

