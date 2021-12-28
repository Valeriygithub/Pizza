<?php

use App\Notifications\Telegram;
use Illuminate\Support\Facades\Route;
use Whoops\Run;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Notification;


// !  ------------------------------- Home  --------------------------------------------------------------------------------
Route::resource('home', \App\Http\Controllers\HomeController::class);
Route::get('/add-cart', [\App\Http\Controllers\HomeController::class, 'addCart'])->name('home/add-cart'); // корзина
Route::get('contact', [\App\Http\Controllers\HomeController::class, 'contact'])->name('home/contact'); // корзина
// !  ------------------------------- Home  --------------------------------------------------------------------------------


// !  ------------------------------- Admin  --------------------------------------------------------------------------------
Route::resource('admin', \App\Http\Controllers\AdminController::class);
Route::get('/cartProduct', [\App\Http\Controllers\AdminController::class, 'cartProduct'])->name('cartProduct');   // ! Cart


// ! НЕ УДАЛЯть Создать Админа ---------------------------------------------------------------------------------------------------------------
// Route::resource('admin_user', \App\Http\Controllers\CominController::class); // ! НЕ УДАЛЯть Создать Админа
// ! НЕ УДАЛЯть Создать Админа ---------------------------------------------------------------------------------------------------------------

Route::resource('adminca', \App\Http\Controllers\LoockController::class);

// !  ------------------------------- Admin  --------------------------------------------------------------------------------

Route::get('/logout', function() {
	Session::forget('password');
	Session::forget('$sessionId');
	if(!Session::has('password'))
	{
		return redirect()->action("\App\Http\Controllers\LoockController@index");
	}
});

// !  ------------------------------- Cart --------------------------------------------------------------------------------

Route::get('/cart', '\App\Http\Controllers\CartController@index')->name('CartIndex'); // корзина
Route::get('/remove-cart', [\App\Http\Controllers\CartController::class, 'remove'])->name('cart/remove-cart'); // удаление товара из корзины корзина 
Route::get('/order', [\App\Http\Controllers\CartController::class, 'create'])->name('order'); // форма Заказа
Route::get('/update', [\App\Http\Controllers\CartController::class, 'update'])->name('cart/update-minus'); // форма Заказа
Route::post('/store', [\App\Http\Controllers\CartController::class, 'store'])->name('store');
Route::get('/clear', [\App\Http\Controllers\CartController::class, 'clear'])->name('clear');

// !  ------------------------------- Cart --------------------------------------------------------------------------------







