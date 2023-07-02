<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MainController;
use App\Http\Middleware\loginCheck;


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
Route::get('/', function () {

    if (Auth::user()) {
        return redirect('/dashboard');
    } else {
        return redirect('/login');
    }
});
Auth::routes();
Route::middleware([loginCheck::class])->group(function () {
        // Route::get('/dashboard', [MainController::class, 'index'])->name('dashboard');

Route::post('/main/getPage', [MainController::class, 'getPage']);


    // Route::get('/dashboard', [MainController::class, 'index'])->name('dashboard');
    // Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/{menu}', [MainController::class, 'index'])->where('menu', '([A-Za-z0-9\-\/]+)');
});
