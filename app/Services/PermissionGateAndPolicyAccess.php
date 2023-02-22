<?php
namespace App\Services;

use App\Policies\CategoryPolicy;
use App\Policies\MenuPolicy;
use App\Policies\PermissionPolicy;
use App\Policies\PostPolicy;
use App\Policies\ProductPolicy;
use App\Policies\RolePolicy;
use App\Policies\SettingPolicy;
use App\Policies\SliderPolicy;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicyAccess{
    public function setGateAndPolicyAccess(){
        $this->defineGateProduct();
        $this->defineGateCategory();
        $this->defineGatePost();
        $this->defineGateMenu();
        $this->defineGateSlider();
        $this->defineGateSetting();
        $this->defineGateUser();
        $this->defineGateRole();
        $this->defineGatePermission();
    }

    public function defineGateProduct(){
        Gate::define('product-list', [ProductPolicy::class, 'view']);
        Gate::define('product-add', [ProductPolicy::class, 'create']);
        Gate::define('product-update', [ProductPolicy::class, 'update']);
        Gate::define('product-delete', [ProductPolicy::class, 'delete']);
    }

    public function defineGateCategory(){
        Gate::define('category-list', [CategoryPolicy::class, 'view']);
        Gate::define('category-add', [CategoryPolicy::class, 'create']);
        Gate::define('category-update', [CategoryPolicy::class, 'update']);
        Gate::define('category-delete', [CategoryPolicy::class, 'delete']);
    }

    public function defineGatePost(){
        Gate::define('post-list', [PostPolicy::class, 'view']);
        Gate::define('post-add', [PostPolicy::class, 'create']);
        Gate::define('post-update', [PostPolicy::class, 'update']);
        Gate::define('post-delete', [PostPolicy::class, 'delete']);
    }

    public function defineGateMenu(){
        Gate::define('menu-list', [MenuPolicy::class, 'view']);
        Gate::define('menu-add', [MenuPolicy::class, 'create']);
        Gate::define('menu-update', [MenuPolicy::class, 'update']);
        Gate::define('menu-delete', [MenuPolicy::class, 'delete']);
    }

    public function defineGateSlider(){
        Gate::define('slider-list', [SliderPolicy::class, 'view']);
        Gate::define('slider-add', [SliderPolicy::class, 'create']);
        Gate::define('slider-update', [SliderPolicy::class, 'update']);
        Gate::define('slider-delete', [SliderPolicy::class, 'delete']);
    }

    public function defineGateSetting(){
        Gate::define('setting-list', [SettingPolicy::class, 'view']);
        Gate::define('setting-add', [SettingPolicy::class, 'create']);
        Gate::define('setting-update', [SettingPolicy::class, 'update']);
        Gate::define('setting-delete', [SettingPolicy::class, 'delete']);
    }

    public function defineGateUser(){
        Gate::define('user-list', [UserPolicy::class, 'view']);
        Gate::define('user-add', [UserPolicy::class, 'create']);
        Gate::define('user-update', [UserPolicy::class, 'update']);
        Gate::define('user-delete', [UserPolicy::class, 'delete']);
    }

    public function defineGateRole(){
        Gate::define('role-list', [RolePolicy::class, 'view']);
        Gate::define('role-add', [RolePolicy::class, 'create']);
        Gate::define('role-update', [RolePolicy::class, 'update']);
        Gate::define('role-delete', [RolePolicy::class, 'delete']);
    }

    public function defineGatePermission(){
        Gate::define('permission-list', [PermissionPolicy::class, 'view']);
        Gate::define('permission-add', [PermissionPolicy::class, 'create']);
        Gate::define('permission-update', [PermissionPolicy::class, 'update']);
        Gate::define('permission-delete', [PermissionPolicy::class, 'delete']);
    }

}
