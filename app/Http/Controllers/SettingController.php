<?php

namespace App\Http\Controllers;

use App\Lib\Webspice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            //    $this->user = Auth::user();
            $this->user = Auth::guard('web')->user();
            return $next($request);
        });
    }

    public function companySetting(Request $request)
    {
        #permission verfy
        if (is_null($this->user) || !$this->user->can('company.setting')) {
            abort(403, 'SORRY! You are unauthorized to access user list!');
        }
        if ($request->all()) {
            $request->validate(
                [
                    'company_name' => 'required'
                ]
            );
            $updateData = array(
                'company_name' => $request->company_name,
                'contact_person' => $request->contact_person,
                'address' => $request->address,
                'country' => $request->country,
                'city' => $request->city,
                'state' => $request->state,
                'postal_code' => $request->postal_code,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'mobile_number' => $request->mobile_number,
                'fax' => $request->fax,
                'website_url' => $request->website_url,
                'updated_at' => now()
            );
            try {
                DB::table('company_settings')
                    ->where('id', 1)
                    ->update($updateData);
                # remove cache
                Cache::forget('company_settings');
            } catch (\Exception $e) {
                # return error message
                return back()->with("error", $e->getMessage());
            }
            # write log
            Webspice::log('company_settings', 1, "Company information updated.");
            # success message
            return back()->with("success", "Company information has been changed successfully!");
        }
        if (Cache::has('company_settings')) {
            # get from file cache
            $companySettings = Cache::get('company_settings');
        } else {
            # get from database
            $companySettings = DB::table('company_settings')->first();
            Cache::put('company_settings', $companySettings);
        }
        return view('settings.company-setting', compact('companySettings'));
    }

    public function basicSetting(Request $request)
    {
        #permission verfy
        if (is_null($this->user) || !$this->user->can('basic.setting')) {
            abort(403, 'SORRY! You are unauthorized to access user list!');
        }
        if ($request->all()) {
            $request->validate(
                [
                    'default_country' => 'required'
                ]
            );
            $updateData = array(
                'default_country' => $request->default_country,
                'timezone' => $request->timezone,
                'currency_code' => $request->currency_code,
                'date_format' => $request->date_format,
                'default_language' => $request->default_language,
                'currency_symbol' => $request->currency_symbol,
                'updated_at' => now()
            );
            try {
                DB::table('company_settings')
                    ->where('id', 1)
                    ->update($updateData);
                # remove cache
                Cache::forget('company_settings');
            } catch (\Exception $e) {
                # return error message
                return back()->with("error", $e->getMessage());
            }
            # write log
            Webspice::log('company_settings', 1, "Company information updated.");
            # success message
            return back()->with("success", "Company information has been changed successfully!");
        }
        if (Cache::has('company_settings')) {
            # get from file cache
            $companySettings = Cache::get('company_settings');
        } else {
            # get from database
            $companySettings = DB::table('company_settings')->first();
            Cache::put('company_settings', $companySettings);
        }
        return view('settings.company-setting', compact('companySettings'));
    }
    public function themeSetting(Request $request)
    {
        // $themeSettings = DB::table('theme_settings')->get();
        return view('settings.theme-setting', [
            // 'themeSettings' => $themeSettings
        ]);
    }
    public function emailSetting(Request $request)
    {
        // $emailSettings = DB::table('email_settings')->get();
        return view('settings.email-setting', [
            // 'emailSettings' => $emailSettings
        ]);
    }
    public function performanceSetting(Request $request)
    {
        // $performanceSettings = DB::table('performance_settings')->get();
        return view('settings.performance-setting', [
            // 'performanceSettings' => $performanceSettings
        ]);
    }
    public function approvalSetting(Request $request)
    {
        // $approvalSettings = DB::table('approval_settings')->get();
        return view('settings.approval-setting', [
            // 'approvalSettings' => $approvalSettings
        ]);
    }
    public function invoiceSetting(Request $request)
    {
        // $invoiceSettings = DB::table('invoice_settings')->get();
        return view('settings.invoice-setting', [
            // 'invoiceSettings' => $invoiceSettings
        ]);
    }
    public function salarySetting(Request $request)
    {
        // $salarySettings = DB::table('salary_settings')->get();
        return view('settings.salary-setting', [
            // 'salarySettings' => $salarySettings
        ]);
    }
    public function notificationSetting(Request $request)
    {
        // $notificationSettings = DB::table('notification_settings')->get();
        return view('settings.notification-setting', [
            // 'notificationSettings' => $notificationSettings
        ]);
    }
    public function toxboxSetting(Request $request)
    {
        // $toxboxSettings = DB::table('toxbox_settings')->get();
        return view('settings.toxbox-setting', [
            // 'toxboxSettings' => $toxboxSettings
        ]);
    }
    public function cronSetting(Request $request)
    {
        // $cronSettings = DB::table('cron_settings')->get();
        return view('settings.cron-setting', [
            // 'cronSettings' => $cronSettings
        ]);
    }
}
