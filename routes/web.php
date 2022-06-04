<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers;
use App\Http\Controllers\Contact;
use App\Http\Controllers\Home;



Route::get('/home', Home::class)->middleware('auth');
Route::get('/', Home::class)->middleware('auth');
Route::get('/contact', Contact::class)->middleware('auth');
Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
