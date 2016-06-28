<?php

/* Frontend Routes */
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('home');
});

Route::get('/categories', function () {
    return view('categories');
});
/* Frontend Routes */

/* Frontend Auth Routes */
Route::get('/login', 'UserController@login');
Route::post('/login', 'UserController@authenticate');

Route::get('/register', function () {
    return view('auth.register');
});

Route::post('/register', 'UserController@register');
/* Frontend Auth Routes */

/* Admin Routes */
Route::get('/admin', function () {
    return redirect('/admin/dashboard');
});

Route::group(['prefix' => 'admin'], function () {
    /* Admin Auth Routes */
    Route::get('login', 'AdminController@login');
    Route::post('login', 'AdminController@authenticate');
    /* Admin Auth Routes */

    $pages = AdminController::$pages;

    foreach ($pages as $page => $pageName) {
        Route::get($page, 'AdminController@' . $page);
    }
});
/* Admin Routes */