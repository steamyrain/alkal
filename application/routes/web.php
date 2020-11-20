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


/*
Route::get('/', function(){
   luthier_info();
})->name('homepage');
*/

// test route for index
// Route::get('test','foo@index');

// test route for controller behind directory
// Route::get('bar','login@index',['namespace'=>'administrator']);

// test route for welcome message
// Route::get('welcome','welcome@index');

// disabled for login testing purposes
/*
Route::get('/',function() {
    redirect(route('login'));
});

Route::get('login','login@index',['namespace'=>'administrator'])->name('login');
 */

//Route::auth();

Route::get('/', function(){
   luthier_info();
})->name('homepage');

Route::match(['get','post'],'login','AuthController@login')->name('login');

Route::post('logout', 'AuthController@logout')->name('logout');

Route::get('dashboard','dashboard@index',['namespace'=>'administrator'])->name('dashboard');

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

//Route::get('login','login@index',['namespace'=>'administrator'])->name('login');

//Route::match(['get','post'],'dologin','login@dologin',['namespace'=>'administrator'])->name('dologin');

//Route::post('logout','dashboard@logout',['namespace'=>'administrator'])->name('logout');

//Route::get('test','test@index',['namespace'=>'administrator']);

Route::set('404_override', function(){
    show_404();
});

Route::set('translate_uri_dashes',FALSE);

