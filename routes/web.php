<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::get('/', 'BasicOpController@getHomePage')->name('index.page');
    Route::get('/about', 'BasicOpController@getAbout')->name('about.page');
//    Route::get('/bundle', 'BasicOpController@getBundle')->name('bundle.page');
    Route::post('/contact', 'BasicOpController@postContact')->name('post.contact.page');
    Route::get('/faq', 'BasicOpController@getFaq')->name('faq.page');
    Route::get('/terms/conditions', 'BasicOpController@getTerms')->name('terms.page');
    Route::get('/privacy/policy', 'BasicOpController@getPrivacy')->name('privacy.page');

    Auth::routes(['verify'=> true]);
//    Route::get('login/{provider}','Auth\LoginController@redirectToProvider')->name('social.login');
//    Route::get('login/{provider}/redirect','Auth\LoginController@handleProviderCallback')->name('social.redirect');
    Route::get('/social/{social}','Auth\LoginController@socialLogin')->where('social','twitter|facebook|linkedin|google|github|bitbucket');
    Route::get('/social/{social}/callback','Auth\LoginController@handleProviderCallback')->where('social','twitter|facebook|linkedin|google|github|bitbucket');

    Route::group(['prefix'=>'user'],function (){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile','CustomerController@show')->name('get.user.profile');
    Route::get('/profile/edit','CustomerController@show')->name('get.user.profile.edit');
    Route::get('/profile/update','CustomerController@show')->name('get.user.profile.edit');

    Route::get('/conversion','CustomerController@convertView')->name('get.user.convert');
    Route::post('/conversion/post','CustomerController@convertPost')->name('post.user.convert');
    Route::get('/profile/edit','CustomerController@edit')->name('get.user.profile.edit');
    Route::post('/profile/edit/post','CustomerController@update')->name('post.user.profile.edit');
    Route::get('/bundle/list','CustomerController@getBundle')->name('get.bundle.list');
//    Route::get('/bundle/purchase/{id}','HomeController@getPurchase')->name('get.bundle.purchase');
    Route::get('/conversion/history','PaymentController@convHistory')->name('get.conversion.history');
        Route::post('/phone/send/code','CustomerController@sendPhoneCode')->name('post.send.phone.code');
        Route::post('/phone/code/verify','CustomerController@verifyPhoneCode')->name('post.phone.code.verify');
//    Route::get('/payment/history','PaymentController@paymentHistory')->name('get.payment.history');
    Route::get('/trending/list','CustomerController@getTrending')->name('get.trending.history');
    Route::get('/change/password','CustomerController@getChangePwd')->name('get.change.password');
    Route::post('/change/password/post','CustomerController@postChangePwd')->name('post.change.password');

});
//    Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
//    Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');

    Route::group(["prefix"=>"app/admin"], function (){
        Route::get('/login', 'Auth\LoginAdminController@showAdminLoginForm')->name('get.login');
        Route::post('post/login', 'Auth\LoginAdminController@adminLogin')->name('admin.login');
        Route::get('/dashboard', 'Admin\AdminController@index')->name('admin.dashboard');
        Route::get('/bundle', 'Admin\AdminController@bundleAdd')->name('admin.bundle.add');
        Route::post('/bundle/post', 'Admin\AdminController@bundleAddPost')->name('admin.bundle.add.post');
        Route::get('/trending', 'Admin\AdminController@treadCode')->name('admin.treading.code');
        Route::post('/trending', 'Admin\AdminController@treadCodePost')->name('admin.treading.code.post');
        Route::get('/convert/{name}','Admin\AdminController@conversion')->name('get.from.to');
        Route::get('/book/makers','Admin\AdminController@getBookmaker')->name('get.book.makers');
        Route::get('/records','Admin\AdminController@registrations')->name('get.records');
        Route::get('/failed','Admin\AdminController@getConversionCode')->name('get.failed.conversions');
        Route::get('/details','Admin\AdminController@details')->name('get.details');

    });
