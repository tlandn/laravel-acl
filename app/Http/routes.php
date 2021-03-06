<?php

// Blog pages
use App\Events\UserWasBanned;

get('test', 'WelcomeController@test');

get('/', function () {
    //dd(Config::get('database.default'));
    //dd(config('database.default'));
    //dd(app('Illuminate\Config\Repository')['database']['default']);
    //dd(app('Illuminate\Contracts\Config\Repository')['database']['default']);
    //dd(app('config')['database']['default']);
    //dd(app()['config']['database']['default']);
    return "Lan Tra";
    //return redirect('/blog');
});
get('blog', 'BlogController@index');
get('blog/{slug}', 'BlogController@showPost');

// Add these two lines
$router->get('contact', 'ContactController@showForm');
Route::post('contact', 'ContactController@sendContactInfo');

// Admin area
get('admin', function () {
    return redirect('/admin/post');
});
$router->group([
    'namespace' => 'Admin',
    'middleware' => 'auth',
], function () {
    resource('admin/post', 'PostController', ['except' => 'show']);
    resource('admin/tag', 'TagController', ['except' => 'show']);
    get('admin/upload', 'UploadController@index');
    post('admin/upload/file', 'UploadController@uploadFile');
    delete('admin/upload/file', 'UploadController@deleteFile');
    post('admin/upload/folder', 'UploadController@createFolder');
    delete('admin/upload/folder', 'UploadController@deleteFolder');
});

// Logging in and out
get('/auth/login', 'Auth\AuthController@getLogin');
post('/auth/login', 'Auth\AuthController@postLogin');
get('/auth/logout', 'Auth\AuthController@getLogout');
