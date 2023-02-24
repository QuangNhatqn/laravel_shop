<?php

//Nhat route admin
Route::get('/admin', 'App\Http\Controllers\AdminController@loginAdmin')->name('admin.getLogin');
Route::post('/admin', 'App\Http\Controllers\AdminController@postLoginAdmin')->name('admin.postLogin');
Route::get('/admin/logout', 'App\Http\Controllers\AdminController@getLogoutAdmin')->name('admin.getLogout');

Route::get('/admin/home',function () {
    return view('adminlayouts.home');
})->middleware('adminLogin')->name('admin.home');
Route::prefix('admin')->middleware('adminLogin')->group(function () {
    Route::prefix('product')->group(function () {
        Route::get('/', [
            'as' => 'products.index',
            'uses' => 'App\Http\Controllers\AdminProductController@index',
            'middleware' => 'can:product-list'
        ]);
        Route::get('/create', [
            'as' => 'products.create',
            'uses' => 'App\Http\Controllers\AdminProductController@create',
            'middleware' => 'can:product-add',
        ]);
        Route::post('/store', [
            'as' => 'products.store',
            'uses' => 'App\Http\Controllers\AdminProductController@store',
            'middleware' => 'can:product-add',
        ]);
        Route::get('/edit/{id}', [
            'as' => 'products.edit',
            'uses' => 'App\Http\Controllers\AdminProductController@edit',
            'middleware' => 'can:product-update,id'
        ]);
        Route::post('/update/{id}', [
            'as' => 'products.update',
            'uses' => 'App\Http\Controllers\AdminProductController@update',
            'middleware' => 'can:product-update,id'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'products.delete',
            'uses' => 'App\Http\Controllers\AdminProductController@delete',
            'middleware' => 'can:product-delete,id'
        ]);
        Route::post('/mutiple-delete', [
            'as' => 'products.mutiple-delete',
            'uses' => 'App\Http\Controllers\AdminProductController@mutipleDelete',
        ]);
        Route::post('/remove-trash', [
            'as' => 'products.remove-trash',
            'uses' => 'App\Http\Controllers\AdminProductController@removeTrash',
        ]);
        Route::post('/recovery', [
            'as' => 'products.recovery',
            'uses' => 'App\Http\Controllers\AdminProductController@recovery',
        ]);
    });
    Route::prefix('posts')->group(function () {
        Route::get('/', [
            'as' => 'posts.index',
            'uses' => 'App\Http\Controllers\AdminPostController@index',
            'middleware' => 'can:post-list'
        ]);
        Route::get('/create', [
            'as' => 'posts.create',
            'uses' => 'App\Http\Controllers\AdminPostController@create',
            'middleware' => 'can:post-add',
        ]);
        Route::post('/store', [
            'as' => 'posts.store',
            'uses' => 'App\Http\Controllers\AdminPostController@store',
            'middleware' => 'can:post-add',
        ]);
        Route::get('/edit/{id}', [
            'as' => 'posts.edit',
            'uses' => 'App\Http\Controllers\AdminPostController@edit',
            'middleware' => 'can:post-update,id'
        ]);
        Route::post('/update/{id}', [
            'as' => 'posts.update',
            'uses' => 'App\Http\Controllers\AdminPostController@update',
            'middleware' => 'can:post-update,id'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'posts.delete',
            'uses' => 'App\Http\Controllers\AdminPostController@delete',
            'middleware' => 'can:post-delete,id'
        ]);
        Route::post('/mutiple-delete', [
            'as' => 'posts.mutiple-delete',
            'uses' => 'App\Http\Controllers\AdminPostController@mutipleDelete',
        ]);
        Route::post('/remove-trash', [
            'as' => 'posts.remove-trash',
            'uses' => 'App\Http\Controllers\AdminPostController@removeTrash',
        ]);
        Route::post('/recovery', [
            'as' => 'posts.recovery',
            'uses' => 'App\Http\Controllers\AdminPostController@recovery',
        ]);
    });
    Route::prefix('categories')->group(function () {
        Route::get('/list/{type}', [
            'as' => 'categories.index',
            'uses' => 'App\Http\Controllers\CategoryController@index',
            'middleware' => 'can:category-list,type'
        ]);
        Route::get('/create/{type}', [
            'as' => 'categories.create',
            'uses' => 'App\Http\Controllers\CategoryController@create',
            'middleware' => 'can:category-add,type'
        ]);
        Route::post('/store', [
            'as' => 'categories.store',
            'uses' => 'App\Http\Controllers\CategoryController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'categories.edit',
            'uses' => 'App\Http\Controllers\CategoryController@edit',
            'middleware' => 'can:category-update,id'
        ]);
        Route::post('/update/{id}', [
            'as' => 'categories.update',
            'uses' => 'App\Http\Controllers\CategoryController@update',
            'middleware' => 'can:category-update,id'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'categories.delete',
            'uses' => 'App\Http\Controllers\CategoryController@delete',
            'middleware' => 'can:category-delete,id'
        ]);
        Route::post('/mutiple-delete', [
            'as' => 'categories.mutiple-delete',
            'uses' => 'App\Http\Controllers\CategoryController@mutipleDelete',
        ]);
        Route::post('/remove-trash', [
            'as' => 'categories.remove-trash',
            'uses' => 'App\Http\Controllers\CategoryController@removeTrash',
        ]);
        Route::post('/recovery', [
            'as' => 'categories.recovery',
            'uses' => 'App\Http\Controllers\CategoryController@recovery',
        ]);
    });
    Route::prefix('menus')->group(function () {
        Route::get('/', [
            'as' => 'menus.index',
            'uses' => 'App\Http\Controllers\MenuController@index',
            'middleware' => 'can:menu-list'
        ]);
        Route::get('/create', [
            'as' => 'menus.create',
            'uses' => 'App\Http\Controllers\MenuController@create',
            'middleware' => 'can:menu-add',
        ]);
        Route::post('/store', [
            'as' => 'menus.store',
            'uses' => 'App\Http\Controllers\MenuController@store',
            'middleware' => 'can:menu-add',
        ]);
        Route::get('/edit/{id}', [
            'as' => 'menus.edit',
            'uses' => 'App\Http\Controllers\MenuController@edit',
            'middleware' => 'can:menu-update'
        ]);
        Route::post('/update/{id}', [
            'as' => 'menus.update',
            'uses' => 'App\Http\Controllers\MenuController@update',
            'middleware' => 'can:menu-update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'menus.delete',
            'uses' => 'App\Http\Controllers\MenuController@delete',
            'middleware' => 'can:menu-delete'
        ]);
        Route::post('/mutiple-delete', [
            'as' => 'menus.mutiple-delete',
            'uses' => 'App\Http\Controllers\MenuController@mutipleDelete',
        ]);
    });

    Route::prefix('slider')->group(function () {
        Route::get('/', [
            'as' => 'sliders.index',
            'uses' => 'App\Http\Controllers\AdminSliderController@index',
            'middleware' => 'can:slider-list'
        ]);
        Route::get('/create', [
            'as' => 'sliders.create',
            'uses' => 'App\Http\Controllers\AdminSliderController@create',
            'middleware' => 'can:slider-add',
        ]);
        Route::post('/stote', [
            'as' => 'sliders.store',
            'uses' => 'App\Http\Controllers\AdminSliderController@store',
            'middleware' => 'can:slider-add',
        ]);
        Route::get('/edit/{id}', [
            'as' => 'sliders.edit',
            'uses' => 'App\Http\Controllers\AdminSliderController@edit',
            'middleware' => 'can:slider-update'
        ]);
        Route::post('/update/{id}', [
            'as' => 'sliders.update',
            'uses' => 'App\Http\Controllers\AdminSliderController@update',
            'middleware' => 'can:slider-update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'sliders.delete',
            'uses' => 'App\Http\Controllers\AdminSliderController@delete',
            'middleware' => 'can:slider-delete'
        ]);
        Route::post('/mutiple-delete', [
            'as' => 'sliders.mutiple-delete',
            'uses' => 'App\Http\Controllers\AdminSliderController@mutipleDelete',
        ]);
    });

    Route::prefix('setting')->group(function () {
        Route::get('/', [
            'as' => 'settings.index',
            'uses' => 'App\Http\Controllers\AdminSettingController@index',
            'middleware' => 'can:setting-list'
        ]);
        Route::get('/create', [
            'as' => 'settings.create',
            'uses' => 'App\Http\Controllers\AdminSettingController@create',
            'middleware' => 'can:setting-add',
        ]);
        Route::post('/store', [
            'as' => 'settings.store',
            'uses' => 'App\Http\Controllers\AdminSettingController@store',
            'middleware' => 'can:setting-add',
        ]);
        Route::get('/edit/{id}', [
            'as' => 'settings.edit',
            'uses' => 'App\Http\Controllers\AdminSettingController@edit',
            'middleware' => 'can:setting-update'
        ]);
        Route::post('/update/{id}', [
            'as' => 'settings.update',
            'uses' => 'App\Http\Controllers\AdminSettingController@update',
            'middleware' => 'can:setting-update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'settings.delete',
            'uses' => 'App\Http\Controllers\AdminSettingController@delete',
            'middleware' => 'can:setting-delete'
        ]);
        Route::post('/mutiple-delete', [
            'as' => 'settings.mutiple-delete',
            'uses' => 'App\Http\Controllers\AdminSettingController@mutipleDelete',
        ]);
    });

    Route::prefix('users')->group(function () {
        Route::get('/', [
            'as' => 'users.index',
            'uses' => 'App\Http\Controllers\AdminUserController@index',
            'middleware' => 'can:user-list'
        ]);
        Route::get('/create', [
            'as' => 'users.create',
            'uses' => 'App\Http\Controllers\AdminUserController@create',
            'middleware' => 'can:user-add',
        ]);
        Route::post('/store', [
            'as' => 'users.store',
            'uses' => 'App\Http\Controllers\AdminUserController@store',
            'middleware' => 'can:user-add',
        ]);
        Route::get('/edit/{id}', [
            'as' => 'users.edit',
            'uses' => 'App\Http\Controllers\AdminUserController@edit',
            'middleware' => 'can:user-update'
        ]);
        Route::post('/update/{id}', [
            'as' => 'users.update',
            'uses' => 'App\Http\Controllers\AdminUserController@update',
            'middleware' => 'can:user-update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'users.delete',
            'uses' => 'App\Http\Controllers\AdminUserController@delete',
            'middleware' => 'can:user-delete'
        ]);
        Route::post('/mutiple-delete', [
            'as' => 'users.mutiple-delete',
            'uses' => 'App\Http\Controllers\AdminUserController@mutipleDelete',
        ]);
    });
    Route::prefix('roles')->group(function () {
        Route::get('/', [
            'as' => 'roles.index',
            'uses' => 'App\Http\Controllers\AdminRoleController@index',
            'middleware' => 'can:role-list'
        ]);
        Route::get('/create', [
            'as' => 'roles.create',
            'uses' => 'App\Http\Controllers\AdminRoleController@create',
            'middleware' => 'can:role-add',
        ]);
        Route::post('/store', [
            'as' => 'roles.store',
            'uses' => 'App\Http\Controllers\AdminRoleController@store',
            'middleware' => 'can:role-add',
        ]);
        Route::get('/edit/{id}', [
            'as' => 'roles.edit',
            'uses' => 'App\Http\Controllers\AdminRoleController@edit',
            'middleware' => 'can:role-update'
        ]);
        Route::post('/update/{id}', [
            'as' => 'roles.update',
            'uses' => 'App\Http\Controllers\AdminRoleController@update',
            'middleware' => 'can:role-update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'roles.delete',
            'uses' => 'App\Http\Controllers\AdminRoleController@delete',
            'middleware' => 'can:role-delete'
        ]);
        Route::post('/mutiple-delete', [
            'as' => 'roles.mutiple-delete',
            'uses' => 'App\Http\Controllers\AdminRoleController@mutipleDelete',
        ]);
    });
    Route::prefix('permissions')->group(function () {
        Route::get('/', [
            'as' => 'permissions.index',
            'uses' => 'App\Http\Controllers\AdminPermissionController@index',
            'middleware' => 'can:permission-list'
        ]);
        Route::get('/create', [
            'as' => 'permissions.create',
            'uses' => 'App\Http\Controllers\AdminPermissionController@create',
            'middleware' => 'can:permission-add',
        ]);
        Route::post('/store', [
            'as' => 'permissions.store',
            'uses' => 'App\Http\Controllers\AdminPermissionController@store',
            'middleware' => 'can:permission-add',
        ]);
        Route::get('/edit/{id}', [
            'as' => 'permissions.edit',
            'uses' => 'App\Http\Controllers\AdminPermissionController@edit',
            'middleware' => 'can:permission-update'
        ]);
        Route::post('/update/{id}', [
            'as' => 'permissions.update',
            'uses' => 'App\Http\Controllers\AdminPermissionController@update',
            'middleware' => 'can:permission-update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'permissions.delete',
            'uses' => 'App\Http\Controllers\AdminPermissionController@delete',
            'middleware' => 'can:permission-delete'
        ]);
        Route::post('/mutiple-delete', [
            'as' => 'permissions.mutiple-delete',
            'uses' => 'App\Http\Controllers\AdminPermissionController@mutipleDelete',
        ]);
    });
});
