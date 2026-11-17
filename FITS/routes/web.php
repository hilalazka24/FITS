<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'halamanlogin')->name('home');
Route::view('/login', 'halamanlogin')->name('login');
