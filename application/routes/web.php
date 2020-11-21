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
   luthier_info();
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
    Route::post('kinerja/input','KinerjaAdminController@input_aksi')->name('kinerja-admin-input');
});

Route::get('userdashboard',function() {
    $currentUser = Auth::user();
    $userName = $currentUser->getUsername();
    $role = $currentUser->getRoles();
    $user = [
        'username'=>$userName,
        'role'=>$role
    ];
    ci()->load->view('template_pegawai/header');
    ci()->load->view('template_pegawai/sidebar');
    ci()->load->view('pegawai/dashboard',$user);
    ci()->load->view('template_pegawai/footer');
})->name('dashboard-user');

