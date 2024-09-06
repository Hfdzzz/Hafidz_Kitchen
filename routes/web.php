<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registercontroller;

Route::get('/', [registercontroller::class, 'index']);


Route::get('/Register_Makanan', function(){
    return view('registerMakanan');
})->name('registMakanan');

Route::get('/Information/{id}', [registercontroller::class, 'show']);

Route::get('/Login', function(){
    return view('login');
})->name('login');

Route::get('/Register_User', function(){
    return view('register');
})->name('register');

Route::post('/registerUserBerhasil', [registercontroller::class, 'registerUser'])->name('registerUserBerhasil');

Route::get('/Login', function(){
    return view('login');
})->name('login');

Route::post('/loginUserBerhasil', [registercontroller::class, 'loginUser'])->name('loginUserBerhasil');


Route::post('/', [registercontroller::class, 'store']);
