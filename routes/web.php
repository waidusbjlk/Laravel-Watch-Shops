<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\WatchController;
use App\Http\Controllers\Auth2\RegisterController;
use App\Http\Controllers\Auth2\LoginController;
use App\Http\Controllers\Adm\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\CreateCategoryController;
use App\Http\Controllers\CommentControlller;
use App\Http\Controllers\WalletControlller;


Route::get('/', function (){
   return redirect()->route('watch.index');
});

Route::get('lang/{lang}',[LangController::class,'switchLang'])->name('switch.lang');

Route::middleware('auth')->group(function (){



    Route::get('/watch/showbalance', [WalletControlller::class, 'index'])->name('watch.balance');
    Route::post('/watch/{user}/addmoney',[WalletControlller::class, 'addmoney'])->name('watch.addmoney');








    Route::resource('/comments',CommentControlller::class)->only('store' , 'destroy');

    Route::resource('watch' , WatchController::class)->except('index');
    Route::post('/logout' , [LoginController::class, 'logout'])->name('logout');

    Route::post('/watch/{watch}/rate',[WatchController::class,'rate'])->name('watch.rate');

    Route::post('/watch/{watch}/cart',[WatchController::class,'cart'])->name('watch.cart');
    Route::get('/cart',[WatchController::class,'indexCart'])->name('cart.index');
    Route::delete('/cart/{watch}/delete',[WatchController::class,'cartDestroy'])->name('cart.delete');


    Route::post('/cart/{user}', [WatchController::class, 'buy'])->name('cart.buy');

    Route::get('/cart/{watch}/edit',[CartController::class,'editCart'])->name('editCart.index');


//    adm page route
    Route::prefix('adm')->as('adm.')->middleware('hasrole:admin,moderator')->group(function(){
        Route::get('/cart',[UserController::class,'indexCart1'])->name('cart.index');
        Route::put('/cart/{cart}/confirm',[UserController::class, 'confirm'])->name('cart.confirm');

        Route::resource('/category', CreateCategoryController::class);

//        Route::post('/cart', [WatchController::class, 'buy'])->name('cart.buy');

        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/search', [UserController::class, 'index'])->name('users.search');
        Route::put('/users/{user}/ban', [UserController::class , 'ban'])->name('users.ban');
        Route::put('/users/{user}/unban', [UserController::class , 'unban'])->name('users.unban');
        //        Route::get('/adm/posts', [AdminController::class, 'showPosts'])->name('adm.posts');
        Route::delete('/users/{user}/delete', [UserController::class, 'delete'])->name('users.delete');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/edit/update/{user}', [UserController::class,'update'])->name('users.update');

//        create watch category


    });

});
Route::resource('watch' , WatchController::class)->only('index');
//Route::resource('watch' , WatchController::class);
Route::get('/watch/category/{category}' , [WatchController::class , 'watchByCategory'])->name('watch.category');


//Route::get('/watch', [WatchController::class, 'index'])->name('watch.index');
//Route::get('watch/create', [WatchController::class, 'create'])->name('watch.create');
//Route::post('/watch', [WatchController::class, 'store'])->name('watch.store');
//Route::get('/watch/{id}', [WatchController::class, 'show'])->name('watch.show');
//Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/register', [RegisterController::class , 'create'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');


Route::get('/login', [LoginController::class , 'create'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
