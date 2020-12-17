<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

Route::middleware("guest")->group(function(){

    Route::get('',[IndexController::class,'index'])->name('app.index');

    Route::get('inscription','UI\Web\Auth\AuthController@culture_register')->name('app.register');

    Route::any('connexion','UI\Web\Auth\AuthController@culture_login2')->name('app.login');

    Route::get('demo','UI\Web\Index\IndexController@index2')->name('home');

    // Backend
    Route::post('backend/inscription','Backend\Auth\AuthController@register')->name('backend.register.member');

});

Route::middleware("auth")->group(function(){

    Route::get('activités','UI\Web\Activites\ActivitesController@index')->name('app.activites.index'); 

     // Backend
     Route::prefix('/update')->group(function () {
      Route::post('general','Backend\User\Update\GeneralController@update')->name('backend.compte.general');
      Route::post('general2','Backend\User\Update\GeneralController@jc_update')->name('backend.compte.general2');
    });

    // Backend
      Route::post('voter','Backend\Vote\VoteController@voter')->name('backend.votes.create');

});

/* Administration */

Route::get('admin/connexion','UI\admin\Auth\AuthController@login')->name('admin')->middleware('admin.guest');

Route::middleware('admin.login')->group(function (){

});


Route::middleware('admin.login')->group(function (){ 

    Route::prefix('admin/')->group(function () {

      Route::get('','UI\admin\User\UserController@index')->name('admin_index');
      Route::get('users','UI\admin\User\UserController@index')->name('admin.users.index');
      Route::get('user/action/','UI\admin\AdminController@delete_user')->name('admin_delete_user');
      Route::get('users/{id}','UI\admin\User\UserController@show')->where('id', '[0-9]+')->name('admin_user_profil');
      Route::get('users/{id}/compte','UI\admin\User\UserController@account')->where('id', '[0-9]+')->name('admin.users.account');
      Route::get('roles-permissions/','UI\admin\User\RolesAndPermissionsController@index')->name('admin.user.roles');
      Route::get('roles-permissions/roles/{id}/','UI\admin\User\RolesAndPermissionsController@show')->where('id', '[0-9]+')->name('admin.roles.show');
  
      Route::get('deconnexion','Backend\Auth\AuthController@admin_logout')->name('admin.logout');
    
      Route::namespace("Resac")->group(function (){
        Route::get('rechercher',"SearchController@admin")->name('admin_search');
      });


        Route::get('users/create','UI\admin\User\CreateUserController')->name('admin.users.create');
        Route::post('backend/users/create','Backend\User\Create\AdminCreateUserController@create')->name('backend.admin.users.create');
        Route::get('codes/','UI\admin\Code\CodeController@index')->name('admin.codes.index');
        Route::get('codes/generate','UI\admin\Code\CodeController@generate')->name('admin.codes.generate');
        Route::get('codes/verifications','UI\admin\Code\CodeController@verif')->name('admin.codes.verif');
        Route::get('codes/pdf','UI\admin\Code\CodeController@pdf')->name('admin.codes.pdf');
        Route::post('backend/codes/','Backend\Code\ApiCodeController@get')->name('backend.admin.codes.verif');
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

Route::get('/deconnexion','Backend\Auth\AuthController@logout')->name('logout');
Route::get('deconnexion2','Backend\Auth\AuthController@admin_logout')->name('admin.logout');
Route::post('backend/roles/update/','Backend\Role\RoleController@update_jc_role')->name('backend.admin.roles.update');
Route::get('@admin/connexion','UI\Web\Auth\AuthController@culture_login')->name('app.login2');

Route::get('connexion3','UI\admin\Auth\AuthController@login')->name('admin')->middleware('admin.guest');