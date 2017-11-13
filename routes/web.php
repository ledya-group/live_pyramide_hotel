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
    
    Route::get(     '/chambres',                       'RoomsController@index')->name('rooms.index');
    Route::post(    '/chambres',                       'RoomsController@store')->name('rooms.store');
    Route::get(     '/chambres/ajouter',               'RoomsController@create')->name('rooms.create');
    Route::get(     '/chambres/{chambre}/editer',      'RoomsController@edit')->name('rooms.edit');
    Route::patch(   '/chambres/{chambre}',             'RoomsController@update')->name('rooms.update');
    Route::delete(  '/chambres/{chambre}/supprimer',   'RoomsController@destroy')->name('rooms.destroy');

    Route::get(     '/reservations', 'HomeController@index')->name('reservations.index');

    Route::get(     '/reservations/requetes', 'HomeController@index')->name('requests.index');
    
    Route::get(     '/clients',                  'ClientsController@index')->name(  'clients.index');
    Route::post(    '/clients',                  'ClientsController@store')->name(  'clients.store');
    Route::get(     '/clients/ajouter',          'ClientsController@create')->name( 'clients.create');
    Route::get(     '/clients/{client}',         'ClientsController@show')->name(   'clients.show');
    Route::patch(   '/clients/{client}',         'ClientsController@update')->name( 'clients.update');
    Route::get(     '/clients/{client}/editer',  'ClientsController@edit')->name(   'clients.edit');
    Route::delete(  '/clients/{client}',         'ClientsController@destroy')->name('clients.destroy');
    
    Route::get(     '/occupations',                      'OccupationsController@index')->name(  'occupations.index');
    Route::post(    '/occupations',                      'OccupationsController@store')->name(  'occupations.store');
    Route::get(     '/occupations/ajouter',              'OccupationsController@create')->name( 'occupations.create');
    Route::get(     '/occupations/{occupation}',         'OccupationsController@show')->name(   'occupations.show');
    Route::patch(   '/occupations/{occupation}',         'OccupationsController@update')->name( 'occupations.update');
    Route::get(     '/occupations/{occupation}/editer',  'OccupationsController@edit')->name(   'occupations.edit');
    Route::delete(  '/occupations/{occupation}',         'OccupationsController@destroy')->name('occupations.destroy');
});

Auth::routes();
