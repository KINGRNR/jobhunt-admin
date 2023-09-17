<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ListuserController;
use App\Http\Controllers\ManageCompanyController;
use App\Http\Controllers\ExampleController;
use App\Http\Middleware\loginCheck;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\LoginWithGoogleController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LogController;

use App\Models\Example;
use Illuminate\Notifications\Notification;

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
    Route::controller(ListuserController::class)->group(function () {
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
