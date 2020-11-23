<?php

/**
 * Welcome to Luthier-CI!
 *
 * This is your main route file. Put all your HTTP-Based routes here using the static
 * Route class methods
 *
 * Examples:
 *
 *    Route::get('foo', 'bar@baz');
 *      -> $route['foo']['GET'] = 'bar/baz';
 *
 *    Route::post('bar', 'baz@fobie', [ 'namespace' => 'cats' ]);
 *      -> $route['bar']['POST'] = 'cats/baz/foobie';
 *
 *    Route::get('blog/{slug}', 'blog@post');
 *      -> $route['blog/(:any)'] = 'blog/post/$1'
 */

Route::get('/', function(){
    redirect(route('login'),'refresh');
})->name('homepage');

Route::set('404_override', function(){
    show_404();
});

Route::set('translate_uri_dashes',FALSE);

Route::match(['get','post'],'login','AuthController@login')->name('login');

Route::post('logout', 'AuthController@logout')->name('logout');

Route::group('admin',['namespace'=>'administrator','middleware'=>['AuthCheckMiddleware']],function() {
    Route::get('dashboard','DashboardAdminController@index')->name('dashboard-admin');
    Route::get('kinerja','KinerjaAdminController@index')->name('kinerja-admin');
    Route::get('kinerja/form','KinerjaAdminController@input')->name('kinerja-admin-form');
    Route::get('user','NewUserAdminController@index')->name('user-table-admin');
    Route::get('user/form','NewUserAdminController@input')->name('adduser-admin-form');
    Route::post('user/input','NewUserAdminController@input_aksi')->name('adduser-admin-input');
    Route::post('kinerja/input','KinerjaAdminController@input_aksi')->name('kinerja-admin-input');
});

Route::group('user',['namespace'=>'pegawai','middleware'=>['AuthCheckMiddleware']],function() {
    Route::get('dashboard','DashboardUserController@index')->name('dashboard-user');
    Route::get('kinerja','KinerjaUserController@index')->name('kinerja-user');
    Route::get('kinerja/form','KinerjaUserController@input')->name('kinerja-user-form');
    Route::post('kinerja/input','KinerjaUserController@input_aksi')->name('kinerja-user-input');
});

