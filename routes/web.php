<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use PhpParser\Builder\FunctionLike;

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

Route::redirect('/', 'login');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('pages.app.dashboard.dashboard-siakad-dashboard', ['type_menu' => 'dashboard']);
    })->name('home');

    // User Route List
    Route::prefix('/user')->group(function (){
        Route::resource('/', UserController::class);
    });
});


