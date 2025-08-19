<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\{
    HomeController,
    ProductController,
    CartController,
    WishlistController,
    PaymentController,
    ShopController,
    OrderController
};
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\{
    CommonController
};

// Home Page Route
Route::get('/', [HomeController::class, 'homePage'])->name('homePage');

// Auth Route
Route::get('login', [LoginController::class, 'index'])->name('login.index');
Route::post('login', [LoginController::class, 'store'])->name('login.store');
Route::get('logout', [LoginController::class, 'logout'])->name('auth.logout');
Route::post('createAccount', [LoginController::class, 'createAccount'])->name('createAccount');

Route::get('forgot-password', [LoginController::class, 'forgotPassword'])->name('forgot-password.index');
Route::post('forgot-password', [LoginController::class, 'forgotPasswordSend'])->name('forgot-password.store');

Route::get('product/{slug}', [ShopController::class, 'shopSingle'])->name('shop.single');
Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::get('remove-from-cart/{itemId}', [CartController::class, 'removeFromCart'])->name('remove-from-cart');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');

Route::post('checkout/process', [OrderController::class, 'doOrder'])->name('checkout.process');
Route::get('thank-you', [OrderController::class, 'thankyou'])->name('thank.you');

Route::get('form-save', [HomeController::class, 'formsave'])->name('form.save');

Route::get('getStates', [CommonController::class, 'getStates'])->name('get-states');
Route::get('getCities', [CommonController::class, 'getCities'])->name('get-cities');

// Pages and Single Page Route
Route::get('{slug}', [HomeController::class, 'singlePage'])->name('single.page');
Route::get('{post_type}/{slug}', [HomeController::class, 'singlePost'])->name('single.post');
Route::get('term/{category}/{slug}', [HomeController::class, 'terms'])->name('post.category');

// Additional Route
Route::post('contactus-form', [HomeController::class, 'contactUsForm'])->name('contactus.form');
Route::post('subscribe-form', [HomeController::class, 'subscribeForm'])->name('subscribe.form');

// Payment Routs
Route::get('/payment', function () {
    return view('payment');
});
Route::post('/create-payment-intent', [PaymentController::class, 'createPaymentIntent']);
