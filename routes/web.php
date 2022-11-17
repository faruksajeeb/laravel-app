<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard',[DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('change-password',[UserController::class,'changePassword'])->name('change-password');
    Route::get('user-profile',[UserController::class,'userProfile'])->name('user-profile');
        
    // Route::resource('roles', RoleController::class);
    Route::group(['middleware' => ['role:superadmin|developer']], function () { //user & role only created by superadmin
        Route::resources([
            'roles' => RoleController::class,
            'users' => UserController::class
        ]);
        Route::get('company-setting',[SettingController::class,'companySetting'])->name('company-setting');
        Route::get('basic-setting',[SettingController::class,'basicSetting'])->name('basic-setting');
        Route::get('theme-setting',[SettingController::class,'themeSetting'])->name('theme-setting');
        Route::get('email-setting',[SettingController::class,'emailSetting'])->name('email-setting');
        Route::get('performance-setting',[SettingController::class,'performanceSetting'])->name('performance-setting');
        Route::get('approval-setting',[SettingController::class,'approvalSetting'])->name('approval-setting');
        Route::get('invoice-setting',[SettingController::class,'invoiceSetting'])->name('invoice-setting');
        Route::get('salary-setting',[SettingController::class,'salarySetting'])->name('salary-setting');
        Route::get('notification-setting',[SettingController::class,'notificationSetting'])->name('notification-setting');
        Route::get('toxbox-setting',[SettingController::class,'toxboxSetting'])->name('toxbox-setting');
        Route::get('cron-setting',[SettingController::class,'cronSetting'])->name('cron-setting');
    });    
    Route::get('clear-permission-cache',[RoleController::class,'clearPermissionCache'])->name('clear-permission-cache');
});

require __DIR__.'/auth.php';
