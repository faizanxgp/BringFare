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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return redirect()->route('home');
})->name('index');

Auth::routes();

#Email
Route::get('register/verify/{token}', 'Auth\RegisterController@verify');

# General
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search', 'HomeController@search')->name('search');
Route::post('/search', 'HomeController@postSearch')->name('post-search');
Route::get('/category/{id}', 'HomeController@getSearchCategory')->name('search-category');

Route::get('/search-trips', 'HomeController@searchTrips')->name('search-trips');
Route::post('/search-trips', 'HomeController@postSearchTrips')->name('post-search-trips');

Route::get('/product/{id?}', 'HomeController@request')->name('request');

# User Actions
Route::get('/dashboard', 'UserController@getHome')->name('dashboard');

Route::get('/products/create', 'UserController@getRequest')->name('create-request');
Route::post('/products/add', 'UserController@postRequest')->name('add-request');
Route::get('/products/create-product/{id}', 'UserController@getRequestDuplicate')->name('create-request-duplicate');

Route::get('/trips/create', 'UserController@getTrip')->name('create-trip');
Route::post('/trips/add', 'UserController@postTrip')->name('add-trip');

Route::post('/user/add-comment',  'UserController@postAddComment')->name('post-comment');
Route::post('/user/edit-comment', 'UserController@postAddComment')->name('edit-comment');

Route::get('/user/products', 'UserController@getRequests')->name('requests');
Route::get('/user/product/{id}', 'UserController@getRequestEdit')->name('edit-request');
Route::get('/user/product/select/{id}', 'UserController@getRequestSelect')->name('select-request');
Route::get('/user/product/invite/{id}', 'UserController@getRequestInvite')->name('invite-request');
Route::post('/user/product/invite', 'UserController@postRequestInvite')->name('post-invite-request');

Route::get('/user/trips', 'UserController@getTrips')->name('trips');
Route::get('/user/trip/{id}', 'UserController@getTripEdit')->name('edit-trip');

Route::get('/user/inbox', 'UserController@getInbox')->name('inbox');
Route::get('/user/notification', 'UserController@getNotification')->name('notification');

Route::get('/user/bids', 'UserController@getBids')->name('bids');
Route::get('/user/applied', 'UserController@getApplied')->name('applied');

Route::get('/user/discuss/{id}', 'UserController@getDiscuss')->name('discuss');
Route::post('/user/add-discuss', 'UserController@postDiscuss')->name('add-discuss');
Route::post('/user/update-status', 'UserController@postUpdateBidStatus')->name('bid-status');

Route::get('/user/add-rating/{id1}/{id2}', 'UserController@getRating')->name('get-rating');
Route::post('/user/post-rating', 'UserController@postRating')->name('post-rating');

Route::get('/user/wallet', 'UserController@getWallet')->name('wallet');
Route::get('/user/profile/{id?}', 'UserController@getProfile')->name('profile');
Route::get('/user/edit-profile', 'UserController@getEditProfile')->name('edit-profile');
Route::post('/user/update-profile', 'UserController@postEditProfile')->name('update-profile');
Route::get('/user/settings', 'UserController@getSettings')->name('settings');

Route::get('/user/follow/{id}', 'UserController@getFollow')->name('follow');
Route::get('/user/unfollow/{id}', 'UserController@getUnFollow')->name('unfollow');

Route::post('/send-message', 'UserController@postSendMessage')->name('post-message');
Route::get('/messages', 'UserController@getMessages')->name('messages');
Route::get('/message/{id}', 'UserController@getMessage')->name('message');
Route::post('/message/reply', 'UserController@postMessageReply')->name('reply-message');

Route::get('/contact', 'UserController@getContact')->name('contact');

Route::get('/report/{id}', 'UserController@getReport1')->name('report-request');
Route::get('/report/{id}/{id2}', 'UserController@getReport2')->name('report-bid');
Route::get('/report/{id}/{id2}/{id3}', 'UserController@getReport3')->name('report-comment');
Route::post('/report', 'UserController@postReport')->name('post-report');


Route::get('/page/{slug}', 'UserController@getPage')->name('page');

Route::get('/test', 'UserController@test')->name('test');
Route::get('/test2', 'UserController@test2')->name('test2');

//Auth::routes();


Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

// Admin
Route::prefix('admin')->group(function () {

//    Route::get('/', function () {
//        return redirect()->route('admin.dashboard');
//    })->name('admin.home');

    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    Route::get('/account', 'AdminController@getAccount')->name('admin.account');
    Route::post('/account/update', 'AdminController@postAccount')->name('admin.account.submit');

    // Password reset routes
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

    Route::get('/categories', 'AdminController@getCategories')->name('admin.categories');
    Route::get('/category/{id}', 'AdminController@getCategory')->name('admin.category');
    Route::post('/category', 'AdminController@postCategory')->name('admin.update-category');

    Route::get('/products', 'AdminController@getProducts')->name('admin.products');
    Route::get('/product/{id}', 'AdminController@getProduct')->name('admin.product');
    Route::get('/product/status/{id}', 'AdminController@getProductStatus')->name('admin.product-status');

    Route::get('/users', 'AdminController@getUsers')->name('admin.users');
    Route::get('/user/{id}', 'AdminController@getUser')->name('admin.user');
    Route::get('/user/status/{id}', 'AdminController@getUserStatus')->name('admin.user-status');

    Route::get('/messages', 'AdminController@getMessages')->name('admin.messages');
    Route::get('/message/{id}', 'AdminController@getMessage')->name('admin.message');
    Route::post('/message/reply', 'AdminController@postMessageReply')->name('admin.reply-message');

    Route::get('/ledger/{id}', 'AdminController@getLedger')->name('admin.ledger');
    Route::get('/ledger/delete/{id}', 'AdminController@getLedgerDelete')->name('admin.ledger-delete');
    Route::post('/update-ledger', 'AdminController@postLedger')->name('admin.update-ledger');

    Route::get('/reports', 'AdminController@getReports')->name('admin.reports');

    Route::get('/product/suspend/{id}', 'AdminController@getProductSuspend')->name('admin.product-suspend');
    Route::get('/bid/delete/{id}', 'AdminController@getBidDelete')->name('admin.bid-delete');
    Route::get('/user/suspend/{id}', 'AdminController@getUserSuspend')->name('admin.user-suspend');

    Route::get('/pages', 'AdminController@getPages')->name('admin.pages');

    Route::get('/page/{id}', 'AdminController@getPage')->name('admin.page');

    Route::post('/page', 'AdminController@postPage')->name('admin.updatepage');

});


Route::group([], function () {

Route::get('/admin', function () {
    return view('welcome');
});


//    Route::get('/main', [
//        'uses' => 'MainController@getIndex',
//        'as' => 'index-page'
//    ]);

    #->middleware('auth');
    #magic

    /* General */


    /* Common */
    Route::get('/error', [
        'uses' => 'HomeController@getErrorPage',
        'as' => 'error'
    ]);


});

#Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('login/github', 'SocialAuthController@redirectToProvider');
//Route::get('login/github/callback', 'SocialAuthController@handleProviderCallback');
//
//Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
//Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');


Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');





