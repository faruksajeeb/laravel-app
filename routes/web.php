<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\lib\Webspice;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Livewire\OptionGroup;
use App\Http\Livewire\Options;
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
    Route::get('active-inactive', [Webspice::class, 'activeInactive'])->name('active.inactive');
    Route::get('/dashboard',[DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::any('change-password',[UserController::class,'changePassword'])->name('change-password');
    Route::get('user-profile',[UserController::class,'userProfile'])->name('user-profile');
        
    // Route::resource('roles', RoleController::class);
    Route::group(['middleware' => ['role:superadmin|developer']], function () { //user & role only created by superadmin
        Route::resources([
            'roles' => RoleController::class,
            'users' => UserController::class
        ]);
        Route::match(['get', 'put'],'company-setting',[SettingController::class,'companySetting'])->name('company-setting');
        Route::match(['get', 'put'],'basic-setting',[SettingController::class,'basicSetting'])->name('basic-setting');
        Route::match(['get', 'put'],'theme-setting',[SettingController::class,'themeSetting'])->name('theme-setting');
        Route::match(['get', 'put'],'email-setting',[SettingController::class,'emailSetting'])->name('email-setting');
        Route::match(['get', 'put'],'performance-setting',[SettingController::class,'performanceSetting'])->name('performance-setting');
        Route::match(['get', 'put'],'approval-setting',[SettingController::class,'approvalSetting'])->name('approval-setting');
        Route::match(['get', 'put'],'invoice-setting',[SettingController::class,'invoiceSetting'])->name('invoice-setting');
        Route::match(['get', 'put'],'salary-setting',[SettingController::class,'salarySetting'])->name('salary-setting');
        Route::match(['get', 'put'],'notification-setting',[SettingController::class,'notificationSetting'])->name('notification-setting');
        Route::match(['get', 'put'],'toxbox-setting',[SettingController::class,'toxboxSetting'])->name('toxbox-setting');
        Route::match(['get', 'put'],'cron-setting',[SettingController::class,'cronSetting'])->name('cron-setting');
    });   
    
    Route::get('option-groups',OptionGroup::class)->name('option-groups'); 
    Route::get('options',Options::class)->name('options'); 
    
    Route::get('clear-permission-cache',[RoleController::class,'clearPermissionCache'])->name('clear-permission-cache');
});
Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:cache');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    return  "all cleared ...";

});


require __DIR__.'/auth.php';
