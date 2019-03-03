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

Route::get('/test', function () {
    return dd(App\Models\Post::find(1)->author);

   // return view('welcome');
});


Route::get('/', 'Frontend\LandingPageController@index')->name('landing-page');
Route::get('/shop', 'Frontend\ShopController@index')->name('shop.index');
Route::get('/shop/{product}', 'Frontend\ShopController@show')->name('shop.show');

Route::get('/cart', 'Frontend\CartController@index')->name('cart.index');
Route::post('/cart/{product}', 'Frontend\CartController@store')->name('cart.store');
Route::put('/cart/{id}', 'Frontend\CartController@update')->name('cart.update');
Route::delete('/cart/{id}', 'Frontend\CartController@destroy')->name('cart.destory');

Route::get('/checkout', 'Frontend\CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::post('/checkout', 'Frontend\CheckoutController@store')->name('checkout.store');
Route::get('/guestCheckout', 'Frontend\CheckoutController@index')->name('guestCheckout.index');

Route::get('/saveforlater/{id}', 'Frontend\SaveForLaterController@store')->name('saveforlater.store');
Route::delete('/saveforlater/{id}', 'Frontend\SaveForLaterController@destroy')->name('saveforlater.destroy');
Route::get('/saveforlater/movetocart/{id}', 'Frontend\SaveForLaterController@switchToCart')->name('saveforlater.switchtocart');

Route::get('/wishlist', 'Frontend\WishlistController@index')->name('wishlist.index')->middleware('auth');
Route::post('/wishlist/{product}', 'Frontend\WishlistController@store')->name('wishlist.store')->middleware('auth');
Route::delete('/wishlist/{product}', 'Frontend\WishlistController@destroy')->name('wishlist.destroy')->middleware('auth');

Route::get('/order', 'Frontend\OrderController@index')->name('order.index')->middleware('auth');
Route::get('/order/{order}', 'Frontend\OrderController@show')->name('order.show')->middleware('auth');

Route::get('/post', 'Frontend\PostController@index')->name('post.index');

Route::get('/contact', 'Frontend\ContactController@create')->name('contact.create');
Route::post('/contact', 'Frontend\ContactController@store')->name('contact.store');

Route::get('/thankyou', 'Frontend\ConfirmationController@index')->name('confirmation.index');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();