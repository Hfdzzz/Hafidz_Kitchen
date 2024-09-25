<?php

use App\Http\Controllers\checkoutController;
use App\Models\dataUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mailController;
use App\Http\Controllers\registercontroller;
use App\Mail\purchaseMail;
use Illuminate\Support\Facades\Mail;

Route::get('/', [registercontroller::class, 'index']);


Route::get('/Register_Makanan', function(){
    return view('registerMakanan');
})->middleware('auth', 'role:admin')->name('registMakanan');

Route::get('/Information/{id}', [registercontroller::class, 'show'])->name('menuMakanan');

Route::get('/Login', function(){
    return view('login');
})->name('login');

Route::get('/Register_User', function(){
    return view('register');
})->name('register');

Route::post('/registerUserBerhasil', [registercontroller::class, 'registerUser'])->name('registerUserBerhasil');



Route::post('/loginUserBerhasil', [registercontroller::class, 'loginUser'])->name('loginUserBerhasil');

Route::get('/User', function () {
    return view('informationUser');    
})->name('informationUser');

Route::post('/User/Logout', [registercontroller::class, 'logout'])->name('logout');


Route::post('/', [registercontroller::class, 'store']);


Route::post('/purchase', [mailController::class, 'index'])->name('purchase');

Route::delete('/Hapus_data/{id}', [registercontroller::class, 'destroy'])->name('delete');

Route::post('/Information/{id}', [registercontroller::class, 'update'])->name('update');

Route::get('Update_Makanan/{id}', [registercontroller::class, 'updateForm'])->name('updateForm');

Route::get('admin', function(){
    return 'hi admin';
})->middleware('role:admin');

Route::post('/cart', [checkoutController::class, 'store'])->middleware('checkLogin')->name('cart');

Route::get('/checkout/{id}', [checkoutController::class, 'index'])->middleware('checkLogin')->name('checkout');
