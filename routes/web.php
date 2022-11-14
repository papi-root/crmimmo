<?php

Route::redirect('/', '/login');
Route::redirect('/home', '/admin');
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index'); 
    //Route::get('/', 'HomeController@index')->name('home');

    Route::resource('tiers', 'TiersController');

    Route::resource('bien', 'BienController');

    Route::resource('acquisition', 'AcquisitionController');

    Route::resource('espace', 'EspaceController');

      // Permissions
      Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
      Route::resource('permissions', 'PermissionsController');
  
      // Roles
      Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
      Route::resource('roles', 'RolesController');
  
      // Users
      Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
      Route::resource('users', 'UsersController');
});
