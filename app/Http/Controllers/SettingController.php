<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public $user;
    public function __construct()
    {       
        $this->middleware(function($request, $next){
        //    $this->user = Auth::user();
            $this->user = Auth::guard('web')->user();
            return $next($request);
        });
    }

    public function companySetting(){
        // $companySettings = DB::table('company_settings')->get();
        return view('settings.company-setting', [
            // 'companySettings' => $companySettings
        ]);
    }
    public function basicSetting(){
        // $basicSettings = DB::table('basic_settings')->get();
        return view('settings.basic-setting', [
            // 'basicSettings' => $basicSettings
        ]);
    }
    public function themeSetting(){
        // $themeSettings = DB::table('theme_settings')->get();
        return view('settings.theme-setting', [
            // 'themeSettings' => $themeSettings
        ]);
    }
    public function emailSetting(){
        // $emailSettings = DB::table('email_settings')->get();
        return view('settings.email-setting', [
            // 'emailSettings' => $emailSettings
        ]);
    }
    public function performanceSetting(){
        // $performanceSettings = DB::table('performance_settings')->get();
        return view('settings.performance-setting', [
            // 'performanceSettings' => $performanceSettings
        ]);
    }
    public function approvalSetting(){
        // $approvalSettings = DB::table('approval_settings')->get();
        return view('settings.approval-setting', [
            // 'approvalSettings' => $approvalSettings
        ]);
    }
    public function invoiceSetting(){
        // $invoiceSettings = DB::table('invoice_settings')->get();
        return view('settings.invoice-setting', [
            // 'invoiceSettings' => $invoiceSettings
        ]);
    }
    public function salarySetting(){
        // $salarySettings = DB::table('salary_settings')->get();
        return view('settings.salary-setting', [
            // 'salarySettings' => $salarySettings
        ]);
    }
    public function notificationSetting(){
        // $notificationSettings = DB::table('notification_settings')->get();
        return view('settings.notification-setting', [
            // 'notificationSettings' => $notificationSettings
        ]);
    }
    public function toxboxSetting(){
        // $toxboxSettings = DB::table('toxbox_settings')->get();
        return view('settings.toxbox-setting', [
            // 'toxboxSettings' => $toxboxSettings
        ]);
    }
    public function cronSetting(){
        // $cronSettings = DB::table('cron_settings')->get();
        return view('settings.cron-setting', [
            // 'cronSettings' => $cronSettings
        ]);
    }
}
