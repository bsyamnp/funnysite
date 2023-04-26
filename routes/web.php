<?php

use App\Http\Controllers\BalanceController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\Auth2\RegisterController;
use App\Http\Controllers\Auth2\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Adm\UserController;
use App\Http\Controllers\Adm\CategoryController;
use App\Http\Controllers\LangController;
Route::get('/', function () {
    return redirect()->route('clubs.index');
});

Route::get('lang/{lang}',[LangController::class, 'switchLang'])->name('switch.lang');
Route::middleware('auth')->group(function(){
    Route::resource('clubs',ClubController::class)->except('index','show');

    Route::resource('comments',CommentController::class)->only('store','destroy');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('/shops/{shop}/rate',[ShopController::class, 'rate'])->name('shops.rate');
    Route::post('/shops/{shop}/unrate',[ShopController::class, 'unrate'])->name('shops.unrate');


    Route::get('/cars/upbalance/{user}', [BalanceController::class, 'upBalance'])->name('shops.balance');
    Route::post('/balance/store', [BalanceController::class, 'balanceStore'])->name('balance.store');
    Route::post('/price/store', [BalanceController::class, 'storeprice'])->name('price.store');
//    Route::post('/cars/buy/{shop}', [BalanceController::class, 'buyCar'])->name('shops.buy');
    ////////////////////////////////////////////////////////////////////////////////////////////////
    Route::post('cart/{shop}/putToCart',[CartController::class, 'putToCart'])->name('cart.puttocart');
    Route::get('/cart',[CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/buy',[CartController::class, 'buy'])->name('cart.buy');
    Route::post('/cart/{shop}/deleteFromCart',[CartController::class, 'deleteFromCart'])->name('cart.deletefromcart');


    Route::get('/shops/create',[ShopController::class, 'create'])->name('shops.create');
    Route::post('/shops/store',[ShopController::class, 'store'])->name('shops.store');
    Route::get('/shops/{shop}/edit', [ShopController::class, 'edit'])->name('shops.edit');
    Route::put('/shops/{shop}', [ShopController::class, 'update'])->name('shops.update');
    Route::delete('/shops/delete/{shop}', [ShopController::class, 'destroy'])->name('shops.destroy');
    Route::get('/category/cr',[CategoryController::class, 'createe'])->name('category.cr');


    Route::prefix('adm')->as('adm.')->middleware('has.role:admin,moderator')->group(function(){
        Route::get('/users' ,[UserController::class,'index'])->name('users.index');
        Route::get('/users/search',[UserController::class, 'index'])->name('users.search');
        Route::get('/users/{user}/edit',[UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}/update',[UserController::class, 'update'])->name('users.update');
        Route::put('/users/{user}/ban',[UserController::class, 'ban'])->name('users.ban');
        Route::put('/users/{user}/unban',[UserController::class, 'unban'])->name('users.unban');
        Route::get('/cart/{cart}/confirm',[UserController::class, 'confirm'])->name('cart.confirm');
        Route::get('/cart',[UserController::class, 'cart'])->name('cartu.index');
        Route::get('/shops',[ShopController::class, 'list'])->name('shops.list');
        Route::get('/category',[CategoryController::class, 'index'])->name('category.index');
        Route::get('/category/create',[CategoryController::class, 'create'])->name('category.create');
        Route::post('/category/store',[CategoryController::class, 'store'])->name('category.store');
        Route::delete('/category/delete/{category}',[CategoryController::class, 'delete'])->name('category.destroy');
    });
});
Route::resource('clubs',ClubController::class)->only('index','show');


Route::get('/clubs/bycat/{category}',[ClubController::class,'clubByCat'])->name('clubByCat');
Route::get('/shops/bycat/{club}',[ShopController::class,'shopByCat'])->name('shopByCat');

Route::get('/shops',[ShopController::class, 'index'])->name('shops.index');
Route::get('/shops/{shop}',[ShopController::class, 'show'])->name('shops.show');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/register',[RegisterController::class, 'create'])->name('register.form');
Route::post('/register',[RegisterController::class ,'register'])->name('register');
Route::get('/login',[LoginController::class, 'create'])->name('login.form');
Route::post('/login',[LoginController::class ,'login'])->name('login');
