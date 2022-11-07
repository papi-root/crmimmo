<?php

Route::redirect('/', '/login');
Route::redirect('/home', '/admin');
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('tiers', 'TiersController');

    Route::resource('bien', 'BienController');

    Route::resource('acquisition', 'AcquisitionController');

    Route::resource('espace', 'EspaceController');
});
