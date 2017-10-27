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
});

Auth::routes();
