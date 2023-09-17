<?php

use app\Http\Controllers\HomeController;
use illuminate\Support\Facades\Route;
use illuminate\Support\Facades\Auth;
use app\Http\Controllers\MainController;
use app\Http\Controllers\ListUserController;
use app\Http\Controllers\ManageCompanyController;
use app\Http\Controllers\ExampleController;
use app\Http\Middleware\loginCheck;
use app\Http\Controllers\NotificationController;
use app\Http\Controllers\LoginWithGoogleController;
use app\Http\Controllers\ConfigurationController;
use app\Http\Controllers\ProfileController;
use app\Http\Controllers\LogController;

use app\Models\Example;
use illuminate\Notifications\Notification;

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

Route::controller(LoginWithGoogleController::class)->group(function () {
    Route::get('authorized/google', 'redirectToGoogle')->name('auth.google');
    Route::get('authorized/google/callback', 'handleGoogleCallback');
});

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
    Route::get('examples', [ExampleController::class, 'index'])->name('example.index');
    Route::get('users', [ListUserController::class, 'index'])->name('listuser.index');
    Route::get('company', [ManageCompanyController::class, 'index'])->name('managecompany.index');
    Route::get('detailprofiles', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('log', [LogController::class, 'showLog'])->name('log.showLog');


    Route::post('/save-token', [NotificationController::class, 'saveToken'])->name('save-token');
    Route::post('/send-notification', [NotificationController::class, 'sendNotification'])->name('send.notification');
    // Route::get('/dashboard', [MainController::class, 'index'])->name('dashboard');
    // Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::controller(ExampleController::class)->group(function () {
        foreach (['show', 'create', 'update', 'delete', 'getData'] as $key => $value) {
            Route::post('/example/' . $value, $value);
        }
    });
    Route::controller(ListUserController::class)->group(function () {
        foreach (['show', 'create', 'update', 'delete', 'getData', 'detailJob'] as $key => $value) {
            Route::post('/listuser/' . $value, $value);
        }
    });
    Route::controller(ConfigurationController::class)->group(function () {
        foreach (['getConfig', 'save', 'uploadFile', 'deleteFile'] as $key => $value) {
            Route::post('/config/' . $value, $value);
        }
    });
    Route::controller(ProfileController::class)->group(function () {
        foreach (['index', 'update', 'changePassword'] as $key => $value) {
            Route::post('/config/' . $value, $value);
        }
    });
    Route::get('/{menu}', [MainController::class, 'index'])->where('menu', '([A-Za-z0-9\-\/]+)');
});
