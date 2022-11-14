<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Mrpermission;


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
        $data = Mrpermission::where('status', 1)->get();

        view()->share('menus', $data);
    }
}
