<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginWithGooglecontroller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ListuserController;
use App\Http\Controllers\ManageCompanyController;
use App\Http\Controllers\ExampleController;
use App\Http\Middleware\loginCheck;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ManageJobController;

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

Route::controller(LoginWithGooglecontroller::class)->group(function () {
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
    Route::get('showallusers', [ListUserController::class, 'showall'])->name('listuser.showall');
    // Route::get('companyjob', [ManageCompanyController::class, 'jobIndex'])->name('managecompany.jobIndex');
    // Route::get('job', [::class, 'index'])->name('managejob.index');
    Route::get('log', [LogController::class, 'showLog'])->name('log.showLog');
    Route::get('notification', [NotificationController::class, 'index'])->name('notification.index');


    Route::post('/save-token', [NotificationController::class, 'saveToken'])->name('save-token');
    Route::post('/send-notification', [NotificationController::class, 'sendNotification'])->name('send.notification');
    // Route::get('/dashboard', [MainController::class, 'index'])->name('dashboard');
    // Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::controller(ExampleController::class)->group(function () {
        foreach (['show', 'create', 'update', 'delete', 'getData'] as $key => $value) {
            Route::post('/example/' . $value, $value);
        }
    });
    Route::controller(ManageJobController::class)->group(function () {
        foreach (['index', 'show', 'create', 'rejacc', 'update', 'delete', 'getData', 'detailJob', 'savesuspend', 'deleteUser'] as $key => $value) {
            Route::post('/managejob/' . $value, $value);
        }
    });
    Route::controller(ListuserController::class)->group(function () {
        foreach (['index', 'show', 'create', 'update', 'delete', 'getData', 'detailJob', 'savesuspend', 'deleteUser'] as $key => $value) {
            Route::post('/listuser/' . $value, $value);
        }
    });
    Route::controller(ManageCompanyController::class)->group(function () {
        foreach (['index', 'show', 'create', 'update', 'delete', 'getData', 'detailJob', 'jobIndex' ,'savesuspend', 'deleteUser','rejacc'] as $key => $value) {
            Route::post('/managecompany/' . $value, $value);
        }
    });
    Route::controller(ConfigurationController::class)->group(function () {
        foreach (['getConfig', 'save', 'uploadFile', 'deleteFile'] as $key => $value) {
            Route::post('/config/' . $value, $value);
        }
    });
    Route::controller(ProfileController::class)->group(function () {
        foreach (['show', 'update', 'changePassword'] as $key => $value) {
            Route::post('/profile/' . $value, $value);
        }
    });
    Route::controller(NotificationController::class)->group(function () {
        foreach (['read'] as $key => $value) {
            Route::post('/notification/' . $value, $value);
        }
    });
    Route::get('/{menu}', [MainController::class, 'index'])->where('menu', '([A-Za-z0-9\-\/]+)');
});
