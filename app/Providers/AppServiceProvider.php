<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Permission;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $data = Mrpermission::where('status', 1)->get();
        $data = Permission::select('group_name')->where(['status'=>1,'guard_name'=>'web','is_menu'=>'yes'])->groupBy('group_name')->get();

        view()->share('menu_groups', $data);
    }
}
