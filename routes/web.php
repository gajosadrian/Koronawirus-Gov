<?php

Route::name('home')->get('/', 'HomeController@index');
Route::name('infected.index')->get('infected', 'InfectedController@index');
Route::name('infected.setRecovered')->get('infected/set-recovered/{val}', 'InfectedController@setRecovered')->where('val', '[0-9]+');

// Auth
// Route::name('login')->get('login', 'Auth\LoginController@showLoginForm')->middleware('guest');
// Route::name('login.attempt')->post('login', 'Auth\LoginController@login')->middleware('guest');
// Route::name('logout')->post('logout', 'Auth\LoginController@logout');

// 500 error
Route::get('500', function () {
    // Force debug mode for this endpoint in the demo environment
    if (App::environment('demo')) {
        Config::set('app.debug', true);
    }

    echo $fail;
});
