<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('pages.blank-page', ["type_menu" => "dashbaord"]);
// });

Route::get('/', function(){
    return view('pages.dashboard.dashboard-general-dashboard', ['type_menu' => '']);
})->name('login');
Route::get('/login', function(){
    return view('auth.auth-login2');
})->name('login');
Route::get('/register', function(){
    return view('auth.auth-register');
})->name('resgiter');
Route::get('/forgot', function(){
    return view('auth.auth-forgot-password');
})->name('forgot');
Route::get('/reset/password', function(){
    return view('auth.auth-reset-password');
})->name('reset');
