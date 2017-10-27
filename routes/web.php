<?php

Route::get('/', function () {
    return redirect()->route('dashboard');
});

$adminOptions = [
    'prefix' => 'admin',
    'namespace' => 'admin'
];

Route::group($adminOptions, function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::get(    '/categories/ajouter',                   'RoomTypesController@create')->name('room_types.create');
    Route::get(    '/categories/{caterorie}/editer',        'RoomTypesController@edit')->name('room_types.edit');
    Route::post(   '/categories',                           'RoomTypesController@store')->name('room_types.store');
    Route::patch(  '/categories/{categorie}',               'RoomTypesController@update')->name('room_types.update');
    Route::delete( '/categories/{categorie}/supprimer',     'RoomTypesController@destroy')->name('room_types.destroy');
    
    Route::get(     '/chambres',                                'RoomsController@index')->name('rooms.index');
    Route::post(    '/chambres',                                'RoomsController@store')->name('rooms.store');
    Route::get(     '/chambres/ajouter',                        'RoomsController@create')->name('rooms.create');
    Route::get(     '/chambres/{chambre}/editer',               'RoomsController@edit')->name('rooms.edit');
    Route::patch(   '/chambres/{chambre}',                      'RoomsController@update')->name('rooms.update');
    Route::delete(  '/chambres/{chambre}/supprimer',            'RoomsController@destroy')->name('rooms.destroy');

    Route::get(     '/reservations',                            'HomeController@index')->name('reservations.index');

    Route::get(     '/reservations/requetes',                   'HomeController@index')->name('requests.index');
    
    Route::get('/utilisateurs', 'HomeController@index')->name('users.index');
    
    Route::get('/occupations', 'HomeController@index')->name('occupations.index');
});

Auth::routes();
