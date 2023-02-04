<?php

use App\Http\Controllers\CartController;
use Illuminate\Http\Request;
use App\Http\Controllers\Shop;
use App\Http\Controllers\Login;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Transactions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', function () {
    return view('login');
})->name('login');



Route::post('/sign-in', [Login::class, 'sign_in'])->name('sign-in');

Route::get('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

Route::get('/cartcontent', [CartController::class, 'test']);


Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('dashboard', [Dashboard::class, 'index'])->name("dashboard");
    Route::get('cart/transactions', [Transactions::class, 'index'])->name('transactions');
});


Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('/', [Shop::class, 'index'])->name("shop");
    Route::get('shop/detail/{product_code}', [Shop::class, 'detail']);



    Route::get('cart', [CartController::class, 'index'])->name('cart');
    Route::post('cart/add-to-cart', [CartController::class, 'add_to_cart']);
    Route::post('cart/update-cart', [CartController::class, 'update_cart']);
    Route::post('cart/remove-cart', [CartController::class, 'remove_cart']);
    Route::post('cart/place-order', [CartController::class, 'place_order']);
});
