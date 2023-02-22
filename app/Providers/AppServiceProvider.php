<?php

namespace App\Providers;

use App\Models\User;
use App\Services\PermissionGateAndPolicyAccess;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use phpDocumentor\Reflection\Types\True_;

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
        //Database: Migrations setting defaut
        Schema::defaultStringLength(191);

        //set use bootstrap Paginator
        Paginator::useBootstrap();

        //set permission
        $permissionGateAndPolicy = new PermissionGateAndPolicyAccess();
        $permissionGateAndPolicy->setGateAndPolicyAccess();
    }

}
